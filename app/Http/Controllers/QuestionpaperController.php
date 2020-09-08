<?php

namespace App\Http\Controllers;
use App\question;
use Session;
use App\Providers\SweetAlertServiceProvider;
use Illuminate\Support\Facades\DB;
use App\questionpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionpaperController extends Controller
{
    function exportpdf(Request $req,$questionpaper_id)
    {
        $questionpaper=questionpaper::find($questionpaper_id);
        $q=DB::table('questionpapers')
        ->join('faculties','faculties.faculty_id','=','questionpapers.faculty_id')
        ->join('departments','departments.department_id','=','faculties.department_id')
        ->join('subjects','subjects.subject_id','=','questionpapers.subject_id')
        ->join('courses','courses.course_id','=','subjects.course_id')
        ->select('courses.course_name','subjects.subject_name','subjects.semester','departments.department_name','questionpaper_id','date','exam_code','time_of_exam','no_of_module','mark_per_module','question_per_module','options','difficulty_level')
        ->where('questionpaper_id','=',$questionpaper_id)
        ->get();

        $qno_of_module=DB::table('questionpapers')->where('questionpaper_id','=',$questionpaper_id)->pluck('no_of_module');
        $no_of_module=str_replace(["[","]","\""], '',$qno_of_module);

        $q_per_module=DB::table('questionpapers')->where('questionpaper_id','=',$questionpaper_id)->pluck('question_per_module');
        $q_p_m=str_replace(["[","]","\""], '',$q_per_module);

        $qoptions=DB::table('questionpapers')->where('questionpaper_id','=',$questionpaper_id)->pluck('options');
        $options=str_replace(["[","]","\""], '',$qoptions);
        if($no_of_module==1)
        {
            $ques1=DB::table('questions')
            ->select('question')
            ->inRandomOrder()->limit($no_of_module+$options)
            ->where('difficulty_level','=',$questionpaper->difficulty_level)
            ->get();

            $pdf = \PDF::loadView('pdf',array('d'=>$q),array('ques'=>$ques1))->setPaper('a4','portrait');

            $pdfname=$questionpaper->exam_code.''.$questionpaper->date;
            return $pdf->stream($pdfname . '.pdf');
        } 
        else if($no_of_module==2)
        {
            $questions = [];
            $questions2 = [];
            $ques1=DB::table('questions')
            ->select('question')
            ->inRandomOrder()->limit(($no_of_module+$options)*2)
            ->where('difficulty_level','=',$questionpaper->difficulty_level)
            ->get();

            // return $ques1;

            // $quesec=DB::table('questions')
            // ->select('question')
            // ->inRandomOrder()->limit($no_of_module+$options)
            // ->where('difficulty_level','=',$questionpaper->difficulty_level)
            // ->get();
            // int $i = 0;
            for($i=0;$i<(($q_p_m+$options)*2);$i++)
            {
                if($i<($q_p_m+$options))
                {
                
                    $questions[$i]=$ques1[$i];
                }
                else
                {
                    $questions2[$i]=$ques1[$i];
                }
            }
            // return $ques1[1]['question'];
            $questions['ques'] = $questions;
            $questions['quesec'] = $questions2;
            $pdf = \PDF::loadView('pdf',array('d'=>$q),array('ques'=>$questions))->setPaper('a4','portrait');

            $pdfname=$questionpaper->exam_code.''.$questionpaper->date;
            return $pdf->stream($pdfname . '.pdf');
        }
        else if($no_of_module==3)
        {
            $questions = [];
            $questions1=[];
            $questions2 = [];
            $questions3 = [];
            $ques1=DB::table('questions')
            ->select('question')
            ->inRandomOrder()->limit(($q_p_m+$options)*($no_of_module))
            ->where('difficulty_level','=',$questionpaper->difficulty_level)
            ->get();
            for($i=0;$i<(($q_p_m+$options)*($no_of_module));$i++)
            {
                if($i<($q_p_m+$options))
                {
                    $questions1[$i]=$ques1[$i];
                }
                else if($i<(($q_p_m+$options)*2))
                {
                    $questions2[$i]=$ques1[$i];
                }
                else if($i<(($q_p_m+$options)*3))
                {
                    $questions3[$i]=$ques1[$i];
                }
            }
            // return $questioins3;
            // return $ques1[1]['question'];
            $questions['ques'] = $questions1;
            $questions['quesec'] = $questions2;
            $questions['quesec3'] = $questions3;

            $pdf = \PDF::loadView('pdf',array('d'=>$q),array('ques'=>$questions))->setPaper('a4','portrait');

            $pdfname=$questionpaper->exam_code.''.$questionpaper->date;
            return $pdf->stream($pdfname . '.pdf');
        }
        // $pdf = \PDF::loadView('pdf',array('d'=>$q),array('ques'=>$ques1))->setPaper('a4','portrait');

        // $pdfname=$questionpaper->exam_code.''.$questionpaper->date;
        // return $pdf->stream($pdfname . '.pdf');
        // $q=DB::table('questions')
        // ->join('subjects', 'subjects.subject_id', '=', $req->subject)
        // ->select('questions.course_name','subjects.subject_id','subjects.subject_name','subjects.semester')
        // ->get();
    }
    public function addquestionpaper(Request $req)
    {
        // return $req;
        $questionpaper=new questionpaper;
        $validator=Validator::make($req->all(),[
            'subject'=>'required',
            'time'=>'required',
            'date'=>'required',
            'markspm'=>'required',
            'difficulty'=>'required',
            'module'=>'required',
            'questionpm'=>'required',
            'option'=>'required',
            'examcode'=>'required'
            ],
            [
                'subject.required'=>'*Please Select Subject *',
                'date.required'=>'*Please Select Date *',
                'time.required'=>'*Please Select Time *',
                'markspm.required'=>'*Please Enter Mark Per Module*',
                'difficulty.required'=>'*Please Select Difficulty Level *',
                'module.required'=>'*Please Select Module *',
                'questionpm.required'=>'*Please Select Question Per Module *',
                'examcode.required'=>'*Please Select Exam Code *',
                'option.required'=>'*Please Select Option *'
            ]);
        if ($validator->fails()) 
        {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        else
        {
            $questionpaper->faculty_id=$req->session()->get('fid');
            $questionpaper->subject_id=$req->subject;
            $questionpaper->date=$req->date;
            $questionpaper->difficulty_level=$req->difficulty;
            $questionpaper->no_of_module=$req->module;
            $questionpaper->exam_code=$req->examcode;
            $questionpaper->question_per_module=$req->questionpm;
            $questionpaper->time_of_exam=$req->time;
            $questionpaper->options=$req->option;
            $questionpaper->mark_per_module=$req->markspm;
            $questionpaper->save();
            return redirect('showquestionpaper')->with('success', 'Data Saved Successfully!'); 
        }
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\questionpaper  $questionpaper
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        $question = DB::table('questionpapers')
    //    ->join('universities', 'universities.university_id', '=', 'departments.university_id')
       ->select('date','questionpaper_id','difficulty_level','exam_code','mark_per_module','no_of_module','question_per_module','options')
    //    ->where('departments.admin_id','=',$adid)
       ->get();

    //    $cl= DB::table('admins')->where(['email'=>$id,'password'=>$psd])->pluck('firstname');
    //    $t=DB::select('select mark_per_module from questionpapers');

    // $t=DB::table('questionpapers')->pluck('mark_per_module');
    // $t1=DB::table('questionpapers')->pluck('no_of_module');
    // $qu1=str_replace(["[","]","\""],'',$t1);   
    // $qu=str_replace(["[","]","\""],'',$t)*$qu1;
    // return $qu;

        if(!$req->session()->get('fname'))
        {
            return redirect('/');
        }
        else
        {
            return view('showquestionpaper',['question'=>$question]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\questionpaper  $questionpaper
     * @return \Illuminate\Http\Response
     */
    public function edit(questionpaper $questionpaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\questionpaper  $questionpaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, questionpaper $questionpaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\questionpaper  $questionpaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(questionpaper $questionpaper)
    {
        //
    }
}
