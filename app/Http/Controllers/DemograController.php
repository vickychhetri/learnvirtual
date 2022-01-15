<?php

namespace App\Http\Controllers;

use App\Models\Demogra;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DemograController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'age' => 'required',
            'gender' => 'required',
            'college' => 'required',
            'state' => 'required',
            'yearStudy' => 'required',
            'inforRef'=>'required',
            'infoRefExplanation'=>'required'
        ]);
        try {
    
    $database_agent2= Demogra::where('UserID','=',session()->get('userid'))->get()->first();
    if($database_agent2){
        return redirect()->back()->with('Error', 'Error : Already Present !');
    }
    $database_agent= new Demogra;
    $database_agent->age=$request->age;
    $database_agent->gender=$request->gender;
    $database_agent->college=$request->college;
    $database_agent->state=$request->state;

    $database_agent->yearStudy=$request->yearStudy;
    $database_agent->alreadyInformation=$request->inforRef;
    $database_agent->alreadyIExplanation=$request->infoRefExplanation;
    $database_agent->UserID=session()->get('userid');

    $database_agent->save();
    
        } catch (QueryException $e) {    
            print($e);
    // return redirect()->back()->with('Error', 'Error : Try Again !');
    }
// open module
  //  return redirect('/Login')->with('message', 'Registration Successfully Done ! , login Now.');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demogra  $demogra
     * @return \Illuminate\Http\Response
     */
    public function show(Demogra $demogra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demogra  $demogra
     * @return \Illuminate\Http\Response
     */
    public function edit(Demogra $demogra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demogra  $demogra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demogra $demogra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demogra  $demogra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demogra $demogra)
    {
        //
    }
}
