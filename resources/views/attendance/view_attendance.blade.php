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
                          <h3 class="panel-title">Attendence  <a href="{{ route('all.attendance') }}" class="btn btn-sm btn-info pull-right">All Attendence</a></h3>
                      </div>
                       <h3 class="text-success" align="center">Date:{{ $date->att_date }}</h3>
                      <div class="panel-body">
                                                <table  class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Image</th>
                                                            <th>Attendance</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        
                                                        @foreach($single as $row)
                                                        <tr>
                                                            
                                                            
                                                            <td>{{$row->name}}</td>
                                                            <td><img src="{{URL::to($row->photo)}}" height=60; width=60;></td>
                                                        
                                                            <td>
                                                              <input type="radio"  name="attendance[{{$row->id}}]" value="Present" disabled="" 
                                                              <?php if($row->attendance=='Present'){
                                                                echo "checked";
                                                              }
                                                              ?>   
                                                              >Present
                                                              <input type="radio"   name="attendance[{{$row->id}}]" value="Absent" disabled=""
                                                               <?php if($row->attendance=='Absent'){
                                                                echo "checked";
                                                              }
                                                              ?>   >Absent

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
