<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;

class CustomerController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){

  return view('customer.add_customer');


    }

    public function customers(){

    	      $customers=Customer::all();

      return view('customer.all_customer', compact('customers'));
    }


    ///customer insert here
    public function store(Request $request){
    	 $validatedData = $request->validate([
        'name' => 'required',
        'address'=>'required',
        'phone' => 'required|unique:customers',
        'account_number' => 'required |unique:customers',
        'account_holder' => 'required |unique:customers',



    ]);

              $data=array();
              $data['name']=$request->name;
              $data['email']=$request->email;
              $data['phone']=$request->phone;

               $data['address']=$request->address;
              $data['shopname']=$request->shopname;
              $data['account_holder']=$request->account_holder;
              $data['account_number']=$request->account_number;
              $data['bank_name']=$request->bank_name;
              $data['branch_name']=$request->branch_name;

              $data['city']=$request->city;
              $image=$request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customers/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;

                $employee=DB::table('customers')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Customer Inserted ',
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

//view single customer
    public function view($id){


      $single=Customer::findOrfail($id);
      return view('customer.view_customer', compact('single'));
    }

///edit 
    public function EditCustomer(Request $request,$id){
    $edit=Customer::findOrfail($id);
      return view('customer.update_customer', compact('edit'));

    }

//update=============
    public function UpdateCustomer(Request $request,$id){

      $validatedData = $request->validate([
        'name' => 'required',
        'address'=>'required',
        'phone' => 'required|unique:customers',
        'account_number' => 'required |unique:customers',
        'account_holder' => 'required |unique:customers',



    ]);




       $data=array();
              $data['name']=$request->name;
              $data['email']=$request->email;
              $data['phone']=$request->phone;

               $data['address']=$request->address;
              $data['shopname']=$request->shopname;
              $data['account_holder']=$request->account_holder;
              $data['account_number']=$request->account_number;
              $data['bank_name']=$request->bank_name;
              $data['branch_name']=$request->branch_name;

              $data['city']=$request->city;
              $image=$request->photo;

              if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
             $upload_path='public/customers/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                
                $img=DB::table('customers')
                         ->where('id',$id)->first();
                 $image_path=$img->photo;
                 $done=unlink($image_path);
                 $employee=DB::table('customers')->where('id',$id)->update($data);      
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Customer Information Updated ',
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


    //delete customer

    public function DeleteCustomer($id){


      $delete=DB::table('customers')
                ->where('id',$id)
                ->first();
         $photo=$delete->photo;
         unlink($photo);
         $dltuser=DB::table('customers')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Customer Deleted ',
                 'alert-type'=>'error'
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
}
