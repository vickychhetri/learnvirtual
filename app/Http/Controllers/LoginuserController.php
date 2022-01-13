<?php

namespace App\Http\Controllers;

use App\Models\loginuser;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LoginuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('User.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'fullName' => 'required|min:3|max:50',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'termCondition'=>'required'
        ]);

        try {
    $database_agent= new loginuser;
    $database_agent->name=$request->fullName;
    $database_agent->email=$request->email;
    $database_agent->mobile=$request->mobile;
    $database_agent->password=$request->password;
    $database_agent->save();
    
        } catch (QueryException $e) {    
            print($e);
    return redirect()->back()->with('Error', 'Error : Try Again !');
    }

    return redirect('/Login')->with('message', 'Registration Successfully Done ! , login Now.');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loginuser  $loginuser
     * @return \Illuminate\Http\Response
     */
    public function show(loginuser $loginuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loginuser  $loginuser
     * @return \Illuminate\Http\Response
     */
    public function edit(loginuser $loginuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loginuser  $loginuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loginuser $loginuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loginuser  $loginuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(loginuser $loginuser)
    {
        //
    }
}