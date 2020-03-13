<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Suplier;

class SuplierController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){

  return view('supliers.add_suplier');


    }

    ///insert suplier
    

    	public function store(Request $request){
    	 $validatedData = $request->validate([
        'name' => 'required',
        'address'=>'required',
        'type'=>'required',
         'phone' => 'required|unique:supliers',
        'account_number' => 'required |unique:supliers',
        'account_holder' => 'required |unique:supliers',
 ]);

              $data=array();
              $data['name']=$request->name;
              $data['email']=$request->email;
              $data['phone']=$request->phone;

               $data['address']=$request->address;
              $data['shopname']=$request->shopname;
              $data['account_holder']=$request->account_holder;
              $data['type']=$request->type;

              $data['account_number']=$request->account_number;
              $data['bank_name']=$request->bank_name;
              $data['branch_name']=$request->branch_name;

              $data['city']=$request->city;
              $image=$request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supliers/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;

                $employee=DB::table('supliers')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Suplier Inserted ',
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


    ///all suplier
    public function suplier(){
    	$suplier=Suplier::all();

      return view('supliers.all_suplier', compact('suplier'));
    }

    ///single suplier
    public function view($id){
      $single=DB::table('supliers')->where('id',$id)->first();
      return view('supliers.view_suplier',compact('single'));

    }

    ///edit suplier

    public function EditSuplier($id){

      $edit=DB::table('supliers')->where('id',$id)->first();
      return view('supliers.update_suplier',compact('edit'));


    }
    /// update suplier
    public function  UpdateSuplier(Request $request,$id){

       $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:employees|max:255',
        'phone' => 'required',
        'photo' => 'required',
        'type' => 'required',



    ]);



      $data=array();
              $data['name']=$request->name;
              $data['email']=$request->email;
              $data['phone']=$request->phone;

               $data['address']=$request->address;
              $data['shopname']=$request->shopname;
              $data['account_holder']=$request->account_holder;
              $data['type']=$request->type;

              $data['account_number']=$request->account_number;
              $data['bank_name']=$request->bank_name;
              $data['branch_name']=$request->branch_name;

              $data['city']=$request->city;
              $image=$request->photo;

              if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supliers/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                
                $img=DB::table('supliers')
                         ->where('id',$id)->first();
                 $image_path=$img->photo;
                 $done=unlink($image_path);
                 $employee=DB::table('supliers')->where('id',$id)->update($data);      
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Suplier Information Updated ',
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

    ///delete suplier
     
     public function DeleteSuplier($id){

      $delete=DB::table('supliers')->where('id',$id)->first();
      $photo=$delete->photo;
         unlink($photo);
         $dltuser=DB::table('supliers')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Customer Deleted ',
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
