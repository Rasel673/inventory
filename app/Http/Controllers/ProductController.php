<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }



    ////view product-----------

    public function view_product($id){

     $prod=DB::table('products')
     ->join('categories', 'products.cat_id','categories.id')
     ->join('supliers','products.sup_id','supliers.id')
     ->select('categories.name as cat_name','supliers.name','products.*')
     ->where('products.id',$id)
     ->first();

    return view('product.view_product',compact('prod'));


    }

 ///product insert --------------------------  
public function add_product(){

return view('product.add_product');


}


public function product_store(Request $request){

	$validatedData = $request->validate([
        'product_name' => 'required',
        'cat_id'=>'required',
        'sup_id'=>'required',
         'product_code' => 'required|unique:products',
        'expire_date' => 'required',
        'selling_price' => 'required ',
 ]);


	        $data=array();
	         $data['product_name']=$request->product_name;
              $data['product_code']=$request->product_code;

              $data['cat_id']=$request->cat_id;
              $data['sup_id']=$request->sup_id;
              $data['product_storage']=$request->product_storage;
              $data['product_route']=$request->product_route;

              $data['buy_date']=$request->buy_date;
              $data['expire_date']=$request->expire_date;
              $data['buying_price']=$request->buying_price;

              $data['selling_price']=$request->selling_price;
              $image=$request->file('product_image');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;

                $employee=DB::table('products')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Product Inserted ',
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
///view all products-------------

public function all_products(){

$product=Product::all();

return view('product.all_products',compact('product'));

}

///edit product----------
public function edit_product($id){

 $edit=DB::table('products')->where('id',$id)->first();

   return view('product.edit_products',compact('edit'));
}

public function update_product(Request $request,$id){

$validatedData = $request->validate([
        'product_name' => 'required',
        'cat_id'=>'required',
        'sup_id'=>'required',
         'product_code' => 'required',
        'expire_date' => 'required',
        'selling_price' => 'required ',
 ]);


            $data=array();
           $data['product_name']=$request->product_name;
              $data['product_code']=$request->product_code;

              $data['cat_id']=$request->cat_id;
              $data['sup_id']=$request->sup_id;
              $data['product_storage']=$request->product_storage;
              $data['product_route']=$request->product_route;

              $data['buy_date']=$request->buy_date;
              $data['expire_date']=$request->expire_date;
              $data['buying_price']=$request->buying_price;

              $data['selling_price']=$request->selling_price;

             $image=$request->product_image;

              if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
             $upload_path='public/products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;
                
                $img=DB::table('products')
                         ->where('id',$id)->first();
                 $image_path=$img->product_image;
                 $done=unlink($image_path);
                 $employee=DB::table('products')->where('id',$id)->update($data);      
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Product  Updated ',
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

///Delete product---------

public function delete_product($id){

  $delete=DB::table('products')->where('id',$id)->delete();

   if ($delete) {
                 $notification=array(
                 'messege'=>'Successfully product Deleted ',
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

/////exel import export--------
public function import_products(){

return view('product.import_product');
}

 public function export() 
{
    return Excel::download(new ProductsExport, 'products.xlsx');
}

public function import(Request $request){

    $import=Excel::import(new ProductsImport, $request->file('import_file'));

     if ($import) {
                 $notification=array(
                 'messege'=>'Successfully Excel File Uploaded ',
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
