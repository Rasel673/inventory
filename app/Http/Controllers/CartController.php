<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use PDF;
class CartController extends Controller
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

    ///add product to cart=--------
    public function index(Request $request){
      $data=array();
      $data['id']=$request->id;
      $data['name']=$request->name;
      $data['qty']=$request->qty;
      $data['price']=$request->price;
      $add=Cart::add( $data);
      if ($add) {
                 $notification=array(
                 'messege'=>'Successfully  Added to cart ',
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

    ////update cart------------
    public function cart_update(Request $request, $rowId){



      $qty=$request->qty;
      $up=Cart::update($rowId, $qty);
      if ($up) {
                 $notification=array(
                 'messege'=>'Successfully  updated to cart ',
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

    ////remove---------
  public function cart_remove($rowId){
        $remove=Cart::remove($rowId);

        if ($remove) {
                 $notification=array(
                 'messege'=>'Successfully  removed to cart ',
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


    ////cart invoice--------------

    public function cart_invoice(Request $request){

      $validatedData = $request->validate([
        'cus_id' => 'required',
        ],
        [
         'cus_id.required'=>'Select a customer first',
       
    ]);
            $cus_id=$request->cus_id;
            $customer=DB::table('customers')->where('id',$cus_id)->first();
            $invoice=Cart::content();
            return view('invoice.invoice_cart',compact('invoice','customer'));
    }


    public function generate_pdf($id){

            $order=DB::table('product_orders')
        ->join('customers','product_orders.customer_id','customers.id')
        ->where('product_orders.id',$id)->first();

        $details=DB::table('orderdetails')
        ->join('products','orderdetails.product_id','products.id')
        ->select('products.product_name','products.product_code','orderdetails.*')
        ->where('order_id',$id)->get();
          $pdf = PDF::loadView('invoice.pdf',compact('details','order'));
            return $pdf->stream('invoice.pdf');
    }



    public function final_invoice(Request $request){
      $data=array();
      $data['customer_id']=$request->customer_id;
      $data['order_date']=$request->order_date;
      $data['order_status']=$request->order_status;
      $data['total_products']=$request->total_products;
      $data['sub_total']=$request->sub_total;
      $data['vat']=$request->vat;
      $data['total']=$request->total;
      $data['payment_status']=$request->payment_status;
      $data['pay']=$request->pay;
      $data['due']=$request->due;

      $order_id=DB::table('product_orders')->insertGetId($data);
      $contents=Cart::content();

      foreach ($contents as  $content) {
        $odata['order_id']=$order_id;
        $odata['product_id']=$content->id;
        $odata['unitcost']=$content->price;
        $odata['quantity']=$content->qty;
        $odata['total']=$content->total;

        $insert=DB::table('orderdetails')->insert($odata);
      }

           if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully  invoice created| Please deliver product. ',
                 'alert-type'=>'success'
                  );
                 Cart::destroy(); 
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
