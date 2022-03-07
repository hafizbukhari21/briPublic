<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use App\Models\divisi;
use App\Models\message;
use App\Models\task;
use Illuminate\Http\Request;
use App\Models\users_table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Print_;


class ceo_controller extends Controller
{
    public function dashboard(){

        $jumlahUser = users_table::selectRaw("Count(*) as Total")->get()->first();
        $jumlahMessage = message::selectRaw("Count(*) as Total")->get()->first();
        $jumlahTask = task::selectRaw("Count(*) as Total")->get()->first();
        $jumlahDoneTask =task::selectRaw("Count(*) as Total")
                ->where("status","=","4")->get()->first();
        $jumlahExpiredTask = task::selectRaw("COUNT(IF(DATEDIFF(deadline, now())<=0 AND task.status < 4 ,1,null)) as Expired")->get()->first();

        

        $taskCopletion = DB::table("divisi")
            ->leftJoin("task", "task.idDivisi", "=", "divisi.id")
            ->select(DB::raw('COUNT(IF(task.status=4,1,null)) / COUNT(task.idDivisi) *100 as yang_kelar'), "divisi.id", "divisi.nama_divisi")
            ->groupBy("divisi.id", "divisi.nama_divisi")->get();

        $lastPendingTask = DB::table("task")
                    ->join("divisi", "task.idDivisi","=", "divisi.id")->take(5)->get();

        $lastDeliverMessage = DB::table("message")
            ->join("usertable", "usertable.id", "=", "message.idRegHead")
            ->select("usertable.*", "message.*", "message.created_at as tglMessage")->take(5)->get();

        return view("Page.Ceo.dashboard",[
            "taskCopletion" => $taskCopletion,
            "lastPendingTask" => $lastPendingTask,
            "lastDeliverMessage" => $lastDeliverMessage,
            "jumlahUser" =>  $jumlahUser,
            "jumlahMessage" => $jumlahMessage,
            "jumlahTask" => $jumlahTask,
            "jumlahDoneTask" => $jumlahDoneTask,
            "jumlahExpiredTask" => $jumlahExpiredTask
        ]);
    }

    public function taskCompletion_ajax(){
        $taskCopletion = DB::table("divisi")
            ->leftJoin("task", "task.idDivisi", "=", "divisi.id")
            ->select(
                DB::raw('COUNT(IF(task.status=4,1,null)) / COUNT(task.idDivisi) *100 as yang_kelar'),
                DB::raw('COUNT(IF(task.status=4,null,1)) as gak_kelar'),
                DB::raw('COUNT(IF(task.status < 4 AND DATEDIFF(deadline, now())>=0,1,null)) as Progress'),
                DB::raw('COUNT(task.idDivisi) as total_task'),
                DB::raw('COUNT(IF(task.status=4,1,null)) as kelar'),
                DB::raw('COUNT(IF(DATEDIFF(deadline, now())<=0 AND task.status < 4 ,1,null)) as Expired'),  
                "divisi.id", 
                "divisi.nama_divisi")
            ->groupBy("divisi.id", "divisi.nama_divisi")->get();

            return response()->json(["task"=>$taskCopletion],200);
    }

    public function showTaskMonitor(Request $req){

        $task_param=null;
        $divisi_param=null;
        $status_param=null;

        $divisi_payload = divisi::all();

        $q = DB::table("task")
        ->join("usertable", "usertable.id", "=", "task.idUserAsPic")
        ->join ("divisi", "divisi.id", "=", "task.idDivisi");

        if($req->has("task"))$task_param=$req->get("task");
        if($req->has("idDivisi"))$divisi_param=$req->get("idDivisi");
        if($req->has("status"))$status_param=$req->get("status");
        $where = [];
        if($task_param){
            array_push($where,["task.jenis_pekerjaan","like" ,"%".$task_param."%"]);
        }
        if($divisi_param){        
            array_push($where,["task.idDivisi","=",$divisi_param]);
        }
        if($status_param){
            if($status_param=="5") {
                array_push($where,["task.deadline","<",date("Y-m-d")]);
                array_push($where,["task.status","<","4"]);
            }
            else array_push($where,["task.status","=",$status_param]);
        }
        $task_payload = $q->where($where)->get();
               
        return view("Page.Ceo.taskMonitor_ceo",[
            "divisi_payload" => $divisi_payload,
            "task_payload" => $task_payload
        ]);
    }

    public function messageView(){
        
        $reghead_payload = users_table::all()->where("role","=","2");
        $message_payload = DB::table("message")->join("usertable", "usertable.id","=", "message.idRegHead")
                        ->where("message.idCeo","=",session()->get("sessionKey")["id"])->select("usertable.*","message.*", "message.created_at as tanggalMessageDibuat")->get(); 
        
        
        return view("Page.Ceo.message_ceo",[
            "reghead_payload" => $reghead_payload,
            "message_payload" => $message_payload
            
        ]);
    }

    public function sendMessage(Request $req){
        $getRegHeadDivisi = users_table::all()->where("id","=",$req->get("idUser_asRegHead"))->first();

        $message = new message();
        $message->idCeo = session()->get("sessionKey")["id"];
        $message->isi_pesan = $req->get("message");
        $this->uploadFileAssist($req, "attachment", $message);
        $message->idRegHead  = $req->get("idUser_asRegHead");
        $message->urgent = $req->get("urgent");
        $message->save();

        return redirect("/ceo/message");
    }


    private function uploadFileAssist($req, $colomnOrParameter, $table){
        if($req->hasFile($colomnOrParameter)){
           
            if($table->{$colomnOrParameter}==0){ //remove and replace when update a spesific data
                $willDelete=str_replace("storage","public",$table->{$colomnOrParameter});
                Storage::delete($willDelete);
            }

            $table->{$colomnOrParameter} = strval(str_replace("public", "storage",$req->file($colomnOrParameter)->store("public/".$colomnOrParameter)));
            
        }
    }


    public function messageAjax(){
        $RecentMessage = DB::table("message")
        ->join("usertable", "usertable.id", "=", "message.idCeo")
        ->select("usertable.*", "message.*", "message.created_at as tglMessage")
        ->orderBy("message.id", "DESC")
        ->where([
            ["progress","=","1"],
            ["ReadedByRegHead","=","1"]//readed by reghead
        ])
        ->take(5)->get();

        return response()->json($RecentMessage,200);
    }

    public function taskAjax(){
        $lastPendingTask = DB::select(
            DB::raw(
                'select DATEDIFF(deadline, now()) as beda_dengan_today, jenis_pekerjaan, task.created_at as waktuTask, deadline  from task
                WHERE 
                DATEDIFF(deadline, now())<=7
                AND DATEDIFF(deadline, now())>=0
                ORDER BY task.id DESC 
                '
                
            )
        );
        return response()->json($lastPendingTask,200);
    }


   
}
