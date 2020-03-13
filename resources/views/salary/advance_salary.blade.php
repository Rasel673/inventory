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
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title text-white">Advance Salary Pay</h3></div>

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
                                        <form role="form" action="{{url('/insert-advanced')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            
                                           <div class="form-group">
                                                <label for="Type">Employee</label>
                                                @php
                                                $emp=DB::table('employees')->get();
                                                @endphp
                                                <select class="form-control" name="emp_id" >
                                                    <option disabled="" selected=""></option>
                                                    @foreach($emp as $row)
                                                 <option value="{{$row->id}}">{{$row->name}}</option>
                                                 @endforeach
                                                 


                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Type">Month</label>
                                                
                                                <select class="form-control" name="month" >
                                                    <option disabled="" selected=""></option>


                                                   
                                                    <?php 
                                                      

                                                    for($i=1; $i<=12;$i++ )
                                                     print("<option>".date('F',strtotime('01.'.$i.'.2020'))."</option>");
                                                    ?>
                                                    
                                            </select>
                                            </div>
                                             
                                              <div class="form-group">
                                                <label for="advance_salary">Advanced Salary</label>
                                                <input type="text" class="form-control" name="advance_salary" placeholder="Advanced Salary">
                                            </div>
                                             <div class="form-group">
                                                <label for="Year">Year</label>
                                                <input type="text" class="form-control" name="year" placeholder="Year">
                                            </div>
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->





                        </div>
                            

                    </div> <!-- container -->
                               
                </div> <!-- content -->


                
@endsection
