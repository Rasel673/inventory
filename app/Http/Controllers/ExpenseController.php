<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

public function add_expense(){

	return view('expense.add_expense');
}
 ///insert expense---------------
public function expense_store(Request $request){

	$validatedData = $request->validate([
        'details' => 'required',
        'amount' => 'required',
        


    ]);

	$data=array();
	$data['details']=$request->details;
	$data['amount']=$request->amount;
	$data['date']=$request->date;
	$data['month']=$request->month;
    $data['year']=$request->year;

    $expense=DB::table('expenses')->insert($data);

     if ($expense) {
                 $notification=array(
                 'messege'=>'Successfully  Expenses Inserted ',
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

///today expense-----------

public function today_expense(){
  
  $date=date("d/m/y");

  $today=DB::table('expenses')->where('date',$date)->get();

  return view('expense.today_expense',compact('today'));

}

////update expense-----------------

public  function edit_expense($id){

$edit=DB::table('expenses')->where('id',$id)->first();

return view ('expense.edit_expense',compact('edit'));

}

public function update_expense(Request $request,$id){


	$validatedData = $request->validate([
        'details' => 'required',
        'amount' => 'required',
        


    ]);

	$data=array();
	$data['details']=$request->details;
	$data['amount']=$request->amount;
	$data['date']=$request->date;
	$data['month']=$request->month;
    $data['year']=$request->year;

    $expense=DB::table('expenses')->where('id',$id)->update($data);

     if ($expense) {
                 $notification=array(
                 'messege'=>'Successfully  Expenses Updated ',
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

////delete------------------
public function delete_expense($id){
$delete=DB::table('expenses')->where('id',$id)->delete();


if ($delete) {
                 $notification=array(
                 'messege'=>'Successfully Expense Deleted ',
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

////monthly expense----------
public function monthly_expense(){

   $month=date("F");

  $monthly=DB::table('expenses')->where('month',$month)->get();

  return view('expense.monthly_expense',compact('monthly'));

}
///yearly expense-------------
public function yearly_expense(){

  $year=date("Y");

  $yearly=DB::table('expenses')->where('year',$year)->get();

  return view('expense.yearly_expense',compact('yearly'));

}



}
