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
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Moltran</a></li>
                            <li class="active">IT</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">View Customer</h3></div>
                            <div class="panel-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <p>{{ $customers->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <p>{{ $customers->email }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <p>{{ $customers->phone }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <p>{{ $customers->address }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Shop Name</label>
                                        @if($customers->shopname == null)
                                            None
                                        @else
                                        <p>{{ $customers->shopname }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Photo</label>
                                        <img src="{{ url($customers->photo) }}" alt="image" style="height: 80px; width: 80px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account Holder</label>
                                        <p>{{ $customers->account_holder }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account Number</label>
                                        <p>{{ $customers->account_number }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Name</label>
                                        <p>{{ $customers->bank_name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Branch</label>
                                        <p>{{ $customers->bank_branch }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <p>{{ $customers->city }}</p>
                                    </div>

                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                    

                </div> <!-- End row -->

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