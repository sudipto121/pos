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
                            <div class="panel-heading"><h3 class="panel-title text-center text-white">View Product</h3></div>
                            <div class="panel-body">
                                <img src="{{ url($products->product_image) }}" alt="image" style="height: 80px; width: 80px;">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <p>{{ $products->product_name }}</p>                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Code</label>
                                        <p>{{ $products->product_code }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <p>{{ $products->cat_name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Supplier</label>
                                        <p>{{ $products->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Garage</label>
                                        <p>{{ $products->product_garage }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Route</label>
                                        <p>{{ $products->product_route }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Buying Date</label>
                                        <p>{{ $products->buy_date }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Expire Date</label>
                                        <p>{{ $products->expire_date }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Buying Price</label>
                                        <p>{{ $products->buying_price }}</p>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Selling Price</label>
                                        <p>{{ $products->selling_price }}</p>
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