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
                          <h3 class="panel-title">Take Attendence  <a href="{{ route('all.attendance') }}" class="btn btn-sm btn-info pull-right">All Attendence</a></h3>
                      </div>
                      <h3 class="text-success" align="center">Today:{{ date("d/m/y") }}</h3>
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
                                                        <form action="{{url('/insert-attendance')}}" method="post">
                                                          @csrf  
                                                        @foreach($attendance as $row)
                                                        <tr>
                                                            <input type="hidden" name="emp_id[]" value="{{$row->id}}">
                                                            
                                                            <td>{{$row->name}}</td>
                                                            <td><img src="{{$row->photo}}" height=60; width=60;></td>
                                                        
                                                            <td>
                                                              <input type="radio"  name="attendance[{{$row->id}}]" value="Present" required="">Present
                                                              <input type="radio"   name="attendance[{{$row->id}}]" value="Absent" required="">Absent

                                                            </td>

                                                            
                                                            <input type="hidden" name="att_date" value="{{date('d/m/y')}}">
                                                            <input type="hidden" name="month" value="{{date('F')}}">

                                                            <input type="hidden" name="att_year" value="{{date('Y')}}">

                                                        </tr>

                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                                <button type="submit" class="btn btn-success" >Take Attendence</button>
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
