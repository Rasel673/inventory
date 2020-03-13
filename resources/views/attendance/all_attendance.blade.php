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
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title">ALL Attendence  <a href="{{ route('add.attendance') }}" class="btn btn-sm btn-info pull-right">Add New </a></h3>
                      </div>
                      
                      <div class="panel-body">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial</th>
                                                            <th>Date</th>
                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                     <?php
                                                     $sl=1;
                                                     ?>
                                             
                                                    <tbody>
                                                        @foreach($att_all as $row)
                                                        <tr>
                                                            <td>{{$sl++}}</td>
                                                            <td>{{$row->edit_date}}</td>
                                                            

    
                                                           
                                                            <td>
                                                              <a href="{{URL::to('view-attendance/'.$row->edit_date)}}" class="btn btn-sm btn-success">view</a>
                                                              <a href="{{URL::to('edit-attendance/'.$row->edit_date)}}" class="btn btn-sm btn-primary">Edit</a>
                                                              <a href="{{URL::to('delete-attendance/'.$row->edit_date)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>

                                                                    
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
            </div>
        </div> <!-- container -->            
    </div> <!-- content -->
</div>



              
@endsection
