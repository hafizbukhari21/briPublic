<?php

namespace App\Http\Controllers\utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class navbar extends Controller
{
    public static function divheadNav(){
        $payload =[
            "nama" => "hafiz"
        ];

        return $payload;
    }

    public function navbar(){
        $userPayload = DB::table("usertable")->join("divisi", "divisi.id", "=", "usertable.idDivisi")
        ->where("usertable.id","=",session()->get("sessionKey")["id"])
        ->select(
            "divisi.*",
            "usertable.name", 
            "usertable.idDivisi", 
            "usertable.role", 
            "usertable.username"
        )->get()->first();

        
        return response()->json(["userData" => $userPayload]);


    }

   
}
