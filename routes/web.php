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