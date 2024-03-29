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
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Update Employee Information</h3></div>

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
                                        <form role="form" action="{{url('/update-employee/'.$edit->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input type="text" class="form-control"  required name="name" id="name" value="{{$edit->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control"  name="email" value="{{$edit->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" required name="phone" value="{{$edit->phone}}">
                                            </div><div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address" value="{{$edit->address}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="experience">Experience</label>
                                                <input type="text" class="form-control" name="experience" value="{{$edit->experience}}">
                                            </div>
                                           
                                             <div class="form-group">
                                                <label for="Nid no.">NID No.</label>
                                                <input type="text" class="form-control" name="nid_no" value="{{$edit->nid_no}}">
                                            </div>
                                            
                                                <div class="form-group">
                                                <label for="salary">Salary</label>
                                                <input type="text" class="form-control" name="salary" required value="{{$edit->salary}}">
                                            </div>
                                              <div class="form-group">
                                                <label for="vacation">Vacation</label>
                                                <input type="text" class="form-control" name="vacation" value="{{$edit->vacation}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" name="city" value="{{$edit->city}}">
                                            </div>
                                             <div class="form-group">
                                                <img src="#" id="image"/>
                                                <label for="Photo">New Photo:</label>
                                                <input type="file" class="form-control" name="photo" placeholder="Photo" accept="image/*"
                                                class="upload" required onchange="readURL(this);">
                                            </div>

                                             <div class="form-group">
                                                
                                                <label for="Photo"> Old Photo:</label><br>
                                               <img src="{{URL::to($edit->photo)}}" id="image" height=80; width=80; name="old_photo"/>
                                            </div>
                                           
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->





                        </div>
                            

                    </div> <!-- container -->
                               
                </div> <!-- content -->


                <script type="text/javascript">

               function readURL(input){

               if(input.files && input.files[0]){

               var reader=new FileReader();
               reader.onload=function(e){

                $('#image')
                .attr('src',e.target.result)
                .width('80')
                .height('80');
               };
               reader.readAsDataURL(input.files[0]);

               }

               }


                </script>
@endsection
