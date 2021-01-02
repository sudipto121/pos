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
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center text-white">Update Company Information</h3>
                            </div>
                            <div class="panel-body">
                                
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <form role="form" method="POST" action="{{ url('/update-setting/'.$setting->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Company Name</label> 
                                        <input type="text" class="form-control" name="company_name" value="{{ $setting->company_name }}">
                                        @if ($errors->has('company_name'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('company_name')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Company Email</label>
                                        <input type="email" class="form-control" name="company_email" value="{{ $setting->company_email }}">
                                        @if ($errors->has('company_email'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('company_email')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Company Address</label>
                                        <input type="text" class="form-control" name="company_address" value="{{ $setting->company_address }}"">
                                        @if ($errors->has('company_address'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('company_address')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Company Phone</label>
                                        <input type="text" class="form-control" name="company_phone" value="{{ $setting->company_phone }}">
                                        @if ($errors->has('company_phone'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('company_phone')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Company Logo</label>
                                        <input type="file" name="company_logo" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ $setting->company_logo }}" name="old_logo" style="height: 80px; width: 80px;">
                                        <input type="hidden" name="old_logo" value="{{ $setting->company_logo }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Company City</label>
                                        <input type="text" class="form-control" name="company_city" value="{{ $setting->company_city }}">
                                        @if ($errors->has('company_city'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('company_city')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Company Country</label>
                                        <input type="text" class="form-control" name="company_country" value="{{ $setting->company_country }}">
                                        @if ($errors->has('company_country'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('company_country')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Company Zipcode</label>
                                        <input type="text" class="form-control" name="company_zipcode" value="{{ $setting->company_zipcode }}">
                                        @if ($errors->has('company_zipcode'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('company_zipcode')}}</li>
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