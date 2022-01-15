<?php

namespace App\Http\Controllers;

use App\Models\attempttest;
use App\Models\questionbank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lockunlockmodule;

class AttempttestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($questionID)
    {
        $dataset = DB::table('test_modules')
        ->join('questionbanks', 'test_modules.TestID', '=', 'questionbanks.TestID')
        ->select('questionbanks.*', 'test_modules.*')
        ->where('questionbanks.QuestionID', '=', $questionID)
        ->get()
        ->first();  

        return view('User.userarea.question')
        ->with('Quest',$dataset);
    }
    
    public function start_test($testID)
    {
        $dataset = DB::table('test_modules')
        ->join('questionbanks', 'test_modules.TestID', '=', 'questionbanks.TestID')
        ->select('questionbanks.*', 'test_modules.*')
        ->where('questionbanks.TestID', '=', $testID)
        ->get();

        return view('User.userarea.startTest')
        ->with('test',$dataset)
        ->with('noQ',$dataset->count());

    }
    
    public function list_test()
    {
        $a = array();
        $dataset = DB::table('test_modules')
        ->join('chapters', 'test_modules.ChapterID', '=', 'chapters.ChapterID')
        ->select('chapters.*', 'test_modules.*')
        ->where('chapters.ChapterID', '=', 1)
        ->get();
        foreach($dataset as $dt){
            $unlockValue=Lockunlockmodule::where('ContentType','=','1')
            ->where('unLock','=','1')
            ->where('ContentID','=',$dt->TestID)
            ->get()
            ->first();
            if($unlockValue){
                $a[$dt->TestID] = $unlockValue->unLock;
            }else {
                $a[$dt->TestID] = 0;
            }
        }
        // print_r($a);
        return view('User.userarea.listTest')
        ->with('tests',$dataset)
        ->with('noT',$dataset->count())
        ->with('unLocked',$a);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attempttest  $attempttest
     * @return \Illuminate\Http\Response
     */
    public function show(attempttest $attempttest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attempttest  $attempttest
     * @return \Illuminate\Http\Response
     */
    public function edit(attempttest $attempttest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attempttest  $attempttest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attempttest $attempttest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attempttest  $attempttest
     * @return \Illuminate\Http\Response
     */
    public function destroy(attempttest $attempttest)
    {
        //
    }
}