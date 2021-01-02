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
                                <h4 class="pull-left page-title">All Customer</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">All Customer</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="{{ route('add.customer') }}" class="btn btn-purple waves-effect waves-light "><i class="fa fa-plus"></i> Add New</a>
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
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Image</th>
                                                            <th>City</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($customers as $customer)
                                                        
                                                        <tr>
                                                            <td>{{ $customer->name }}</td>
                                                            <td>{{ $customer->phone }}</td>
                                                            <td>{{ $customer->address }}</td>
                                                            <td><img src="{{ $customer->photo }}" style="height: 80px; width: 80px;"></td>
                                                            <td>{{ $customer->city }}</td>
                                                            <td>
                                                                <a href="{{ url('view-customer/'.$customer->id) }}" class="btn btn-sm btn-primary">View</a>
                                                                <a href="{{ url('edit-customer/'.$customer->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ url('delete-customer/'.$customer->id) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection