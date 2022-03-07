<?php

namespace App\Http\Controllers;

use App\Models\users_table;
use Illuminate\Http\Request;
use App\Http\Controllers\logController;
use Illuminate\Support\Facades\Redirect;
use App\Models\task;
use Illuminate\Support\Facades\DB;



class authController extends Controller
{
    public function showLogin(){
        if(session()->has('sessionKey')){
            $getStatus = users_table::select("role")->where("id","=",session()->get("sessionKey")["id"])->first();
            if($getStatus->role==1) return redirect("/ceo/dashboard");
            elseif($getStatus->role==2) return redirect("/reghead/dashboard");
            elseif($getStatus->role==3) return redirect("/divhead/dashboard");
            elseif($getStatus->role==4) return redirect("/sechead/dashboard");
            elseif($getStatus->role==5) return redirect("/staff/dashboard");
            elseif($getStatus->role==6) return redirect("/su/dashboard");

        }
        return view("login");
    }

    public function reloadCaptcha(){
        return response()->json(['captcha'=>captcha_img()]);
    }

    private function deleteTask(){
        DB::delete(
            DB::raw(
                'DELETE FROM task WHERE DATEDIFF(deadline, now())<=-30 '
            )
        );
    }

    public function doLogin (Request $req){
        $this->deleteTask();
        $username = $req->get("username");
        $password = $req->get("password");
        $payload = null;

        $req->validate([
            // 'captcha' => 'required|captcha',
            'username' => 'required',
            'password' => 'required'
        ]);

        $checkUser = users_table::selectRaw("Count(*) as Total")
        ->where('username','=',$username)
        ->first();

        if(intval($checkUser->Total)>0){
            $payload=users_table::all()->where('username',"=",$username)->first();
            if(password_verify($password, $payload->password) && $payload->username = $username){
                $this->makeCredetial($payload, $req);
                logController::addLog("Berhasil melakukan login");
                switch($payload->role){
                    
                    case '1'://ceo
                        return redirect('/ceo/dashboard');
                        break;
                    case '2'://reghead
                        return redirect('/reghead/dashboard');
                        break;
                    case '3'://divhead
                        return redirect('/divhead/dashboard');
                        break;
                    case '4'://sechead
                        return redirect('/sechead/dashboard');
                        break;
                    case '5'://staff
                        return redirect("/staff/dashboard");
                        break;
                    case '6'://super user
                        return redirect("/su/dashboard");
                        break;
                    default:
                        return "error";
                }

            }

        }
        return Redirect::back()->withErrors(['status'=> 'user tidak terdaftar']);
    }

    public function logout(Request $request){
        $request->session()->forget('sessionKey');
        return redirect("/");
    }

    private function makeCredetial($payload, $request){
        $cred = [
            "id" => $payload->id,
            "username" =>$payload->username,
            "role"=>$payload->role,
            "idDivisi"=> $payload->idDivisi,
            "name" =>$payload->name
        ];

        $request->session()->put('sessionKey',$cred);
    }

    public function changePassword(Request $req){
  
        $checker = users_table::all()->where("id", session()->get("sessionKey")["id"])->first();

        if(password_verify($req->get("oldpass"), $checker->password)){
            $user = users_table::find(session()->get("sessionKey")["id"]);
            $user->password = $req->get("newpass");
            $user->save();
            return Redirect::back()->with(['status'=> 'Password Has been changed']);
        }
        else{
            return Redirect::back()->with(['status'=> 'Wrong Old Password']);
        }

       
        

        
    }
    

}
