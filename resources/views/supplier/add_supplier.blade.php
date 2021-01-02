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
                    {{-- <div class="col-md-2"></div> --}}
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Add Supplier</h3></div>
                            <div class="panel-body">
                                
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <form role="form" method="POST" action="{{ url('/insert-supplier') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name">
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger">
                                                    <li>{{$errors->first('name')}}</li>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Phone</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                                            @if ($errors->has('phone'))
                                                <div class="alert alert-danger">
                                                    <li>{{$errors->first('phone')}}</li>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Address">
                                            @if ($errors->has('address'))
                                                <div class="alert alert-danger">
                                                    <li>{{$errors->first('address')}}</li>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Supplier Type</label>
                                            <select name="type" class="form-control">
                                                <option disabled="" selected="">Nothing Selected</option>
                                                <option value="Distributor">Distributor</option>
                                                <option value="Whole Seller">Whole Seller</option>
                                                <option value="Brochure">Brochure</option>
                                            </select>
                                            @if ($errors->has('type'))
                                                <div class="alert alert-danger">
                                                    <li>{{$errors->first('type')}}</li>
                                                </div>
                                            @endif
                                        </div> 
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Photo</label>
                                            <input type="file" name="photo" accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Shop</label>
                                            <input type="text" class="form-control" name="shop" placeholder="Shop">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Account Holder</label>
                                            <input type="text" class="form-control" name="account_holder" placeholder="Account Holder">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Account Number</label>
                                            <input type="text" class="form-control" name="account_number" placeholder="Account Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name" placeholder="Bank Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Branch Name</label>
                                            <input type="text" class="form-control" name="branch_name" placeholder="Branch Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">City</label>
                                            <input type="text" class="form-control" name="city" placeholder="City">
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                </form>
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