<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;

class EmployeeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){

  return view('employee.add_employee');


    }


///insert employee

    public function store(Request $request){

   $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:employees|max:255',
        'phone' => 'required',
        'photo' => 'required',
        'salary' => 'required',



    ]);

              $data=array();
              $data['name']=$request->name;
              $data['email']=$request->email;
              $data['phone']=$request->phone;

               $data['address']=$request->address;
              $data['experience']=$request->experience;
              $data['nid_no']=$request->nid_no;
              $data['salary']=$request->salary;
              $data['vacation']=$request->vacation;
              $data['city']=$request->city;
              $image=$request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;

                $employee=DB::table('employees')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
              
            }
        }else{
            return Redirect()->back();
        }

    }



    //show all employee


    public function Employees(){

      $employees=Employee::all();

      return view('employee.all_employee', compact('employees'));
    }
//view single employee

    public function view($id){


      $single=Employee::findOrfail($id);
      return view('employee.view_employee', compact('single'));
    }
/// delete single employees


     public function DeleteEmployee($id){


      $delete=DB::table('employees')
                ->where('id',$id)
                ->first();
         $photo=$delete->photo;
         unlink($photo);
         $dltuser=DB::table('employees')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Employee Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }               

      
    }

   // update Employee

    public function EditEmployee($id){

  
     $edit=Employee::findOrfail($id);
      return view('employee.update_employee', compact('edit'));

    }


    public function UpdateEmployee(Request $request,$id){

     $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:employees|max:255',
        'phone' => 'required',
        'photo' => 'required',
        'salary' => 'required',



    ]);



      $data=array();
              $data['name']=$request->name;
              $data['email']=$request->email;
              $data['phone']=$request->phone;

               $data['address']=$request->address;
              $data['experience']=$request->experience;
              $data['nid_no']=$request->nid_no;
              $data['salary']=$request->salary;
              $data['vacation']=$request->vacation;
              $data['city']=$request->city;
              $image=$request->photo;

              if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                
                $img=DB::table('employees')
                         ->where('id',$id)->first();
                 $image_path=$img->photo;
                 $done=unlink($image_path);
                 $employee=DB::table('employees')->where('id',$id)->update($data);      
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Information Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
              
            }
        }else{
            return Redirect()->back();
        }


    }
}
