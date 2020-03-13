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
                        $year=date("Y");
                        $expense=DB::table('expenses')->where('year',$year)->sum('amount');
                        @endphp
                       
                        <div class="row">
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4 style="color:red; text-align:center; font-size:30px;">{{date("Y")}} Expense:{{$expense}}Tk/-</h4>

                                                 <a href="{{route('add.expense')}}" class="btn btn-info pull-right">Add New</a></br>
                                                <table id="datatable" class="table table-striped table-bordered">

                                                    <thead>
                                                        <tr>
                                                            <th>Details</th>
                                                            <th>Amount</th>
                                                            <th>Date</th>
                                                            <th>Month</th>
                                                           
                                                           
                                                            
                                                        </tr>
                                                    </thead>
                                                     
                                             
                                                    <tbody>
                                                        @foreach($yearly as $row)
                                                        <tr>
                                                            <td>{{$row->details}}</td>
                                                            <td>{{$row->amount}}</td>
                                                             <td>{{$row->date}}</td>
                                                            <td>{{$row->month}}</td>
                                                            
                                                            
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
