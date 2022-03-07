<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use App\Http\Controllers\utils\navbar;
use App\Models\divisi;
use App\Models\message;
use App\Models\task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class div_head_controller extends Controller
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
            ->where("message.idDivHead","=",session()->get("sessionKey")["id"])
            ->take(5)->get();

        $lastFowardedMessage = DB::table("message")
            ->join("usertable", "usertable.id", "=", "message.idSecHead")
            ->select("usertable.*", "message.*", "message.created_at as tglMessage")
            ->orderBy("message.id", "DESC")
            ->where([
                ["message.idDivHead","=",session()->get("sessionKey")["id"]],
                ["message.ReadedByDivHead","=","3"]
            ])
           
            ->take(5)->get();
        
        return view("Page.DivHead.dashboard_dh",[
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
        ->select("task.*", "usertable.name", "divisi.nama_divisi", "usertable.role");

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
     
        $task_payload = $q->where("task.idDivisi","=",session()->get("sessionKey")["idDivisi"])->where($where)->whereBetween('task.waktu_input',[$timeAwal,$timeAkhir])->paginate(100);
              
        return view("Page.DivHead.taskMonitor_dh",[
            "task_payload" => $task_payload
        ]);
    }

    public function divHeadApproveTask(Request $req){
        $id= $req->get("idTask");
        $task = task::find($id);
        $task->keterangan = $req->get("keterangan");
        $task->status = 4;
        $task->save();

        return redirect('/divhead/taskMonitor');
    }

    public function home(){
        
        
        return view("test",[
            "payload"=>"data",
            "navbar"=>navbar::divheadNav()
        ]);
        
    }

    public function divHeadReadedMessage(Request $req){
        $message = message::find($req->get("idMessage"));
        $message->ReadedByDivHead = 2;//div head read message
        $message->save();
        return redirect("/divhead/message");
    }

    public function fowardMessage(Request $req){
        $message = message::find($req->get("idMessage"));
        $message->ReadedByDivHead = 3;//div head read message
        $message->idSecHead = $req->get("userdivisi");
        $message->save();
        return redirect("/divhead/message");
    }
    

    public function Message(){
        // $message_payload = message::all()->where("idDivHead","=",session()->get("sessionKey")["id"]);
        $message_payload = DB::table("message")
            ->leftJoin("usertable", "usertable.id","=","message.idSecHead")
            ->where("idDivHead","=",session()->get("sessionKey")["id"])
            ->select("message.*", "usertable.*", "message.id as messageId", "message.created_at as message_createdTime")->get();

        $userDivisi=DB::table("usertable")->where("idDivisi","=",session()->get("sessionKey")["idDivisi"])->where("role","=","4")->get();
        return view("Page.DivHead.message_dh",[
            "message_payload" => $message_payload,
            "userDivisi" => $userDivisi
        ]);
    }


    public function messageAjax(){
        $RecentMessage = DB::table("message")
        ->join("usertable", "usertable.id", "=", "message.idRegHead")
        ->select("usertable.*", "message.*", "message.created_at as tglMessage")
        ->orderBy("message.id", "DESC")
        ->where([
            ["message.idDivHead","=",session()->get("sessionKey")["id"]],
            ["message.ReadedByDivHead","=","1"]
        ])
        ->take(5)->get();

        return response()->json($RecentMessage,200);
    }

    public function taskAjax(){
        // $lastPendingTask = DB::table("task")
        //     ->where([
        //         ["task.idDivisi","=",session()->get("sessionKey")["idDivisi"]],
        //         ["deadline","<=", date("Y-m-d",strtotime("+7days"))],//filder yang  7 hari sebelum deadline
        //         ["deadline",">", date("Y-m-d")]//filder dari yang lewat deadline tidak muncul
        //     ])
        //     ->select("task.jenis_pekerjaan", "task.created_at as waktuTask", "deadline")
        //     ->orderBy("task.id", "DESC")
        //     ->take(5)->get();

        $lastPendingTask = DB::select(
            DB::raw(
                'select DATEDIFF(deadline, now()) as beda_dengan_today, jenis_pekerjaan, task.created_at as waktuTask, deadline  from task
                WHERE 
                DATEDIFF(deadline, now())<=7
                AND DATEDIFF(deadline, now())>=0
                AND task.idDivisi = '.session()->get("sessionKey")["idDivisi"].'
                ORDER BY task.id DESC
                
                '
                
            )
        );

        return response()->json($lastPendingTask,200);
    }
}
