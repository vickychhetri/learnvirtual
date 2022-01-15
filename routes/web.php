<?php

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
    return view('login');
});
Route::get('/video', function () {
    return view('video');
});    

Route::get('/Admin-Login', function () {
    return view('Admin.AdminLogin');
});    


Route::get('/Dashboard', function () {
    return view('Admin.dashboard');
});    

Route::get('/Add/Course', 'App\Http\Controllers\CourseController@index');
Route::post('/Add/Course', 'App\Http\Controllers\CourseController@store');

Route::get('/Add/Subject', 'App\Http\Controllers\SubjectController@index');
Route::post('/Add/Subject', 'App\Http\Controllers\SubjectController@store');


Route::get('/Add/Chapter', 'App\Http\Controllers\ChapterController@index');
Route::post('/Add/Chapter', 'App\Http\Controllers\ChapterController@store');


//User
Route::get('/Register', 'App\Http\Controllers\LoginuserController@index');

Route::post('/Register', 'App\Http\Controllers\LoginuserController@store');

Route::get('/Login', function () {
    return view('login');
});

// Forgot or logout session 
Route::get('/noaccess', function () {
    Session()->forget('username');
    Session()->forget('password');
    Session()->flush();
    return redirect("/Login")->with('message', ' User is logged out !');
});
Route::post('/Login', 'App\Http\Controllers\LoginuserController@login_check');





//check register
//if valid open dashboard

// Protected group by middleware
Route::group(["middleware" => ["UserLogChecker"]], function(){
Route::get('/UDashboard', 'App\Http\Controllers\userdasboard@index');

Route::get('/User/Start-Course', 'App\Http\Controllers\userdasboard@courseStart');
Route::get('/User/Demographic', 'App\Http\Controllers\userdasboard@demographics');
Route::get('/User/Test/{questionID}', 'App\Http\Controllers\AttempttestController@index');
Route::get('/User/Start-Test/{testID}', 'App\Http\Controllers\AttempttestController@start_test');

Route::get('/User/list-Test', 'App\Http\Controllers\AttempttestController@list_test');
Route::get('/User/Start-Test/{testID}', 'App\Http\Controllers\AttempttestController@start_test');


});