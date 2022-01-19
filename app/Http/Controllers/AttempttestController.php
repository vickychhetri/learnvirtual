<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\attempttest;
use App\Models\questionbank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lockunlockmodule;
use App\Models\Testcomplete;

class AttempttestController extends Controller
{   
    public function isPreOrPost($testID){
        $TestType="0";
        $datasetComplete=Testcomplete::where('TestID','=',$testID)->get();
        // print_r($datasetComplete);
        if(!isset($datasetComplete->Complete)){
                $TestType="PRE";
        }else{
            $TestType="1";
        }
        return $TestType;
    }

    public function isTestLocked($testID){
        $unlock=0;
        $unlockValue=Lockunlockmodule::where('ContentType','=','1')
        ->where('unLock','=','1')
        ->where('ContentID','=',$testID)
        ->get()
        ->first();

        if(isset($unlockValue)){
            if($unlockValue->unLock==1){
                $unlock=1;
            }else {
                $unlock=0;
            }
        }else {
            $unlock=0;
        }
        return $unlock;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($testID)
    {
        $obj=new AttempttestController();
        $unlock=$obj->isTestLocked($testID);
        if($unlock==0){
            return redirect('/User/list-Test');
        }

        $TestType=$obj->isPreOrPost($testID);

        $dataset = DB::table('test_modules')
        ->join('questionbanks', 'test_modules.TestID', '=', 'questionbanks.TestID')
        ->select('questionbanks.*', 'test_modules.*')
        ->where('questionbanks.TestID', '=', $testID)
        ->get();

        Session()->put('QuestData',$dataset);
        Session()->put('TestType',$TestType);

        return view('User.userarea.question')
        ->with('Quest',$dataset)
        ->with('TestType',$TestType)
        ->with('noQ',$dataset->count());
    }
    
    public function start_test($testID)
    {
        // $TestType="0";
        // $datasetComplete=Testcomplete::where('TestID','=',$testID)->get();
        // // print_r($datasetComplete);
        // if(!isset($datasetComplete->Complete)){
        //         $TestType="PRE";
        // }else{
        //     $TestType="1";
        // }
        $obj=new AttempttestController();
        $TestType=$obj->isPreOrPost($testID);

        $unlock=$obj->isTestLocked($testID);
        if($unlock==0){
            return redirect('/User/list-Test');
        }
        $dataset = DB::table('test_modules')
        ->join('questionbanks', 'test_modules.TestID', '=', 'questionbanks.TestID')
        ->select('questionbanks.*', 'test_modules.*')
        ->where('questionbanks.TestID', '=', $testID)
        ->get();

        return view('User.userarea.startTest')
        ->with('test',$dataset)
        ->with('TestType',$TestType)
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
        $questionData=session()->get('QuestData');
        $TestType=session()->get('TestType');
        $UserID=session()->get('userid');
        $dateSubmit = Carbon::now();
        $TestIDs=0;
        $i=1;
                foreach($questionData as $questionD){
                $data[] = [
                            'TestType' => $TestType,
                            'TestID' =>$questionD->TestID,
                            'QuestionID' => $questionD->QuestionID,
                            'selectedAnswer' => $request["optionSelected".$i],
                            'UserID' =>$UserID,
                            'created_at'=>$dateSubmit,
                            'updated_at'=>$dateSubmit
                        ];
            $i++;
            $TestIDs=$questionD->TestID;
              }
              attempttest::insert($data);
                return redirect('/User/Test/reportAfterTest/'.$TestIDs.'/'. $TestType);
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