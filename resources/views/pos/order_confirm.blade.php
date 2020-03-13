@extends('layouts.app')

@section('content')


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                        
                                            <div class="pull-right">
                                                <h4>Invoice # <br>
                                                    <strong>2015-04-23654789</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>{{$order->name}}</strong><br>
                                                      {{$order->address}}
                                                      {{$order->city}} <br>
                                                     
                                                      <abbr title="Phone">Phone:</abbr>{{$order->phone}}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong>{{$order->order_date}}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">{{$order->order_status}}</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong>{{$order->id}}</p>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr>
                                                            <th>#</th>
                                                            <th>Item</th>
                                                           
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        @php
                                                        $sl=1;
                                                        @endphp
                                                        <tbody>
                                                            @foreach($details as $row)
                                                            <tr>
                                                                <td>{{$sl++}}</td>
                                                                <td>{{$row->product_name}}</td>
                                                                
                                                                <td>{{$row->quantity}}</td>
                                                                <td>{{$row->unitcost}}</td>
                                                                <td>{{$row->unitcost*$row->quantity}}</td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-9">
                                                <h3>Payment BY:{{$order->payment_status}}</h3>
                                                <h4>Pay:{{$order->pay}}</h4>
                                                <h4>Due:{{$order->due}}</h4>

                                            </div>
                                            <div class="col-md-3">
                                                <p class="text-right"><b>Sub-total:</b>{{$order->sub_total}}</p>
                                                
                                                <p class="text-right">VAT:{{$order->vat}}</p>
                                                <hr>
                                                <h3 class="text-right">TAKA {{$order->total}}</h3>
                                            </div>
                                              @if($order->order_status=='pending')
                                                 <div class="hidden-print">
                                            <div class="pull-right">
                                            <a  href="{{URL::to('/invoice_done/'.$order->order_id)}}" class="btn btn-info">SUBMIT</a>
                                                </div>
                                              </div>
                                                @else  
                                                
                                                @endif
                                            
                                        </div>
                                       
                                    </div>
                                </div>

                            </div>

                        </div>



            </div> <!-- container -->
                               
                </div> <!-- content -->



@endsection