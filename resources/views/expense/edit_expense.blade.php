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
                                <div class="panel panel-primary">

                                    <div class="panel-heading">
                                        <a href="{{route('today.expense')}}" class="btn btn-sm btn-danger pull-right">Today Expense</a>
                                      <a href="" class="btn btn-sm btn-success pull-right">Monthly Expense</a>

                                        <h3 class="panel-title">Add Expense</h3>

                                      
                                    </div>

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
                                        <form role="form" action="{{url('update-expense/'.$edit->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Details</label>
                                                <textarea class="form-control" rows="4" name="details" value="{{$edit->details}}">{{$edit->details}}</textarea>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="name">Amount</label>
                                                <input type="text" class="form-control"  required name="amount"   value="{{$edit->amount}}">
                                            </div>
                                           <div class="form-group">
                                                
                                                <input type="hidden" class="form-control"   name="date"  value="{{ date('d/m/y')}}">
                                            </div>
                                            <div class="form-group">
                                                
                                                <input type="hidden" class="form-control"   name="month" value="{{ date("F")}}">
                                            </div>
                                            <div class="form-group">
                                          <input type="hidden" class="form-control"   name="year" value="{{ date("Y")}}">
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
