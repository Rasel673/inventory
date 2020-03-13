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
                                                            <th>Image</th>
                                                            <th>Salary</th>
                                                            <th>Month</th>
                                                            <th>Advanced</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    
                                                    <tbody>
                                                        @foreach($employee as $row)
                                                        <tr>
                                                            <td>{{$row->name}}</td>
                                                            <td><img src="{{$row->photo}}" height=60; width=60;></td>
                                                            <td>{{$row->salary}}</td>
                                                            <td><span class="badge badge-success">{{date("F",strtotime('-1 months'))}}</span></td>
                                                             
                                                           
                                                            
                                                            <td> 

                                                                <?php 


                                                                $id=$row->id;
                                                                  
                                                                 $advance=DB::table('advancesalaries')
                                                                          ->where('emp_id',$id)
                                                                          ->select('advancesalaries.advance_salary')
                                                                          ->first();
                                                                          if ($advance===NULL) {
                                                                              
                                                                              echo  "No advance Taken";
                                                                          }else{
                                                                            echo  $advance->advance_salary;

                                                                          }

                                                                        ?>
                                                            
                                                                                  
                                                             </td>
                                                            <td>
                                                              <a href="{{URL::to('view-employee/'.$row->id)}}" class="btn btn-sm btn-info">Pay Now</a>
                                                              
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
