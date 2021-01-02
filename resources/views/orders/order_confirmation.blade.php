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
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Orders</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Confirmation</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Orders</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                {{-- <h4 class="text-right"><img src="images/logo_dark.png" alt="velonic"></h4> --}}
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Orders # <br>
                                                    <strong>{{ date('d/m/y') }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Name: {{ $order->name }}</strong><br>
                                                      <strong>Shop Name: {{ $order->shopname }}</strong><br>
                                                      <strong>Address: {{ $order->address }}</strong><br>
                                                      <strong>City: {{ $order->city }}</strong><br>
                                                      <strong>Phone: {{ $order->phone }}</strong>
                                                    </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> {{ date("l jS \of F Y") }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong> {{ $order->o_id }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Quantity</th>
                                                            <th>Sub Total</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1
                                                            @endphp
                                                            @foreach ($order_details as $content)
                                                            <tr>
                                                                <td>{{ $i++ }}</td>
                                                                <td>{{ $content->product_name }}</td>
                                                                <td>{{ $content->product_code }}</td>
                                                                <td>{{ $content->quantity }} TK</td>
                                                                <td>{{ $content->unitcost*$content->quantity }} TK</td>
                                                                <td>{{ $content->total }}</td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total:</b> {{ $order->sub_total }}</p>
                                                <p class="text-right">VAT: {{ $order->vat }}</p>
                                                <hr>
                                                <h3 class="text-right">TK {{ $order->total }}</h3>
                                                <h4 class="text-right">Payment By: {{ $order->payment_status }}</h4>
                                                <h4 class="text-right">Pay: {{ $order->pay }}</h4>
                                                <h4 class="text-right">Due: {{ $order->due }}</h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="{{ URL::to('/pos-done/'.$order->o_id) }}" class="btn btn-primary waves-effect waves-light">Done</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>



            </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2020 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
@endsection