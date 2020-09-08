<?php

namespace App\Http\Controllers;
use App\Providers\Course1;
use App\course;
use App\Providers\SweetAlertServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function show(Request $req)
    {
        $result= DB::table('courses')
        ->join('departments', 'departments.department_id', '=', 'courses.department_id')
        ->select('departments.department_name','courses.course_id','courses.course_name')
        ->get();

        if(!$req->session()->get('user'))
        {
            return redirect('adminlogin');
        }
        else
        {
            return view('addcourse')->with('addcourse',$result);
        }
    }
    
    public function savecourse(Request $req)
    {
        $course=new course;
        $course->course_name=$req->coursename;
        $course->department_id=$req->department;
        $course->save();
    }
    
    public function editdata(Request $req,$course_id)
    {
        $department = DB::table('courses')->where('course_id', $course_id)->update([
            'course_name' => $req->input('coursename'),
            'department_id' => $req->input('department')
            ]);
    }

    public function deletedata($id)
    {
        DB::table('courses')->where('course_id', '=', $id)->delete();
    }

}
