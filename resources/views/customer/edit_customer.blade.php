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
                            <div class="panel-heading"><h3 class="panel-title">Update Customer</h3></div>
                            <div class="panel-body">
                                
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <form role="form" method="POST" action="{{ url('/update-customer/'.$customers->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $customers->name }}">
                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('name')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $customers->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $customers->phone }}"">
                                        @if ($errors->has('phone'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('phone')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ $customers->address }}">
                                        @if ($errors->has('address'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('address')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Shop Name</label>
                                        <input type="text" class="form-control" name="shopname" value="{{ $customers->shopname }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">New Photo</label>
                                        <input type="file" name="photo" accept="image/*" onchange="readURL(this);">
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ url($customers->photo) }}" name="old_photo" style="height: 80px; width: 80px;">
                                        <input type="hidden" name="old_photo" value="{{ $customers->photo }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account Holder</label>
                                        <input type="text" class="form-control" name="account_holder" value="{{ $customers->account_holder }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account Number</label>
                                        <input type="text" class="form-control" name="account_number" value="{{ $customers->account_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Name</label>
                                        <input type="text" class="form-control" name="bank_name" value="{{ $customers->bank_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Branch</label>
                                        <input type="text" class="form-control" name="bank_branch" value="{{ $customers->bank_branch }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">city</label>
                                        <input type="text" class="form-control" name="city" value="{{ $customers->city }}">
                                        @if ($errors->has('city'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('city')}}</li>
                                            </div>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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