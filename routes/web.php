<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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


//Login and Logout route
Route::get('/login', function () {
    return view('login');
});
Route::get("/logout",[TaskController::class,'Logout'])->name('UserLogout');



//Forgot password route
Route::get('/forgot',function(){
    return view('forgot');
});
Route::post('/PasswordForgot',[TaskController::class,'ClientForgot'])->name('ForgotPassword');

//Register route
Route::get('/register', function () {
    return view('register');
});
Route::post('/save',[TaskController::class,'SaveUser'])->name('ForNewUser');


Route::get('/taskboard',function(){
    return view('dashboard');
});



//Route for Authetication and Dashboard view
Route::post("/LoginCheck",[TaskController::class,'LoginCheck'])->name('ForLogin');
Route::get("/dashboard",[TaskController::class,'Dash'])->name("ClientDash");




//Route for add and update task details
Route::get('/update/{id}',[TaskController::class,'update'])->name('StatusUpdate');
Route::post('/AddTask',[TaskController::class,'AddTask'])->name("UserTaskAdd");




