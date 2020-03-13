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
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>

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
                                        <form role="form" action="{{url('/insert-product')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Product Name</label>
                                                <input type="text" class="form-control"  required name="product_name" id="name" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Code">Product Code </label>
                                                <input type="text" class="form-control" name="product_code" required placeholder="Product Code">
                                            </div>

                                            <div class="form-group">
                                                @php 
                                                $cate=DB::table('categories')->get();
                                                @endphp
                                                <label for="Type">Category</label>
                                                <select class="form-control" name="cat_id" >
                                                    @foreach($cate as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
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
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                 @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Storage">Product Storage</label>
                                                <input type="text" class="form-control" required name="product_storage" placeholder="Product Storage">
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Route">Product Route</label>
                                                <input type="text" class="form-control" name="product_route" placeholder="Product Route" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Buying Date">Product Buying Date</label>
                                                <input type="date" class="form-control" name="buy_date" placeholder="Product Buying Date">
                                            </div>

                                            <div class="form-group">
                                                <label for="Product Expire Date">Product Expire Date</label>
                                                <input type="date" class="form-control" name="expire_date" placeholder="Product Expire Date">
                                            </div>
                                            <div class="form-group">
                                                <label for="Buying Price">Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" placeholder="Buying Price">
                                            </div>
                                           <div class="form-group">
                                                <label for="Selling Price">Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" placeholder="Selling Price">
                                            </div>
                                           
                                             <div class="form-group">
                                                <img src="#" id="image"/>
                                                <label for="Photo">Product Image:</label>
                                                <input type="file" class="form-control" name="product_image" placeholder="Photo" accept="image/*"
                                                class="upload" required onchange="readURL(this);">
                                            </div>
                                          
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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
