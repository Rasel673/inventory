@extends('layouts.app')

@section('content')
 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center" style="background-image:url('{{URL::to('public/admin/images/big/bg.jpg')}}')">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="{{URL::to($single->photo)}}" class="thumb-lg img-circle img-thumbnail" alt="employee-image">
                                    <h3 class="text-white">{{$single->name}}</h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-lg-12"> 
                        
                        <div class="tab-content profile-tab-content"> 
                            <div class="tab-pane active" id="home-2"> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Personal Information</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>Full Name</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->name}}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Mobile</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->phone}}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->email}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Salary</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->salary}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Address</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->address}}</p>
                                                </div>
                                            
                                            <div class="about-info-p m-b-0">
                                                    <strong>NID NO.</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->nid_no}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Vacation</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->vacation}}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>City</strong>
                                                    <br/>
                                                    <p class="text-muted">{{$single->city}}</p>
                                                </div>

                                                 </div>
                                        </div>
                                        <!-- Personal-Information -->

                                        <!-- Languages -->
                                       
                                        <!-- Languages -->

                                    </div>


                                    <div class="col-md-8">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Biography</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                                                <p><strong>But also the leap into electronic typesetting, remaining essentially unchanged.</strong></p>

                                                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->

                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Experience</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="m-b-15">
                                                    <h5>{{$single->experience}} <span class="pull-right">60%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-primary wow animated progress-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                </div>

                                            </div> 
                                        </div>

                                    </div>

                                </div>
                            </div> 



 




                           
                        </div> 
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
