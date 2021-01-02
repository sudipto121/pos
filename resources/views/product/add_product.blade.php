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
                            <div class="panel-heading"><h3 class="panel-title text-center text-white">Add Product</h3></div>
                            <div class="panel-body">
                                
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <form role="form" method="POST" action="{{ url('/insert-product') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                                        @if ($errors->has('product_name'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('product_name')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Code</label>
                                        <input type="text" class="form-control" name="product_code" placeholder="Product Code">
                                        @if ($errors->has('product_code'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('product_code')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        @php
                                          $cat = DB::table('categories')->get();  
                                        @endphp
                                        <select name="cat_id" class="form-control">
                                            @foreach ($cat as $row)
                                                <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Supplier</label>
                                        @php
                                            $sup = DB::table('suppliers')->get();
                                        @endphp
                                        <select name="sup_id" class="form-control">
                                            @foreach ($sup as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Godaun</label>
                                        <input type="text" class="form-control" name="product_garage" placeholder="Godaun">
                                        @if ($errors->has('product_garage'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('product_garage')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Route</label>
                                        <input type="text" class="form-control" name="product_route" placeholder="Product Route">
                                        @if ($errors->has('product_route'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('product_route')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Buying Date</label>
                                        <input type="date" class="form-control" name="buy_date">
                                        @if ($errors->has('buy_date'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('buy_date')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Expire Date</label>
                                        <input type="date" class="form-control" name="expire_date">
                                        @if ($errors->has('expire_date'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('expire_date')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Buying Price</label>
                                        <input type="text" class="form-control" name="buying_price" placeholder="Buying Price">
                                        @if ($errors->has('buying_price'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('buying_price')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Selling Price</label>
                                        <input type="text" class="form-control" name="selling_price" placeholder="Selling Price">
                                        @if ($errors->has('selling_price'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('selling_price')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Photo</label>
                                        <input type="file" name="product_image" accept="image/*">
                                        @if ($errors->has('product_image'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('product_image')}}</li>
                                            </div>
                                        @endif
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