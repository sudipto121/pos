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
                                <h4 class="pull-left page-title">All Supplier</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">All Supplier</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="{{ route('add.supplier') }}" class="btn btn-purple waves-effect waves-light "><i class="fa fa-plus"></i> Add New</a>
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
                                                            <th>Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($suppliers as $supplier)
                                                        
                                                        <tr>
                                                            <td>{{ $supplier->name }}</td>
                                                            <td>{{ $supplier->phone }}</td>
                                                            <td>{{ $supplier->address }}</td>
                                                            <td><img src="{{ $supplier->photo }}" style="height: 80px; width: 80px;"></td>
                                                            <td>{{ $supplier->type }}</td>
                                                            
                                                            <td>
                                                                <a href="{{ url('view-supplier/'.$supplier->id) }}" class="btn btn-sm btn-primary">View</a>
                                                                <a href="{{ url('edit-supplier/'.$supplier->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ url('delete-supplier/'.$supplier->id) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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