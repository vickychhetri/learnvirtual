<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    // check if form fill or not 
     // if form filled than start course sequence
     // if already started move to that section 


    }
}
