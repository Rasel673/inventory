<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PosController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){


    	 $product=DB::table('products')
     ->join('categories', 'products.cat_id','categories.id')
     ->select('categories.name as cat_name','products.*')
     ->get();
     $category=DB::table('categories')->get();
     $customer=DB::table('customers')->get();


    	return view('pos.pos_index',compact('product','category','customer'));
    }


    public function pending_order(){

        $pending=DB::table('product_orders')
        ->join('customers','product_orders.customer_id','customers.id')
        ->select('customers.name','product_orders.*')
        ->where('order_status','pending')->get();

        return view('pos.pending_orders',compact('pending'));
    }

 public function success_order(){

        $pending=DB::table('product_orders')
        ->join('customers','product_orders.customer_id','customers.id')
        ->select('customers.name','product_orders.*')
        ->where('order_status','success')->get();

        return view('pos.success',compact('pending'));
    }

    public function view_order($id){
        $order=DB::table('product_orders')
        ->join('customers','product_orders.customer_id','customers.id')
        ->select('customers.*','product_orders.*','product_orders.id as order_id')
        ->where('product_orders.id',$id)->first();

        $details=DB::table('orderdetails')
        ->join('products','orderdetails.product_id','products.id')
        ->select('products.product_name','products.product_code','orderdetails.*')
        ->where('order_id',$id)->get();

       return view ('pos.order_confirm',compact('order','details'));

    }




    public function invoice_done($id){


        $success=DB::table('product_orders')->where('id',$id)->update(['order_status'=>'success']);

        if ($success) {
                 $notification=array(
                 'messege'=>'Successfully order Delivered| Please collect cash.',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('pending.order')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }      
      

    }
}
