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
                            <a href="{{route('add.salary')}}" class="btn btn-info pull-right">Add New</a></br>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Image</th>
                                                            <th>Salary</th>
                                                            <th>Advanced</th>
                                                            
                                                            <th>Month</th>
                                                           
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                     
                                             
                                                    <tbody>
                                                        @foreach($advance as $row)
                                                        <tr>
                                                            <td>{{$row->name}}</td>
                                                            <td><img src="{{$row->photo}}" height=60; width=60;></td>
                                                            <td>{{$row->salary}}</td>

                                                            <td>{{$row->advance_salary}}</td>
                                                            
                                                            <td>{{$row->month}}</td>
                                                            <td>
            
                                                              <a href="{{URL::to('edit-advanced/'.$row->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                                              <a href="{{URL::to('delete-advanced/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>

                                                                    
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
