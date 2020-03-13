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
                               
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Quantity</th>
                                                            
                                                            <th>Payment</th>
                                                            <th>Total Amount</th>
                                                            <th>Status</th>

                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($pending as $row)
                                                        <tr>
                                                            <td>{{$row->name}}</td>
                                                            <td>{{$row->order_date}}</td>
                                                            <td>{{$row->total_products}}</td>
                                                            <td>{{$row->payment_status}}</td>
                                                            <td>{{$row->total}}</td>
                                                            <td><span class="badge badge-success">{{$row->order_status}}</span></td>

                                                            <td>
                                                              <a href="{{URL::to('view_order/'.$row->id)}}" class="btn btn-sm btn-purple">view</a>
                                                              <a href="{{URL::to('view_order/'.$row->id)}}" class="btn btn-sm btn-primary">Delete</a>
                                                               <a  href="{{url('/add_pdf/'.$row->id)}}" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>

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
