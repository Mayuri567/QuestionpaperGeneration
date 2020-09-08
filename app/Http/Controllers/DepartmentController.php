<?php
namespace App\Http\Controllers;
use App\department;
use Session;
use App\Providers\SweetAlertServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function savedata(Request $req)
    {
        $department=new department;
        $validator=Validator::make($req->all(),[
            'departmentname'=>'required',
            'university'=>'required',
            'city'=>'required'
            ],
            [
                'university.required'=>'*Please Select University *'
            ]);
        if ($validator->fails()) 
        {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $department->department_name=$req->departmentname;
        $department->city=$req->city;
        $department->university_id=$req->university;
        $department->admin_id=$req->session()->get('aid');
        $department->save();
        return redirect('showdepartment')->with('success', 'Data Saved Successfully!');
    }
    public function editdata(Request $req,$department_id)
    {
        $department = DB::table('departments')->where('department_id', $department_id)->update([
            'department_name' => $req->input('departmentname'),
            'city' => $req->input('city'),
            'university_id' => $req->input('university'),
            'admin_id' => $req->session()->get('aid')
            ]);
    }

    public function deletedata($id)
    {
        DB::table('departments')->where('department_id', '=', $id)->delete();
        return redirect('showdepartment');
    }

    public function showdata(Request $req)
    {
        // $user = DB::select('select * from departments');

        $adid=$req->session()->get("aid");

        $user = DB::table('departments')
       ->join('universities', 'universities.university_id', '=', 'departments.university_id')
    //    ->join('country', 'country.country_id', '=', 'state.country_id')
       ->select('departments.department_name','departments.department_id','departments.city','universities.university_name')
       ->where('departments.admin_id','=',$adid)
       ->get();

        if(!$req->session()->get('user'))
        {
            return redirect('adminlogin');
        }
        else
        {
            return view('showdepartment',['data'=>$user]);
        }
    }
}
