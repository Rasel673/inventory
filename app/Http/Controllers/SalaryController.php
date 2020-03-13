<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function advance(){


    	

  return view('salary.advance_salary');


    }
////insert advance
    public function store(Request $request){
        $validatedData = $request->validate([
        'emp_id' => 'required',
        'month'=>'required',
        'advance_salary'=>'required',
       'year' => 'required',
       
 ]);

    $month=$request->month;
    	$emp_id=$request->emp_id;
    	$year=$request->year;
   	
   		$advanced=DB::table('advancesalaries')
   		          ->where('month',$month)
   		          ->where('year',$year)
   		          ->where('emp_id',$emp_id)
   		          ->first();

   		if ($advanced === NULL) {
   		    $data=array();
	    	$data['emp_id']=$request->emp_id;
	    	$data['month']=$request->month;
	    	$data['advance_salary']=$request->advance_salary;
	    	$data['year']=$request->year;

    	 $advanced=DB::table('advancesalaries')->insert($data);
    	  if ($advanced) {
                 $notification=array(
                 'messege'=>'Successfully Advanced Paid ',
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
   		    	$notification=array(
                 'messege'=>'Oopss !! Allready advanced Paid in this month! ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
   		    }          	
    	
    }
////advance view

    public function All_advance(){
        $advance=DB::table('advancesalaries')
                ->join('employees','advancesalaries.emp_id','employees.id')
                ->select('advancesalaries.*','employees.name','employees.salary','employees.photo')
                ->orderBY('id','DESC')
                ->get();
    	return view('salary.all_advance',compact('advance'));
    }
///edit advance
    public function edit_advanced($id){
      $edit=DB::table('advancesalaries')->where('id',$id)->first();
    


      return view('salary.update_advance',compact('edit'));


    }


  public function update(Request $request,$id){

 $validatedData = $request->validate([
        'emp_id' => 'required',
        'month'=>'required',
        'advance_salary'=>'required',
       'year' => 'required',
       ]);



     
          $data=array();
        $data['emp_id']=$request->emp_id;
        $data['month']=$request->month;
        $data['advance_salary']=$request->advance_salary;
        $data['year']=$request->year;

       $advanced=DB::table('advancesalaries')->where('id',$id)->update($data);
        if ($advanced) {
                 $notification=array(
                 'messege'=>'Successfully Updated Advance Salary ',
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
  ///delete advanced
  public function delete($id){
  
     $dltuser=DB::table('advancesalaries')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Advance Deleted ',
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

    ///salary pay 
    public function pay_advance(){
    	$employee=DB::table('employees')->get();

          

    	return view('salary.pay_salary',compact('employee'));
    }

///insert category

    public function add_category(){
      return view('salary.add_category');
    }

    public function cat_store(Request $request){
        $validatedData = $request->validate([
        'name' => 'required',
        
       
 ]);  

        $data=array();

        $data['name']=$request->name;
       

       $category=DB::table('categories')->insert($data);
        if ($category) {
                 $notification=array(
                 'messege'=>'Successfully  category Inserted ',
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


    public function all_category(){

      $cate=Category::all();
      return view('salary.all_category',compact('cate'));
    }



    ///edit category----
    public function edit_category($id){

       $edit=Category::findorfail($id);
      return view('salary.edit_category',compact('edit'));

    }

    public function update_category(Request $request,$id){
        
        $data=array();

        $data['name']=$request->name;

      $category=DB::table('categories')->where('id',$id)->update($data);
        if ($category) {
                 $notification=array(
                 'messege'=>'Successfully  category Updated ',
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


    ///delete category--------
    public function delete_category($id){

      $dltuser=DB::table('categories')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Category Deleted ',
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
