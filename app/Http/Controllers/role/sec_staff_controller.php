<?php

namespace App\Http\Controllers\role;

use App\Models\users_table;
use App\Http\Controllers\Controller;
use App\Http\Controllers\utils\helper;
use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;




class sec_staff_controller extends Controller
{
    public function dashboard()
    {
        $taskCopletion = DB::table("divisi")
            ->leftJoin("task", "task.idDivisi", "=", "divisi.id")
            ->select(DB::raw('COUNT(IF(task.status=4,1,null)) / COUNT(task.idDivisi) *100 as yang_kelar'), "divisi.id", "divisi.nama_divisi")
           
            ->groupBy("divisi.id", "divisi.nama_divisi")->get();

        $lastPendingTask = DB::table("task")
            ->join("divisi", "task.idDivisi","=", "divisi.id")
            ->where("task.idDivisi","=",session()->get("sessionKey")["idDivisi"])
            ->orderBy("task.id", "DESC")
            ->take(5)->get();

        return view("Page.Staff.dashboard_staff",[
            "taskCopletion" => $taskCopletion,
            "lastPendingTask" => $lastPendingTask,
        ]);
    }

    public function showTaskMonitor()
    {
        $users_table = users_table::all()
            ->where("idDivisi", "=", session()->get("sessionKey")["idDivisi"])
            ->where("role", "=", "4");

        $task = DB::table("task")->join("usertable", "usertable.id", "=", "task.idUserAsPic")
            ->select("task.*", "usertable.name")
            ->where("task.idDivisi", "=", session()->get("sessionKey")["idDivisi"])
            ->orderBy("id", "DESC")
            ->paginate(100);

        return view("Page.Staff.taskMonitor_staff", [
            "dataUser" => $users_table,
            "task" => $task
        ]);
    }

    public function tambahTask(Request $req)
    {

        $req->validate([
            'nama_user' => 'required',
            'jenis_pekerjaan' => 'required',
            'deadline' => 'required',
            
        ]);

        $task = new task();
        $task->idUserAsPic  = helper::getIdUSerByName($req->get("nama_user"));
        $task->idDivisi = session()->get("sessionKey")["idDivisi"];
        $task->penanggung_jawab = $req->get("penanggung_jawab");
        $task->jenis_pekerjaan = $req->get("jenis_pekerjaan");
        $task->deadline = $req->get("deadline");
        $task->job = $req->get("job");
        $task->save();

        return redirect("/staff/taskMonitor");
    }

    public function editTask(Request $req)
    {
        $req->validate([
            'evidence' => 'mimes:jpeg,jpg,png,gif,docx,xlsx|max:1000'
        ]);
        
        $task = task::find($req->get("idTask"));
        $task->keterangan = $req->get("keterangan");
        $task->status = 2;
        $this->uploadFileAssist($req, "evidence",$task);
        $task->jenis_pekerjaan = $req->get("jenis_pekerjaan");
        $task->save();
        return redirect("/staff/taskMonitor");
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

    public function taskAjax(){
        // $lastPendingTask = DB::table("task")
        //     ->where([
        //         ["task.idDivisi","=",session()->get("sessionKey")["idDivisi"]],
        //         ["deadline",">", date("Y-m-d")]//filder dari yang lewat deadline tidak muncul
        //     ])
        //     ->whereRaw('deadline > DATE(NOW()) - INTERVAL 7 DAY')
        //     ->whereRaw('deadline < DATE(NOW()) - INTERVAL 0 DAY')
            
        //     ->select("task.jenis_pekerjaan", "task.created_at as waktuTask", 'task.deadline')
        //     ->orderBy("task.id", "DESC")
        //     ->get();

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
