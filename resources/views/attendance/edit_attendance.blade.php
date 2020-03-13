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
                          <h3 class="panel-title">Update Attendence  <a href="{{ route('all.attendance') }}" class="btn btn-sm btn-info pull-right">All Attendence</a></h3>
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
                                                        <form action="{{url('/update-attendance')}}" method="post">
                                                          @csrf  
                                                        @foreach($edit as $row)
                                                        <tr>
                                                            <input type="hidden" name="id[]" value="{{$row->id}}">
                                                            
                                                            <td>{{$row->name}}</td>
                                                            <td><img src="{{URL::to($row->photo)}}" height=60; width=60;></td>
                                                        
                                                            <td>
                                                              <input type="radio"  name="attendance[{{$row->id}}]" value="Present" required="" 
                                                              <?php if($row->attendance=='Present'){
                                                                echo "checked";
                                                              }
                                                              ?>   
                                                              >Present
                                                              <input type="radio"   name="attendance[{{$row->id}}]" value="Absent" required=""
                                                               <?php if($row->attendance=='Absent'){
                                                                echo "checked";
                                                              }
                                                              ?>   >Absent

                                                            </td>

                                                            
                                                            <input type="hidden" name="att_date" value="{{$row->att_date}}">
                                                            <input type="hidden" name="month" value="{{$row->month}}">
                                                            <input type="hidden" name="edit_date" value="{{$row->edit_date}}">
                                                            <input type="hidden" name="att_year" value="{{$row->att_year}}">

                                                        </tr>

                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                                <button type="submit" class="btn btn-success" >Update Attendence</button>
                                   </form>  
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
