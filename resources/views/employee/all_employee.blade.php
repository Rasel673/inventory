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
                            <a href="{{route('add.employee')}}" class="btn btn-info pull-right">Add New</a></br>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Image</th>
                                                            <th>Salary</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($employees as $row)
                                                        <tr>
                                                            <td>{{$row->name}}</td>
                                                            <td>{{$row->phone}}</td>
                                                            <td>{{$row->address}}</td>
                                                            <td><img src="{{$row->photo}}" height=60; width=60;></td>
                                                            <td>{{$row->salary}}</td>
                                                            <td>
                                                              <a href="{{URL::to('view-employee/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
                                                              <a href="{{URL::to('edit-employee/'.$row->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                                              <a href="{{URL::to('delete-employee/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>


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
