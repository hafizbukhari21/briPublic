<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use App\Models\divisi;
use App\Models\message;
use App\Models\regionalhead_cred;
use App\Models\task;
use App\Models\users_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class reg_head_controller extends Controller
{
    
    public function dashboard(){
        $regDivFilter = DB::select(
            DB::raw(
                'select * from regionalhead_cred  where idUser = "'.session()->get("sessionKey")["id"].'"'
            )
            );

        $fiterDivsi=[];
        foreach($regDivFilter as $rd):
            array_push($fiterDivsi, $rd->idDivisi);
        endforeach;

        $taskCopletion = DB::table("divisi")
            ->leftJoin("task", "task.idDivisi", "=", "divisi.id")
            ->select(DB::raw('COUNT(IF(task.status=4,1,null)) / COUNT(task.idDivisi) *100 as yang_kelar'), "divisi.id", "divisi.nama_divisi")
            ->whereIn("divisi.id",$fiterDivsi)
            ->groupBy("divisi.id", "divisi.nama_divisi")->get();

        $lastPendingTask = DB::table("task")
            ->join("divisi", "task.idDivisi","=", "divisi.id")
            ->whereIn("task.idDivisi",$fiterDivsi)
            ->orderBy("task.id", "DESC")
            ->take(5)->get();

        $lastDeliverMessage = DB::table("message")
            ->join("usertable", "usertable.id", "=", "message.idDivHead")
            ->select("usertable.*", "message.*", "message.created_at as tglMessage")
            ->orderBy("message.id", "DESC")
            ->where("message.idRegHead","=",session()->get("sessionKey")["id"])
            ->take(5)->get();

        $jumlahUser = users_table::selectRaw("Count(*) as Total")->get()->first();
        $jumlahMessage = message::selectRaw("Count(*) as Total")->get()->first();
        $jumlahTask = task::selectRaw("Count(*) as Total")->whereIn("task.idDivisi",$fiterDivsi)->get()->first();
        $jumlahDoneTask =task::selectRaw("Count(*) as Total")->whereIn("task.idDivisi",$fiterDivsi)
                    ->where("status","=","4")->get()->first();
        $jumlahExpiredTask = task::selectRaw("COUNT(IF(DATEDIFF(deadline, now())<=0 AND status < 4 ,1,null)) as Expired")->whereIn("task.idDivisi",$fiterDivsi)
        ->get()->first();


        return view("Page.RegHead.dashboard_rh",[
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
        $regDivFilter = DB::select(
            DB::raw(
                'select * from regionalhead_cred  where idUser = "'.session()->get("sessionKey")["id"].'"'
            )
            );

        $fiterDivsi=[];
        foreach($regDivFilter as $rd):
            array_push($fiterDivsi, $rd->idDivisi);
        endforeach;

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
            ->whereIn("divisi.id",$fiterDivsi)
            ->groupBy("divisi.id", "divisi.nama_divisi")->get();
        return response()->json(["task"=>$taskCopletion],200);
    }

    public function showTaskMonitor(Request $req){
        $task_param=null;
        $divisi_param=null;
        $status_param=null;

        

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

        $regDivFilter = DB::select(
            DB::raw(
                'select * from regionalhead_cred  where idUser = "'.session()->get("sessionKey")["id"].'"'
            )
            );

        $fiterDivsi=[];
        foreach($regDivFilter as $rd):
            array_push($fiterDivsi, $rd->idDivisi);
        endforeach;

        $divisi_payload = divisi::all()->whereIn("id",$fiterDivsi);

        $task_payload = $q->whereIn("task.idDivisi",$fiterDivsi)->where($where)->get();
               
        return view("Page.RegHead.taskMonitor_rh",[
            "divisi_payload" => $divisi_payload,
            "task_payload" => $task_payload
        ]);  
    }

    public function message(){
        // $message_payload = message::all()->where("idRegHead", "=",session()->get("sessionKey")["id"]);
        $message_payload= DB::table("message")
        ->leftJoin("usertable", "message.idDivHead", "=", "usertable.id")
        ->where("message.idRegHead", "=",session()->get("sessionKey")["id"])
        ->select("message.*", "usertable.*", "message.id as messageId", "message.created_at as meesage_createdTime")->get();
        
        
        $regDivFilter = DB::select(
            DB::raw(
                'select * from regionalhead_cred  where idUser = "'.session()->get("sessionKey")["id"].'"'
            )
            );

        $fiterDivsi=[];
        foreach($regDivFilter as $rd):
            array_push($fiterDivsi, $rd->idDivisi);
        endforeach;

        $userDivisi=DB::table("usertable")->whereIn("idDivisi",$fiterDivsi)->where("role","=","3")->get();
      

        return view("Page.RegHead.message_rh",[
            "message_payload" => $message_payload,
            "userDivisi" => $userDivisi
        ]);
    }

    public function fowardMessage(Request $req){
        
        $message = message::find($req->get("idMessage"));
        $message->ReadedByRegHead = 3;//reghead foward message to divehad
        $message->ReadedByDivHead = 1;//munuculkan message ke divhead yang dituju
        $message->idDivHead  = $req->get("divisi");
        $message->save();
        return redirect("/reghead/message");
        
    }

    public function regHeadReadedMessage(Request $req){

        $message = message::find($req->get("idMessage"));
        $message->ReadedByRegHead = 2;//reg head read message
        $message->save();
        return redirect("/reghead/message");
    }

    public function messageAjax(){
        $RecentMessage = DB::table("message")
        ->join("usertable", "usertable.id", "=", "message.idCeo")
        ->select("usertable.*", "message.*", "message.created_at as tglMessage")
        ->orderBy("message.id", "DESC")
        ->where([
            ["message.idRegHead", "=",session()->get("sessionKey")["id"]],
            ["progress","=","1"],
            ["ReadedByRegHead","=","1"]
        ])
        ->take(5)->get();

        return response()->json($RecentMessage,200);
    }

    public function taskAjax(){
        $regDivFilter = DB::select(
            DB::raw(
                'select * from regionalhead_cred  where idUser = "'.session()->get("sessionKey")["id"].'"'
            )
            );

        $fiterDivsi=[];
        foreach($regDivFilter as $rd):
            array_push($fiterDivsi, $rd->idDivisi);
        endforeach;

        $lastPendingTask = DB::select(
            DB::raw(
                'select DATEDIFF(deadline, now()) as beda_dengan_today, jenis_pekerjaan, task.created_at as waktuTask, deadline  from task
                WHERE 
                DATEDIFF(deadline, now())<=7
                AND DATEDIFF(deadline, now())>=0
                AND task.idDivisi in ('.implode(",", $fiterDivsi).')
                ORDER BY task.id DESC 
                '
                
            )
        );
        return response()->json($lastPendingTask,200);
    }

    
}
