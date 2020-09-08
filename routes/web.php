<?php
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//for Admin

Route::get('/', function () {
    return view('facultylogin');
});

route::get('/adminlogin',function(){
    return view('adminlogin');
});

route::post('/admincheck','AdminController@checkadmin');

Route::get('adminpanel/',function(){
    if(!session()->has('user'))
    {
         return redirect('adminlogin');
    }
    else if(session()->has('user'))
    {
        return view('adminpanel');
    }
});

route::get('addadmin',function(){
    if(!session()->has('user'))
    {
         return redirect('adminlogin');
    }
    else if(session()->has('user'))
    {
        return view('addadmin');
    }
});

route::get('addfaculty',function(){
    if(!session()->has('user'))
    {
         return redirect('adminlogin');
    }
    else if(session()->has('user'))
    {
        return view('addfaculty');
    }
});

route::get('showfaculty','FacultyController@show');

route::get('deletefaculty/{department_id}','FacultyController@destroy');

route::any('savefaculty','FacultyController@store');

route::post('savedata','AdminController@savedata');

route::get('showadmin','AdminController@showadmin');

route::any('editadmin/{id}','AdminController@editadmin');

route::post('checkedit/{id}','AdminController@checkadminedit');

route::any('savecourse','CourseController@savecourse');

route::any('addcourse','CourseController@show');

route::get('deletecourse/{course_id}','CourseController@deletedata');

route::any('editcourse/{course_id}','CourseController@editdata');

route::any('adddepartment',function(){

    if(!session()->has('user'))
    {
         return redirect('adminlogin');
    }
    else if(session()->has('user'))
    {
        return view('adddepartment');
    }
});

route::any('showdepartment',function(){

    if(!session()->has('user'))
    {
         return redirect('adminlogin');
    }
    else if(session()->has('user'))
    {
        // Alert::success('Success Title', 'Success Message');
        return view('showdepartment');
    }
});

route::any('depart','DepartmentController@savedata');

route::get('deletedepart/{department_id}','DepartmentController@deletedata');

route::any('editdepart/{department_id}','DepartmentController@editdata');

route::any('showdepartment','DepartmentController@showdata');

route::get('/logout',function(){
    session()->forget('user');
    return view('logout');
});


//For Faculty


route::post('checkfaculty','FacultyController@logincheck');

route::get('forgetpassword',function(){
    return view('facultyresetpassword');
});

// route::any('checkemail','FacultyController@checkmail');

route::any('/faculty',function(){
    if(!session()->has('fname'))
    {
         return redirect('/');
    }
    else if(session()->has('fname'))
    {
        return view('facultypanel');
    }
});

route::post('checkfedit/{id}','FacultyController@checkfacultyedit');

route::any('editfaculty/{fid}','FacultyController@editfaculty');

route::any('subject','SubjectController@show');

route::any('savesubject','SubjectController@store');

route::any('editsubject/{sub_id}','SubjectController@edit');

route::get('deletesubject/{sub_id}','SubjectController@destroy');

route::any('chapter','ChapterController@show');

route::any('savechapter','ChapterController@store');

route::any('editchapter/{chap_id}','ChapterController@edit');

route::get('deletechapter/{chap_id}','ChapterController@destroy');

route::any('savequestion','QuestionController@store');

route::any('showquestion','QuestionController@show');

route::any('addquestion',function(){
    if(!session()->has('fname'))
    {
        return redirect('/');
    }
    else if(session()->has('fname'))
    {
        return view('addquestion');
    }
});

route::any('editquestion/{ques_id}','QuestionController@edit');

route::any('deletequestion/{ques_id}','QuestionController@destroy');

route::any('generatequedtionpaper',function(){
    if(!session()->has('fname'))
        {
            return redirect('/');
        }
        else if(session()->has('fname'))
        {
            return view('addquestionpaper');
        }
});

route::any('showquestionpaper','QuestionpaperController@show');

route::any('savequestionpaper','QuestionpaperController@addquestionpaper');

route::any('pdf/{questionpaperid}','QuestionpaperController@exportpdf');

route::any('logoutfaculty',function(){
    session()->forget('fname');
    return view('logoutfaculty');
});

//

route::any('/x',function(){
    toast('Your Post as been submited!','success');
    return view('x');
});