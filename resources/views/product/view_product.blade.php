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
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Product Informaion</h3></div>


                                    <div class="panel-body">
                                                <div class="form-group">
                                                
                                                <label for="Photo">Product Image:</label>

                                                <img src="{{URL::to($prod->product_image)}}" height=150; width=150;/>
                                               
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="name">Product Name</label>
                                                <p>{{$prod->product_name}}</p>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Code">Product Code </label>
                                                <p>{{$prod->product_name}}</p>
                                                
                                            </div>

                                            <div class="form-group">
                                             <label>Poduct Category</label>
                                             <p>{{$prod->cat_name}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Poduct Suplier</label>
                                             <p>{{$prod->name}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Storage">Product Storage</label>
                                                 <p>{{$prod->product_storage}}</p>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Route">Product Route</label>
                                                 <p>{{$prod->product_route}}</p>

                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="Product Buying Date">Product Buying Date</label>
                                                 <p>{{$prod->buy_date}}</p>

                                               
                                            </div>

                                            <div class="form-group">
                                                <label for="Product Expire Date">Product Expire Date</label>
                                                 <p>{{$prod->expire_date}}</p>

                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="Buying Price">Buying Price</label>
                                                 <p>{{$prod->buying_price}}</p>

                                               
                                            </div>
                                           <div class="form-group">
                                                <label for="Selling Price">Selling Price</label>
                                                 <p>{{$prod->selling_price}}</p>

                                               
                                            </div>
                                           
                                            
                                          
                                        
                                       
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->





                        </div>
                            

                    </div> <!-- container -->
                               
                </div> <!-- content -->


                
@endsection
