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
                            <div class="panel-heading"><h3 class="panel-title">Update Employee</h3></div>
                            <div class="panel-body">
                                
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <form role="form" method="POST" action="{{ url('/update-employee/'.$employees->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $employees->name }}">
                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('name')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $employees->email }}">
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('email')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $employees->phone }}"">
                                        @if ($errors->has('phone'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('phone')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ $employees->address }}">
                                        @if ($errors->has('address'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('address')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Experience</label>
                                        <input type="text" class="form-control" name="experience" value="{{ $employees->experience }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">New Photo</label>
                                        <input type="file" name="photo" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ url($employees->photo) }}" name="old_photo" style="height: 80px; width: 80px;">
                                        <input type="hidden" name="old_photo" value="{{ $employees->photo }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nid_no</label>
                                        <input type="text" class="form-control" name="nid_no" value="{{ $employees->nid_no }}">
                                        @if ($errors->has('nid_no'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('nid_no')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Salary</label>
                                        <input type="text" class="form-control" name="salary" value="{{ $employees->salary }}">
                                        @if ($errors->has('salary'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('salary')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Vacation</label>
                                        <input type="text" class="form-control" name="vacation" value="{{ $employees->vacation }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <input type="text" class="form-control" name="city" value="{{ $employees->city }}">
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