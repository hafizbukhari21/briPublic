<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use App\Models\message;
use App\Models\task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;





class sec_head_controller extends Controller
{
    public function dashboard(){
        $taskCopletion = DB::table("divisi")
        ->leftJoin("task", "task.idDivisi", "=", "divisi.id")
        ->select(DB::raw('COUNT(IF(task.status=4,1,null)) / COUNT(task.idDivisi) *100 as yang_kelar'), "divisi.id", "divisi.nama_divisi")
        
        ->groupBy("divisi.id", "divisi.nama_divisi")->get();

    $lastPendingTask = DB::table("task")
        ->join("divisi", "task.idDivisi","=", "divisi.id")
        ->where("task.idDivisi","=",session()->get("sessionKey")["idDivisi"])
        ->orderBy("task.id", "DESC")
        ->take(5)->get();

    $lastReceivedMessage = DB::table("message")
        ->join("usertable", "usertable.id", "=", "message.idSecHead")
        ->select("usertable.*", "message.*", "message.created_at as tglMessage")
        ->orderBy("message.id", "DESC")
        ->where("message.idSecHead","=",session()->get("sessionKey")["id"])
        ->take(5)->get();

    $lastFowardedMessage = DB::table("message")
        ->join("usertable", "usertable.id", "=", "message.idSecHead")
        ->select("usertable.*", "message.*", "message.created_at as tglMessage")
        ->orderBy("message.id", "DESC")
        ->where([
            ["message.idSecHead","=",session()->get("sessionKey")["id"]],
            ["message.ReadedByDivHead","=","3"]
        ])
       
        ->take(5)->get();

        return view("Page.SecHead.dashboard_sh",[
            "taskCopletion" => $taskCopletion,
            "lastPendingTask" => $lastPendingTask,
            "lastReceivedMessage" => $lastReceivedMessage,
            "lastFowardedMessage" => $lastFowardedMessage
        ]);
    }

    public function showTaskMonitor(Request $req){
        $task_param=null;
        $status_param=null;
        $timeAwal=null;
        $timeAkhir=null;
        $q = DB::table("task")
        ->leftJoin("usertable", "usertable.id", "=", "task.idUserAsPic")
        ->leftJoin ("divisi", "divisi.id", "=", "task.idDivisi")
        ->select("task.*", "usertable.name", "divisi.nama_divisi");

        if($req->has("task"))$task_param=$req->get("task");
        if($req->has("status"))$status_param=$req->get("status");
        if($req->has("timeAwal"))$timeAwal=$req->get("timeAwal");
        if($req->has("timeAkhir"))$timeAkhir=$req->get("timeAkhir");


        $where = [];
        if($task_param){
            array_push($where,["task.jenis_pekerjaan","like" ,"%".$task_param."%"]);
        }
      
        if($status_param){
            if($status_param=="5") {
                array_push($where,["task.deadline","<",date("Y-m-d")]);
                array_push($where,["task.status","<","4"]);
            }
            else array_push($where,["task.status","=",$status_param]);
        }

        if($timeAwal && $timeAkhir){
            $timeAwal =Carbon::createFromFormat('Y-m-d',$timeAwal)->startOfDay();
            $timeAkhir =Carbon::createFromFormat('Y-m-d',$timeAkhir)->endOfDay();
        }

       


        else{
            $timeAwal =Carbon::createFromFormat('Y-m-d',date("Y-m-d" ,strtotime("2000-12-12")))->startOfDay();
            $timeAkhir =Carbon::createFromFormat('Y-m-d',date("Y-m-d"))->endOfDay();
        }

     
        $task_payload = 
        $q->where("task.idDivisi","=",session()->get("sessionKey")["idDivisi"])
        // ->where("task.idUserAsPic","=",session()->get("sessionKey")["id"])
        ->where($where)->whereBetween('task.waktu_input',[$timeAwal,$timeAkhir])->paginate(100);
              
        return view("Page.SecHead.taskMonitor_sh",[
            "task_payload" => $task_payload
        ]);  
    }

    public function rejectTask(Request $req){
     
        
        $id= $req->get("idTask");
        $task = task::find($id);
        $task->keterangan = $req->get("keterangan");
        $task->status = 1;
        $task->save();

        return redirect('/sechead/taskMonitor');
    }

    public function approveTask(Request $req){
       
        $id = $req->get("idTask");

        $task = task::find($id);
        $task->keterangan = $req->get("keterangan");
        $task->status = 3;
        $task->save();

        return redirect('/sechead/taskMonitor');
        
    }


    // private function uploadFileAssist($req, $colomnOrParameter, $table){
    //     if($req->hasFile($colomnOrParameter)){
           
    //         if($table->{$colomnOrParameter}==0){ //remove and replace when update a spesific data
    //             $willDelete=str_replace("storage","public",$table->{$colomnOrParameter});
    //             Storage::delete($willDelete);
    //         }

    //         $table->{$colomnOrParameter} = strval(str_replace("public", "storage",$req->file($colomnOrParameter)->store("public/".$colomnOrParameter)));
            
    //     }
    // }


    public function message(){
        $messagePayload = message::all()->where("idSecHead", "=",session()->get("sessionKey")["id"]);
        return view("Page.SecHead.message_sh", [
            "messagePayload" => $messagePayload
        ]);
    }

    public function markAsRead(Request $req){
        $message = message::find($req->get("idMessage")); 
        $message->ReadedBySecHead = 2;//done read status sechead
        $message->save();
        return redirect("/sechead/message");
    }

    public function finalizeStatusMessage($idMessage){
        $message = message::find($idMessage);
        $message->progress = 2;//finalize message 
        $message->ReadedBySecHead = 3;//done read status sechead
        $message->save();
        return redirect("/sechead/message");
    }


    public function messageAjax(){
        $RecentMessage = DB::table("message")
        ->join("usertable", "usertable.id", "=", "message.idDivHead")
        ->select("usertable.*", "message.*", "message.created_at as tglMessage")
        ->orderBy("message.id", "DESC")
        ->where([
            ["message.idSecHead","=",session()->get("sessionKey")["id"]],
            ["message.ReadedBySecHead","=","1"]
        ])
        ->take(5)->get();

        return response()->json($RecentMessage,200);
    }

    public function taskAjax(){
        // $lastPendingTask = DB::table("task")
        //     ->where([
        //         ["task.idDivisi","=",session()->get("sessionKey")["idDivisi"]],
        //         ["task.idUserAsPic","=",session()->get("sessionKey")["id"]],//filter sechead yg sesuai dengan idnya
        //         ["deadline","<=", date("Y-m-d",strtotime("+7days"))],//filder yang  7 hari sebelum deadline
        //         ["deadline",">", date("Y-m-d")]//filder dari yang lewat deadline tidak muncul
        //     ])
        //     ->select("task.jenis_pekerjaan", "task.created_at as waktuTask")
        //     ->orderBy("task.id", "DESC")
        //     ->take(5)->get();


        $lastPendingTask = DB::select(
            DB::raw(
                'select DATEDIFF(deadline, now()) as beda_dengan_today, jenis_pekerjaan, task.created_at as waktuTask, deadline  from task
                WHERE 
                DATEDIFF(deadline, now())<=7
                AND DATEDIFF(deadline, now())>=0
                AND task.idDivisi = '.session()->get("sessionKey")["idDivisi"].'
                AND task.idUserAsPic = '.session()->get("sessionKey")["id"].'
                ORDER BY task.id DESC 
                '
                
            )
        );

        return response()->json($lastPendingTask,200);
    }

}
