@extends('layouts.app')

@section('content')
 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Inventory</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                       
                        <div class="row">
                            <div class="col-md-2"></div>
                           <div class="col-md-8">
                                <div class="panel panel-purple text-white">
                                    <div class="panel-heading"><h3 class="panel-title">Update Product</h3></div>

                                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                    <div class="panel-body">
                                        <form role="form" action="{{url('/update-product/'.$edit->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Product Name</label>
                                                <input type="text" class="form-control"  required name="product_name" id="name" value="{{$edit->product_name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Code">Product Code </label>
                                                <input type="text" class="form-control" name="product_code" required value="{{$edit->product_code}}">
                                            </div>

                                            <div class="form-group">
                                                @php 
                                                $cate=DB::table('categories')->get();
                                                @endphp
                                                <label for="Type">Category</label>
                                                <select class="form-control" name="cat_id" >
                                                    @foreach($cate as $row)
                                                    <option value="{{$row->id}}" 
                                                        <?php if($edit->cat_id==$row->id){
                                                        echo"selected";
                                                    }?>>{{$row->name}}</option>
                                                 @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                @php 
                                                $sup=DB::table('supliers')->get();
                                                @endphp
                                                <label for="Type">Suplier</label>
                                                <select class="form-control" name="sup_id" >
                                                    @foreach($sup as $row)
                                                    <option value="{{$row->id}}" 
                                                        <?php if($edit->sup_id==$row->id){
                                                        echo"selected";
                                                    }?>>{{$row->name}}</option>
                                                 @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Storage">Product Storage</label>
                                                <input type="text" class="form-control" required name="product_storage" value="{{$edit->product_storage}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Route">Product Route</label>
                                                <input type="text" class="form-control" name="product_route" value="{{$edit->product_route}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Buying Date">Product Buying Date</label>
                                                <input type="date" class="form-control" name="buy_date" value="{{$edit->buy_date}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="Product Expire Date">Product Expire Date</label>
                                                <input type="date" class="form-control" name="expire_date" value="{{$edit->expire_date}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="Buying Price">Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" value="{{$edit->buying_price}}">
                                            </div>
                                           <div class="form-group">
                                                <label for="Selling Price">Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" value="{{$edit->selling_price}}">
                                            </div>
                                           
                                             <div class="form-group">
                                                <img src="#" id="image"/>
                                                <label for="Photo">New Product Image:</label>
                                                <input type="file" class="form-control" name="product_image" placeholder="Photo" accept="image/*"
                                                class="upload" required onchange="readURL(this);">
                                            </div>
                                             <div class="form-group">
                                                
                                                <label for="Photo"> Old Photo:</label><br>
                                               <img src="{{URL::to($edit->product_image)}}" id="image" height=80; width=80; name="old_photo"/>
                                            </div>
                                          
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->





                        </div>
                            

                    </div> <!-- container -->
                               
                </div> <!-- content -->


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
