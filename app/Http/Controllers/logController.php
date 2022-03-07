<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logModel;

class logController extends Controller
{
    //

    public static function addLog($message){
        $log = new logModel();
        $log->idUser = session()->get("sessionKey")["id"];
        $log->messageLog = $message;
        $log->save();
    }
}
