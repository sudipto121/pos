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
                                <h4 class="pull-left page-title">Pay Salary</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">All Employees</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3>{{ date("F Y") }}</h3>
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
                                                            <th>Photo</th>
                                                            <th>Salary</th>
                                                            <th>Month</th>
                                                            {{-- <th>Advanced</th> --}}
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($employees as $row)
                                                        
                                                        <tr>
                                                            <td><span class="badge badge-secondary">{{ $row->name }}</span></td>
                                                            <td><img src="{{ $row->photo }}" style="height: 80px; width: 80px;"></td>

                                                            <td>{{ $row->salary }}</td>
                                                            <td><span class="badge badge-success">{{ date("F", strtotime("-1 Months")) }}</span></td>
                                                            {{-- <td>{{ $row->advanced_salary }}</td>  --}}
                                                            <td>
                                                                <a href="{{ url('view-salary/'.$row->id) }}" class="btn btn-sm btn-primary">Pay Now</a>
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