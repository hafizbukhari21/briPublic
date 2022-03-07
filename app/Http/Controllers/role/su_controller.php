<?php

namespace App\Http\Controllers\role;

use App\Models\users_table;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\divisi;
use App\Models\message;
use App\Models\regionalhead_cred;
use App\Models\task;
use Facade\FlareClient\View;

class su_controller extends Controller
{
    public function dashboard(){
        //$checkUser = users_table::selectRaw("Count(*) as Total")

        $jumlahUser = users_table::selectRaw("Count(*) as Total")->get()->first();
        $jumlahMessage = message::selectRaw("Count(*) as Total")->get()->first();
        $jumlahTask = task::selectRaw("Count(*) as Total")->get()->first();
        $jumlahDoneTask =task::selectRaw("Count(*) as Total")
                ->where("status","=","4")->get()->first();

        $taskCopletion = DB::table("divisi")
            ->leftJoin("task", "task.idDivisi", "=", "divisi.id")
            ->select(DB::raw('COUNT(IF(task.status=4,1,null)) / COUNT(task.idDivisi) *100 as yang_kelar'), "divisi.id", "divisi.nama_divisi")
            ->groupBy("divisi.id", "divisi.nama_divisi")->get();
        return view("Page.Su.dashboard_su",[
           "taskCopletion" => $taskCopletion,
           "jumlahUser" =>  $jumlahUser,
           "jumlahMessage" => $jumlahMessage,
           "jumlahTask" => $jumlahTask,
           "jumlahDoneTask" => $jumlahDoneTask
        ]);
    }

    public function get_users(){
        
        // $payload = users_table::paginate(20);

        $payload = DB::table("usertable")->join("divisi", "divisi.id","=", "usertable.idDivisi")
        ->select("usertable.*", "divisi.nama_divisi")->paginate(1000);
        
        $divisi = divisi::all();
        // $return = [$payload, $divisi];

        return view("Page.Su.users_su", [
            "payload" => $payload,
            "divisi" => $divisi
        ]);
    }


    public function set_users(Request $req){

        $req->validate([
            'idDivisi' => 'required',
            'username'  => 'required',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required',

        ]);

        $insert=$req->all();
        array_splice($insert, 0, 1);
        $payload = users_table::create($insert);

        $getUser=users_table::all()->where("username",$req->get("username"))->first();

        if ($req->get("role")==2){
            return redirect("/su/users")->with("select_cred", $getUser->id);
        }
        

        return redirect("/su/users");
    }

    public function setRegHead(Request $req){
        $getData = $req->all();
        $idUser=$req->get("idUser");
       
        array_splice($getData, 0, 2);

        foreach($getData as $k => $v):
            $regHead_cred = new regionalhead_cred();
            $regHead_cred->idUser = $idUser;
            $regHead_cred->idDivisi = $v;
            $regHead_cred->save();
        endforeach;

        return redirect("/su/users");
        // print_r($getData);
    }


    public function deleteUser(Request $req){
        
        users_table::where("username", $req->get("idMessage"))->delete();
        return redirect("/su/users");
    }

    public function updateUser(Request $req){
        $req->validate([
            'divisiId' => 'required',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required',

        ]);

        print_r($req->all());
            users_table::where("username",$req->get("username"))
                ->update([
                    "name" => $req->get("name"),
                    "password" => bcrypt( $req->get("password")),
                    "idDivisi" => $req->get("divisiId"),
                    "role" =>$req->get("role")
                ]);

                $getUser=users_table::all()->where("username",$req->get("username"))->first();

                if( $req->get("role")==2){
                    regionalhead_cred::where("idUser",$getUser->id)->delete();
                    return redirect("/su/users")->with("select_cred", $getUser->id);
                }

                return redirect("/su/users");
            
    }

    public function divisiView(){
        $payload = divisi::all();
        return View("Page.Su.divisi_su", ["divisis"=>$payload]);
    }

    public function divisiAdd(Request $req){
        $divisi = new divisi();
        $divisi->nama_divisi = $req->get("nama_divisi");
        $divisi->save();

        return redirect("/su/divisiView");
    }

    public function divisiUpdate(Request $req){
        $divisi = divisi::find($req->get("idDivisi"));
        $divisi->nama_divisi = $req->get("nama_divisi");
        $divisi->save();

        return redirect("/su/divisiView");
    }

    public function divisiDelete(Request $req){
        divisi::where("id", $req->get("idDivisi"))->delete();
        return redirect("/su/divisiView");
    }

    public function log(){
        $payload = DB::table("log")->join('usertable', 'usertable.id','=','log.idUser')
        ->select("usertable.*", "log.*", "log.created_at as logCreate" )->get();
       
        return view("Page.Su.log_su",["logs"=>$payload]);
    }

}
