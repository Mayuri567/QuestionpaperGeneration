<?php
namespace App\Http\Controllers;
use App\faculty;
use Session;
use App\Providers\SweetAlertServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FacultyController extends Controller
{
    public function checkmail(Request $req)
    {
        $email = $req->email;
        $cmail = DB::table('faculties')
        ->where('email','=',$email)
        ->get();        
        if(count($cmail)>0)
        {
            return $email;
        }
        else
        {
            return back()->with('error', 'Enter Proper Email Address!');
        }
    }
    public function store(Request $req)
    {
        $faculty=new faculty;
        $validator=Validator::make($req->all(),[
            // 'username'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'password'=>'required |min:8|max:15',
            'confirmpass'=>'required|same:password',
            'departmentname'=>'required',
            'designation'=>'required',
            'image'=>'required'
        ],
        [
            // 'username.required'=>'*Username can not be NULL*',
            'firstname.required'=>'*Firstname can not be NULL*',
            'lastname.required'=>'*Lastname can not be NULL*',
            'email.required'=>'*Email can not be NULL*',
            'password.required'=>'*Password can not be NULL*',
            'password.min'=>"*Password should be minimum 8 character*",
            'confirmpass.required'=>'*Re-Password can not be NULL*',
            'confirmpass.same'=>'*Password did not match*',
            'image.required'=>'*Enter Photo*',
            'designation.required'=>'*Enter Designation*',
            'departmentname.required'=>'*Enter Department Name*'
        ]);

        $file=$req->file("image");
        $filename=$req->firstname.'faculty.'.$file->getClientOriginalExtension();
        $file->move('facultyphoto\\',$filename);

        // $aid='002';
        // $admin->admin_id="";
        $faculty->image=$filename;
        // $admin->admin_id=$req->username;
        $faculty->firstname=$req->firstname;
        $faculty->lastname=$req->lastname;
        $faculty->email=$req->email;
        $faculty->admin_id=Session::get('aid');
        $faculty->password=$req->password;
        $faculty->department_id=$req->department;
        $faculty->designation=$req->designation;
        // $department->departmentname=$req->departmentname;
        $faculty->save();
        // $department->save();
            if($faculty->save()==TRUE)
            {
                // $req->session()->flash('suc','Sucessfully Added');
                return redirect('showfaculty')->with('success', 'Data Saved Successfully!');
            }
            else
            {
                // $req->session()->flash('error','Failed');
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();;
            }
    }
    public function show(Request $req)
    {
        $adid=$req->session()->get("aid");

        $user = DB::table('faculties')
       ->join('departments', 'departments.department_id', '=', 'faculties.department_id')
       ->select('departments.department_name','faculties.faculty_id','faculties.firstname','faculties.lastname','faculties.email','faculties.designation','faculties.image')
       ->where('departments.admin_id','=',$adid)
       ->get();

        if(!$req->session()->get('user'))
        {
            return redirect('adminlogin');
        }
        else
        {
            return view('showfaculty',['data'=>$user]);
        }
    }


    public function destroy(Request $req,$id)
    {
        DB::table('faculties')->where('faculty_id', '=', $id)->delete();
    }


    public function logincheck(Request $req)
    {
        $id=$req->input('email');
        $psd=$req->input('password');

            $cl= DB::table('faculties')->where(['email'=>$id,'password'=>$psd])->pluck('firstname');
            $image=DB::table('faculties')->where(['email'=>$id,'password'=>$psd])->pluck('image');
            $aid=DB::table('faculties')->where(['email'=>$id,'password'=>$psd])->pluck('faculty_id');

            if(count($cl)==1)
            {
                $req->session()->put('fname',str_replace(["[","]","\""], '',$cl));
                $req->session()->put('photo',str_replace(["[","]","\""], '',$image));
                $req->session()->put('fid',str_replace(["[","]","\""], '',$aid)); 
                return redirect('/faculty')->with('success', 'Login Successfully!!');
            }
            else
            {   
                return back()->with('warning', 'Username and Password did not match!!');
            }
    }

    public function checkfacultyedit(Request $req,$id)
    {
        $faculty=faculty::find($id);
        $validator=Validator::make($req->all(),[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'password'=>'required |min:8|max:15',
            'confirmpass'=>'required|same:password',
            'department'=>'required',
            'designation'=>'required'
        ],
        [
            // 'username.required'=>'*Username can not be NULL*',
            'firstname.required'=>'*Firstname can not be NULL*',
            'lastname.required'=>'*Lastname can not be NULL*',
            'email.required'=>'*Email can not be NULL*',
            'password.required'=>'*Password can not be NULL*',
            'password.min'=>"*Password should be minimum 8 character*",
            'confirmpass.required'=>'*Re-Password can not be NULL*',
            'confirmpass.same'=>'*Password did not match*',
            'image.required'=>'*Enter Photo*',
            'designation.required'=>'*Enter Designation*',
            'department.required'=>'*Enter Department Name*'
        ]);
        if($validator->fails())
        {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        else
        {
            if($req->hasfile('photo'))
            {
             $image_path = public_path().'\\facultyphoto\\'.$faculty->image;
             unlink($image_path);
             $file=$req->file('photo');
             $ext=$file->getClientOriginalExtension();
             $filename=$req->firstname.'faculty.'.$ext;
             $file->move('facultyphoto/',$filename);
             $faculty->image=$filename;
            }
                $faculty->department_id=$req->department;
                $faculty->designation=$req->designation;
                $faculty->firstname=$req->firstname;
                $faculty->lastname=$req->lastname;
                $faculty->email=$req->email;
                $faculty->password=$req->password;
                $faculty->save();
            
        return redirect('faculty')->with('success', 'Data Edited Successfully!');
        }
    }

    public function editfaculty($fid)
    {
        $faculty=faculty::find($fid);
        return view('editfaculty')->with('data',$faculty);
    }
}
