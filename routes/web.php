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

Route::get('/login', function () {
    return view('login');
});
Route::post("/LoginCheck",[TaskController::class,'LoginCheck'])->name('ForLogin');
Route::get("/dashboard",[TaskController::class,'Dash'])->name("ClientDash");
Route::get("/logout",[TaskController::class,'Logout'])->name('UserLogout');
// Route::match(['get', 'post'], '/Dashboard', 'TaskController@LoginCheck');
// Route::match(['get', 'post'], '/Dashboard', [TaskController::class, 'LoginCheck']);

Route::get('/register', function () {
    return view('register');
});


Route::post('/save',[TaskController::class,'SaveUser'])->name('ForNewUser');
Route::get('/update/{id}',[TaskController::class,'update'])->name('ForNewUser');



Route::get('/forgot',function(){
    return view('forgot');
});



Route::post('/PasswordForgot',[TaskController::class,'ClientForgot'])->name('ForgotPassword');

Route::post('/AddTask',[TaskController::class,'AddTask'])->name("UserTaskAdd");

Route::get('/taskboard',function(){
    return view('dashboard');
});
