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
                        @php 
                        $date=date("d/m/y");
                        $expense=DB::table('expenses')->where('date',$date)->sum('amount');
                        @endphp
                       
                        <div class="row">
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4 style="color:red; text-align:center; font-size:30px;">Today Expense:{{$expense}}Tk/-</h4>

                                                 <a href="{{route('add.expense')}}" class="btn btn-info pull-right">Add New</a></br>
                                                <table id="datatable" class="table table-striped table-bordered">

                                                    <thead>
                                                        <tr>
                                                            <th>Details</th>
                                                            <th>Amount</th>
                                                           
                                                           
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                     
                                             
                                                    <tbody>
                                                        @foreach($today as $row)
                                                        <tr>
                                                            <td>{{$row->details}}</td>
                                                           
                                                            
                                                            <td>{{$row->amount}}</td>
                                                            <td>
            
                                                              <a href="{{URL::to('edit-expense/'.$row->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                                              <a href="{{URL::to('delete-expense/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>

                                                                    
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
