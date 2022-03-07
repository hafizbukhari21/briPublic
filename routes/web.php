<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\role\ceo_controller;
use App\Http\Controllers\role\div_head_controller;
use App\Http\Controllers\role\reg_head_controller;
use App\Http\Controllers\role\sec_head_controller;
use App\Http\Controllers\role\sec_staff_controller;
use App\Http\Controllers\role\su_controller;
use App\Http\Controllers\utils\navbar;
use App\Models\regionalhead_cred;
use Illuminate\Support\Facades\Route;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[authController::class,'showLogin']);
Route::post('/login',[authController::class,'doLogin']);
Route::get('/logout',[authController::class,'logout']);

//captcha
Route::get('/reload',[authController::class, 'reloadCaptcha']);

Route::group(['middleware' => 'SessionControll'], function(){
    Route::post('/changePass',[authController::class,"changePassword"]);
    
    Route::group(['middleware' => 'superUser'], function(){
        //SuperAdmin
        Route::get('/su/dashboard',[su_controller::class,"dashboard"]);
        Route::get('/su/users',[su_controller::class,"get_users"]);
        Route::post('/registerUser',[su_controller::class,"set_users"]);
        Route::post('/updateUser',[su_controller::class,"updateUser"]);
        Route::post('/registerRegHead',[su_controller::class,"setRegHead"]);
        Route::get('/deleteUser',[su_controller::class,"deleteUser"]);
        Route::get('/su/divisiView',[su_controller::class,'divisiView']);
        Route::post('/su/divisiView',[su_controller::class,'divisiAdd']);
        Route::post('/su/divisiUpdate',[su_controller::class,'divisiUpdate']);
        Route::post('/su/divisiDelete',[su_controller::class,'divisiDelete']);
        Route::get('/su/log',[su_controller::class,'log']);
    });

    Route::group(['middleware' => 'staff'], function(){
        //staff
        Route::get('/staff/dashboard',[sec_staff_controller::class,"dashboard"]);
        Route::get('/staff/taskMonitor',[sec_staff_controller::class,"showTaskMonitor"]);
        Route::post('/tambahTask',[sec_staff_controller::class,"tambahTask"]);
        Route::post('/editTask',[sec_staff_controller::class,"editTask"]);

        //Ajax
        Route::get('/staff/taskNavbar',[sec_staff_controller::class,'taskAjax']);

    });
    
    Route::group(['middleware' => 'ceo'], function(){
        //ceo
        Route::get('/ceo/dashboard',[ceo_controller::class,"dashboard"]);
        Route::match(["GET","POST"],'/ceo/taskMonitor',[ceo_controller::class,'showTaskMonitor']);
        Route::get('/ceo/message',[ceo_controller::class,'messageView']);
        Route::post('/ceo/sendMessage',[ceo_controller::class, 'sendMessage']);
        

        //Ajax
        Route::get('/ceo/messageNavbar',[ceo_controller::class,'messageAjax']);
        Route::get('/ceo/taskCom',[ceo_controller::class,'taskCompletion_ajax']);
        Route::get('/ceo/taskNavbar',[ceo_controller::class,'taskAjax']);

    });


    Route::group(['middleware' => 'regHead'], function(){
        //Reghead
        Route::get('/reghead/dashboard',[reg_head_controller::class,"dashboard"]);
        Route::match(["GET","POST"],'/reghead/taskMonitor',[reg_head_controller::class,'showTaskMonitor']);
        Route::get('/reghead/message',[reg_head_controller::class,'message']);
        Route::post('/reghead/fowardMessage',[reg_head_controller::class,'fowardMessage']);
        Route::post('/reghead/markAsRead',[reg_head_controller::class,'regHeadReadedMessage']);

        //Ajax
        Route::get('/reghead/messageNavbar',[reg_head_controller::class,'messageAjax']);
        Route::get('/reghead/taskCom',[reg_head_controller::class,'taskCompletion_ajax']);
        Route::get('/reghead/taskNavbar',[reg_head_controller::class,'taskAjax']);

    });

    Route::group(['middleware' => 'secHead'], function(){
        //sechead
        Route::get('/sechead/dashboard',[sec_head_controller::class,"dashboard"]);
        route::match(["GET","POST"],'/sechead/taskMonitor',[sec_head_controller::class,"showTaskMonitor"]);
        route::post('/sechead/taskMonitor/reject',[sec_head_controller::class,"rejectTask"]);
        route::post('/sechead/taskMonitor/approve',[sec_head_controller::class,"approveTask"]);
        Route::get('/sechead/message',[sec_head_controller::class,'message']);
        Route::get('/sechead/finalizeMessage/{idMessage}',[sec_head_controller::class,'finalizeStatusMessage']);
        Route::post('/sechead/markAsRead',[sec_head_controller::class,'markAsRead']);

        //Ajax
        Route::get('/sechead/messageNavbar',[sec_head_controller::class,'messageAjax']);
        Route::get('/sechead/taskNavbar',[sec_head_controller::class,'taskAjax']);
    });

    Route::group(['middleware' => 'divHead'], function(){
        //div head
        Route::get('/divhead/dashboard',[div_head_controller::class,"dashboard"]);
        route::match(["GET","POST"],'/divhead/taskMonitor',[div_head_controller::class,"showTaskMonitor"]);
        Route::post('/divhead/taskMonitor/approve',[div_head_controller::class, 'divHeadApproveTask']);
        Route::get('/divhead/message',[div_head_controller::class,'message']);
        Route::post('/divhead/markAsRead',[div_head_controller::class,'divHeadReadedMessage']);
        Route::post('/divhead/fowardMessage',[div_head_controller::class,'fowardMessage']);

        //Ajax
        Route::get('/divhead/messageNavbar',[div_head_controller::class,'messageAjax']);
        Route::get('/divhead/taskNavbar',[div_head_controller::class,'taskAjax']);
    });
    

    //general
    Route::get("/staff/navbar",[navbar::class, 'navbar']);//ajax
    
});






//landing
Route::view('/landing','landing');

Route::view('/t','raw.divHead.message');