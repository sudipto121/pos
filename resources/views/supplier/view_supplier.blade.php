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
                            <div class="panel-heading"><h3 class="panel-title">View Supplier</h3></div>
                            <div class="panel-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <p>{{ $suppliers->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <p>{{ $suppliers->email }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <p>{{ $suppliers->phone }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <p>{{ $suppliers->address }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Supplier Type</label>
                                        <p>{{ $suppliers->type }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Photo</label>
                                        <img src="{{ url($suppliers->photo) }}" alt="image" style="height: 80px; width: 80px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Shop</label>
                                        <p>{{ $suppliers->shop }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account Holder</label>
                                        <p>{{ $suppliers->account_holder }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account Number</label>
                                        <p>{{ $suppliers->account_number }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Name</label>
                                        <p>{{ $suppliers->bank_name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Branch Name</label>
                                        <p>{{ $suppliers->branch_name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <p>{{ $suppliers->city }}</p>
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