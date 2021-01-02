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
                                <h4 class="pull-left page-title">All Product</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">All Product</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="{{ route('add.product') }}" class="btn btn-purple waves-effect waves-light "><i class="fa fa-plus"></i> Add New</a>
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
                                                            <th>Code</th>
                                                            <th>Selling Price</th>
                                                            <th>Image</th>
                                                            <th>Godaun</th>
                                                            <th>Route</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($products as $product)
                                                        
                                                        <tr>
                                                            <td>{{ $product->product_name }}</td>
                                                            <td>{{ $product->product_code }}</td>
                                                            <td>{{ $product->selling_price }}</td>
                                                            <td><img src="{{ $product->product_image }}" style="height: 80px; width: 80px;"></td>
                                                            <td>{{ $product->product_garage }}</td>
                                                            <td>{{ $product->product_route }}</td>

                                                            <td>
                                                                <a href="{{ url('view-product/'.$product->id) }}" class="btn btn-sm btn-primary">View</a>
                                                                <a href="{{ url('edit-product/'.$product->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ url('delete-product/'.$product->id) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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