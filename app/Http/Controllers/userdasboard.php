<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Demogra;
class userdasboard extends Controller
{
    public function index()
    {
            return view('User.userarea.dashboard');      
    }
    public function demographics(){
        return view('User.userarea.demographic');     
    }

    public function courseStart(){
        $database_agent2= Demogra::where('UserID','=',session()->get('userid'))->get()->first();
        if($database_agent2){
            return redirect('/User/list-Test');
        }
        return view('User.userarea.demographic');     
    // check if form fill or not 
     // if form filled than start course sequence
     // if already started move to that section 


    }
}
