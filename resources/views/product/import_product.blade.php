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
                                    
                                        <h3 class="panel-title">Product Excel

                                          <a href="{{route('export')}}" class="btn btn-success pull-right">Download Xlxs</a></br>
                                        </h3>

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
                                        <form role="form" action="{{route('import')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Excel File Import</label>
                                                <input type="file" class="form-control"  required name="import_file" id="name" >
                                            </div>
                                            
                                          
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">upload</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->





                        </div>
                            

                    </div> <!-- container -->
                               
                </div> <!-- content -->


                
@endsection
