<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendance;

class AttendanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

//take attendance----------

    public function add_attendance(){

         $attendance=DB::table('employees')->get();

         return view('attendance.take_attendance',compact('attendance'));
    }


    public function attendance_store(Request $request){

          $date=$request->att_date;
          $atten_date=DB::table('attendances')->where('att_date',$date)->first();

        if($atten_date){

            $notification=array(
                 'messege'=>'Attendance already taken ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);

        }else{
             
              $employee=$request->emp_id;
              foreach ($employee as $id) {
                 $data[]=[
                 "emp_id"=>$id,
                 "attendance"=>$request->attendance[$id],
                 "att_date"=>$request->att_date,
                 "month"=>$request->month,
                 "att_year"=>$request->att_year,
                 "edit_date"=>date("d_m_y")
               ];
             }

        $att=DB::table('attendances')->insert($data);
         if ($att) {
                 $notification=array(
                 'messege'=>'Successfully  Attendance Taken ',
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
            
            }  

             
    }

//all attendance=--------------

    public function all_attendance(){

         $att_all=DB::table('attendances')->select('edit_date')->groupBY('edit_date')->get();
         return view ('attendance.all_attendance',compact(('att_all')));
    }


///etid attendance----------
public function edit_attendance($edit_date){
 $date=DB::table('attendances')->where('edit_date',$edit_date)->first();
 $edit=DB::table('attendances')->join('employees','attendances.emp_id','employees.id')->select('employees.name','employees.photo','attendances.*')
 ->where('edit_date',$edit_date)->get();
 return view('attendance.edit_attendance',compact('edit','date'));
}


public function update_attendance(Request $request){
    $att_id=$request->id;
    foreach ($att_id as $id) {
                 $data[]=[
                 "id"=>$id,
                 "attendance"=>$request->attendance[$id],
                 "att_date"=>$request->att_date,
                 "month"=>$request->month,
                 "att_year"=>$request->att_year,
                 "edit_date"=>$request->edit_date
               ];

                $attendence= Attendance::where(['att_date' =>$request->att_date, 'id'=>$id])->first();
            $attendence->update($data);
                
}




   
      if ($attendence) {
                 $notification=array(
                 'messege'=>'Successfully  Attendance Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.attendance')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }      
            
            }


     ///view attendance---------
     public function view_attendance($edit_date){

 $date=DB::table('attendances')->where('edit_date',$edit_date)->first();
 $single=DB::table('attendances')->join('employees','attendances.emp_id','employees.id')->select('employees.name','employees.photo','attendances.*')
 ->where('edit_date',$edit_date)->get();

 return view ('attendance.view_attendance',compact('single','date'));

     }  

 ////delete attendance-------------
 public function delete_attendance($edit_date){
 $dltuser=DB::table('attendances')->where('edit_date',$edit_date)->delete();

if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Attendance Deleted ',
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
 }           
    
}
