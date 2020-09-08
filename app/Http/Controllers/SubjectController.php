<?php

namespace App\Http\Controllers;
use App\Providers\Course1;
use App\Providers\SweetAlertServiceProvider;
use Illuminate\Support\Facades\DB;
use App\subject;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function store(Request $req)
    {
        //
        $subject=new subject;
        $subject->subject_name=$req->subjectname;
        $subject->course_id=$req->course;
        $subject->semester=$req->semester;
        $subject->faculty_id=$req->session()->get('fid');
        $subject->save();
    }

    public function show(Request $req)
    {
        //
            $res= DB::table('subjects')
            ->join('courses', 'courses.course_id', '=', 'subjects.course_id')
            ->select('courses.course_name','subjects.subject_id','subjects.subject_name','subjects.semester')
            ->where('faculty_id','=',$req->session()->get('fid'))
            ->get();

            if(!$req->session()->get('fname'))
            {
                return redirect('/');
            }
            else
            {
                return view('subject')->with('subject',$res);
            }
    }
    public function edit(Request $req,$id)
    {
        //
        $department = DB::table('subjects')->where('subject_id', $id)->update([
            'subject_name' => $req->input('subjectname'),
            'course_id' => $req->input('course'),
            'semester' => $req->input('semester')
            ]);
    }
    public function destroy($id)
    {
        //
        DB::table('subjects')->where('subject_id', '=', $id)->delete();
    }
}
