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
                                <h4 class="pull-left page-title">Take Attendance</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">Take Attendance</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="{{ route('add.employee') }}" class="btn btn-purple waves-effect waves-light "><i class="fa fa-plus"></i> Add New</a>
                                    </div>
                                    @if(Session::has('message'))
                                        <div class="alert alert-success">
                                            {{Session::get('message')}}
                                        </div>
                                    @endif
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{Session::get('error')}}
                                        </div>
                                    @endif
                                    <h3 class="text-success text-center">Today: {{ date("d/m/y") }}</h3>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Photo</th>
                                                            <th>Attendance</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <form role="form" method="POST" action="{{ url('/insert-attendance') }}">
                                                            @csrf
                                                            @foreach ($employees as $employee)
                                                            <tr>
                                                                <td>{{ $employee->name }}</td>
                                                                <td><img src="{{ $employee->photo }}" style="height: 80px; width: 80px;"></td>
                                                                <input type="hidden" name="user_id[]" value="{{ $employee->id }}">
                                                                <td>
                                                                   <input type="radio" name="attandance[{{ $employee->id }}]" value="Present" required>Present
                                                                   <input type="radio" name="attandance[{{ $employee->id }}]" value="Absense" required>Absense
                                                                   <input type="hidden" name="att_date" value="{{ date("d-m-y") }}">
                                                                   <input type="hidden" name="att_year" value="{{ date("Y") }}">  
                                                                   <input type="hidden" name="month" value="{{ date("F") }}">  

                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-purple waves-effect waves-light btn-lg">Take Attendance</button>
                                            </form>    
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