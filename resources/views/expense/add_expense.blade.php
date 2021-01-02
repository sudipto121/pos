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
                            <div class="panel-heading"><h3 class="panel-title text-center text-white">Add Expense</h3></div>
                            <div class="panel-body">
                                
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <form role="form" method="POST" action="{{ url('/insert-expense') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Expense Details</label>
                                        <textarea name="details" rows="4" class="form-control"></textarea>        
                                        @if ($errors->has('details'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('details')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Amount</label>
                                        <input type="text" class="form-control" name="amount" placeholder="Amount">
                                        @if ($errors->has('amount'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('amount')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="month" value="{{ date("F") }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="date" value="{{ date("d-m-y") }}">
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