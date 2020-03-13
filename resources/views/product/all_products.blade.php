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
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <a href="{{route('add.product')}}" class="btn btn-info pull-right">Add New</a></br>
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Code</th>
                                                            <th>Selling Price</th>
                                                            <th>Image</th>
                                                            <th>Storage</th>
                                                            <th>Route</th>

                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($product as $row)
                                                        <tr>
                                                            <td>{{$row->product_name}}</td>
                                                            <td>{{$row->product_code}}</td>
                                                            <td>{{$row->selling_price}}</td>
                                                            <td><img src="{{$row->product_image}}" height=60; width=60;></td>
                                                            <td>{{$row->product_storage}}</td>
                                                            <td>{{$row->product_route}}</td>

                                                            <td>
                                                              <a href="{{URL::to('view-product/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
                                                              <a href="{{URL::to('edit-product/'.$row->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                                              <a href="{{URL::to('delete-product/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                             

                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                           
                            </div> <!-- col-->





                        </div>
                            

                    </div> <!-- container -->
                               
                </div> <!-- content -->


              
@endsection
