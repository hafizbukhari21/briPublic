<?php

namespace App\Http\Controllers\utils;

use App\Http\Controllers\Controller;
use App\Models\users_table;
use Illuminate\Http\Request;


class helper extends Controller
{
    //
    public static function stringGen(){
        
    }

    public static function getIdUSerByName($name){
        $data=users_table::all()->where('name',"=",$name)->first();
        return $data->id;
    }

    public static function checkUserIsSecHead($name){
        // $data=users_table::selectRaw("");
    }
}
