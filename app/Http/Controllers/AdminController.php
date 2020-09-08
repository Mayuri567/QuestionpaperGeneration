<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    function checkadminedit(Request $req,$id)
    {
        $admin=admin::find($id);
        $req->validate([
            'confirmpass'=>'required|same:password'
        ],
        [
            'confirmpass.required'=>'*Re-Password can not be NULL*',
            'confirmpass.same'=>'*Password did not match*'
        ]);
        if($req->hasfile('photo'))
        {
            $image_path = public_path().'\\adminphoto\\'.$admin->image;
            unlink($image_path);
            $file=$req->file('photo');
            $ext=$file->getClientOriginalExtension();
            $filename=$req->firstname.'admin.'.$ext;
            $file->move('adminphoto/',$filename);
            $admin->image=$filename;
        }
        else
        $admin->firstname=$req->firstname;
        $admin->lastname=$req->lastname;
        $admin->email=$req->email;
        $admin->password=$req->password;
        $admin->save();

        return redirect('showadmin');
    }

    function editadmin(Request $req,$id)
    {
        $admin=admin::find($id);
        return view('editprofile')->with('data',$admin);
    }

    function showadmin(Request $req)
    {
        $admin = admin::all();
        if(!$req->session()->get('user'))
        {
            return redirect('adminlogin');
        }
        else
        {
            return view('showadmin',['data'=>$admin]);
        }
    }

    function savedata(Request $req)
    {
        $admin=new admin;
        $req->validate([
            // 'username'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'password'=>'required |min:8|max:15',
            'confirmpass'=>'required|same:password',
            // 'departmentname'=>'required',
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
            // 'departmentname.required'=>'*Enter Department Name*'
        ]);

        $file=$req->file("image");
        $filename=$req->firstname.'admin.'.$file->getClientOriginalExtension();
        $file->move('adminphoto\\',$filename);

        // $aid='002';
        // $admin->admin_id="";
        $admin->image=$filename;
        // $admin->admin_id=$req->username;
        $admin->firstname=$req->firstname;
        $admin->lastname=$req->lastname;
        $admin->email=$req->email;
        $admin->password=$req->password;
        // $department->departmentname=$req->departmentname;
        $admin->save();
        // $department->save();
            if($admin->save()==TRUE)
            {
                $req->session()->flash('suc','Sucessfully Added');
                return redirect('showadmin');
            }
            else
            {
                $req->session()->flash('error','Failed');
                return redirect('addadmin');
            }
    }

    function checkadmin(Request $req)
    {
        $id=$req->input('email');
        $psd=$req->input('password');
        
            $cl= DB::table('admins')->where(['email'=>$id,'password'=>$psd])->pluck('firstname');
            $image=DB::table('admins')->where(['email'=>$id,'password'=>$psd])->pluck('image');
            $aid=DB::table('admins')->where(['email'=>$id,'password'=>$psd])->pluck('admin_id');
            if(count($cl)==1)
            {
                $req->session()->put('user',str_replace(["[","]","\""], '',$cl));
                $req->session()->put('photo',str_replace(["[","]","\""], '',$image));
                $req->session()->put('aid',str_replace(["[","]","\""], '',$aid)); 
                return redirect('/adminpanel')->with('success', 'Login Successfully!!');
            }
            else
            {   
                // $req->session()->flash('data','*Your Username and Password did not match*');
                // return redirect('/adminlogin');
                return back()->with('warning', 'Username and Password did not match!!');
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
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
