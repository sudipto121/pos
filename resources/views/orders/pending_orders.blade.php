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
                                <h4 class="pull-left page-title">Pending Orders</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li class="active">Pending Orders</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Pending Orders</h4>
                                    </div>
                                    @if(Session::has('message'))
                                        <div class="alert alert-success">
                                            {{Session::get('message')}}
                                        </div>
                                    @endif
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                            <th>Quantity</th>
                                                            <th>Total Amount</th>
                                                            <th>Payment</th>
                                                            <th>Order Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($pendings as $pending)
                                                        
                                                        <tr>
                                                            <td>{{ $pending->name }}</td>
                                                            <td>{{ $pending->order_date }}</td>
                                                            <td>{{ $pending->total_products }}</td>
                                                            <td>{{ $pending->total }}</td>
                                                            <td>{{ $pending->payment_status }}</td>
                                                            <td>{{ $pending->order_status }}</td>
                                                            <td>
                                                                <a href="{{ url('/view-orders-status/'.$pending->o_id) }}" class="btn btn-sm btn-primary">View</a>
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
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2020 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection