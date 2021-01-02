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
                                <h4 class="pull-left page-title">Today Expense</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">Today Expense</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="text-center">{{ date("Y") }}</h3>
                                        <a href="{{ route('add.expense') }}" class="btn btn-purple waves-effect waves-light "><i class="fa fa-plus"></i> Add New</a>
                                    </div>
                                   
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Details</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($yearlyExp as $row)
                                                        <tr>
                                                            <td>{{ $row->details }}</td>
                                                            <td>{{ $row->amount }}</td>
                                                        </tr> 
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                @php
                                                    $year = date("Y");
                                                    $expenses = DB::table('expenses')->where('year', $year)->sum('amount');
                                                @endphp
                                                <h3 class="text-center">Total: <span class="badge badge-secondary">{{ $expenses }}TK</span></h3> --}}
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