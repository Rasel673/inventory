@extends('layouts.app')

@section('content')
 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12 bg-purple">
                                <h4 class="pull-left page-title text-white"> Point of sale(POS)</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#" class="text-white">{{date('d/m/y')}}</a></li>
                                    <li class="active text-white">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <br>
                         <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="portfolioFilter">
                                    @foreach($category as $cus)
                                    <a href="#" data-filter="*" class="current">{{$cus->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                               
                                <br>
                                    <div class="price_card text-center" style="border:1px solid gray;">

                                      
                                        
                                        <ul class="price-features">


                                              <table class="table">

                                            <thead>
                                             <tr><th>Name</th>
                                             <th>Qty</th>

                                             <th>Single Price</th>
                                             <th>Sub total</th>
                                             <th>Action</th>
</tr>
                                             
                                            </thead>
                                            @php
                                            $cart=Cart::content();
                                            @endphp
                                            <tbody>
                                                @foreach($cart as $prod)
                                                <tr> 
                                            <th>{{$prod->name}}</th>
                                            <th>
                                                <form action="{{url('/update-cart/'.$prod->rowId)}}" method="post">
                                                @csrf
                                                <input type="number" name="qty" value="{{$prod->qty}}" style="width:30px;">
                                                 <button type="submit" class="btn btn-sm btn-success" style="margin-top:-2px;"><i class="fas fa-check"></i></button>

                                            </form> 
                                        </th>
                                                
                                            <td>{{$prod->price}}</td>
                                            <td>{{$prod->price*$prod->qty}}</td>
                                            <td><a href="{{URL::to('/remove-cart/'.$prod->rowId)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>
@endforeach
                                           
                                            </tbody>
                                            </table
        
                                           
                                        </ul>
                                       

                                        <div class="pricing-header bg-primary">
                                           
                                            <h4 class="text-white">Quantity:{{Cart::count()}}</h4>
                          
                                            <h4 class="text-white">Sub Total:{{Cart::subtotal()}}</h4>

                                            <h4 class="text-white">vat:{{Cart::tax()}}</h4>
                                             <hr>
                                             <h3 class="text-white">Total</h3>
                                             <h2 class="text-white">{{Cart::total()}}</h2>

                                        </div>

                                         <button class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</button><br>

                                         <form action="{{url('/invoice')}}" method="post">
                                          @csrf
                                         <div>

                                         @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                   
                                    <label class="text-info" style="font-size:25px;"><strong>Customer</strong></label>
                                       <select class="form-control" name="cus_id">
                                        <option disabled="" selected="">Select Customer</option>
                                        @foreach($customer as $cus)
                                        <option value="{{$cus->id}}">{{$cus->name}}</option>
                                        @endforeach
                                    </select>
                                       <button type="submit" class="btn btn-success">Create Invoice</button>
                                     </div>
                        
                                    </div> <!-- end Pricing_card -->
                                 <!-- end col --></div>
                           <div class="col-md-6">
                             

                                       <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                             <th>Image</th>
                                                            <th>Name</th>
                                                            <th>Code</th>
                                                            <th>Selling Price</th>
                                                           <th>Category</th>
                                                           <th>Action</th>

                                                           
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                       
                                                        @foreach($product as $row)
                      <tr>
                        <form action="{{ url('/add-cart') }}" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{ $row->id }}">
                          <input type="hidden" name="name" value=" {{ $row->product_name }}">
                          <input type="hidden" name="qty" value="1">
                          <input type="hidden" name="price" value="{{ $row->selling_price }}">
                         <td>
                          <img src="{{URL::to($row->product_image) }}" width="60px" height="60px">
                         </td>
                         <td>{{ $row->product_name }}</td>
                         <td>{{ $row->product_code }}</td>
                         <td>{{ $row->selling_price }}</td>
                       <td>{{ $row->cat_name }}</td>
                         
                         <td><button type="submit" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i></button></td>
                         </form>
                      </tr>

                 
                                                        @endforeach
                                                    </tbody>
                                                </table>

  
                             <!-- col-->





                        </div>
                            

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <!--- customer add modal -->
                 <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog"> 
                                                <div class="modal-content"> 
                                                    <div class="modal-header"> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                        <h4 class="modal-title">Add New Customer</h4> 
                                                    </div> 

       @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                                    <div class="modal-body"> 
                                                        <div class="row"> 
            
                                            <form role="form" action="{{url('/insert-customers')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label for="field-2"  class="control-label" >Full Name</label>
                                                <input type="text" class="form-control"  required name="name" id="field-2" placeholder="Enter name">
                                            </div>
                                            </div> 
                                            <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control"  name="email" placeholder="Email">
                                            </div>
                                        </div>
                                            <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" required name="phone" placeholder="Phone">
                                            </div></div>
                                            <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="address">
                                            </div></div>
                                            <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label for="Shop Name">Shop Name</label>
                                                <input type="text" class="form-control" name="shopname" placeholder="Shop Name">
                                            </div></div>
                                           
                                            
                                                   <div class="col-md-6"> 
                                                <div class="form-group">
                                                <label for="Account Name">Account Name</label>
                                                <input type="text" class="form-control" name="account_holder" required placeholder="Account Name">
                                            </div></div>
                                            <div class="col-md-6"> 
                                              <div class="form-group">
                                                <label for="Account Number">Account Number</label>
                                                <input type="text" class="form-control" name="account_number" placeholder="Account Number">
                                            </div></div>
                                            <div class="col-md-6"> 
                                             <div class="form-group">
                                                <label for="Bank Name">Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name" placeholder="Bank Name ">
                                            </div></div>
                                            <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label for="Branch Name">Branch Name</label>
                                                <input type="text" class="form-control" name="branch_name" placeholder="Branch Name ">
                                            </div></div>
                                            <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" name="city" placeholder="city">
                                            </div></div>
                                            <div class="col-md-6"> 
                                             <div class="form-group">
                                                <img src="#" id="image"/>
                                                <label for="Photo">Photo:</label>
                                                <input type="file" class="form-control" name="photo" placeholder="Photo" accept="image/*"
                                                class="upload" required onchange="readURL(this);">
                                            </div> </div>
                                                           
                                                             
                                                      </div> 
                                                    <div class="modal-footer"> 
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button> 
                                                     
                                                     </div> 
                                                    </div> 
                                                </div> 
                                            </div>
                                        </div><!-- /.modal -->


                <script type="text/javascript">

               function readURL(input){

               if(input.files && input.files[0]){

               var reader=new FileReader();
               reader.onload=function(e){

                $('#image')
                .attr('src',e.target.result)
                .width('80')
                .height('80');
               };
               reader.readAsDataURL(input.files[0]);

               }

               }


                </script>
                
@endsection
