<?php

namespace App\Http\Controllers;

use App\question;
use App\updatequestion;
use Carbon\Carbon;
use Session;
use App\Providers\SweetAlertServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
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
    public function store(Request $req)
    {
        //
        $question=new question;
        $validator=Validator::make($req->all(),[
            'chapter'=>'required',
            'question'=>'required',
            'level'=>'required'
            ],
            [
                'chapter.required'=>'*Please Select Chapter *',
                'chapter.required'=>'*Please Select Difficulty Level *'
            ]);
        if ($validator->fails()) 
        {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $question->question=$req->question;
        $question->chapter_id=$req->chapter;
        $question->difficulty_level=$req->level;
        $question->faculty_id=$req->session()->get('fid');
        $question->save();
        return redirect('showquestion')->with('success', 'Data Saved Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        $adid=$req->session()->get("fid");

        $user = DB::table('questions')
       ->join('chapters', 'chapters.chapter_id', '=', 'questions.chapter_id')
       ->select('chapters.chapter_name','questions.question_id','questions.question','questions.difficulty_level')
       ->where('questions.faculty_id','=',$adid)
       ->get();

        if(!$req->session()->get('fname'))
        {
            return redirect('/');
        }
        else
        {
            return view('showquestion',['ques'=>$user]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req,$id)
    {
        $update=question::find($id);
        if($req->question!=$update->question)
        {
            $updatequestion= new updatequestion;
            $updatequestion->question_id=$id;
            $updatequestion->old_question=$update->question;
            $updatequestion->new_question=$req->question;
            $updatequestion->faculty_id=$req->session()->get('fid');
            $updatequestion->time_of_update=Carbon::now()->timestamp;
            $updatequestion->save();
        }
        else
        {

        }

        $question = DB::table('questions')->where('question_id', $id)->update([
            'question' => $req->input('question'),
            'chapter_id' => $req->input('chapter'),
            'difficulty_level' => $req->input('level')
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('questions')->where('question_id', '=', $id)->delete();
    }
}
