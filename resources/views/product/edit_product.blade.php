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
                            <div class="panel-heading"><h3 class="panel-title text-center text-white">Update Product</h3></div>
                            <div class="panel-body">
                                
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <form role="form" method="POST" action="{{ url('/update-product/'.$products->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" value="{{ $products->product_name }}">
                                        @if ($errors->has('product_name'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('product_name')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Code</label>
                                        <input type="text" class="form-control" name="product_code" value="{{ $products->product_code }}">
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
                                                <option value="{{ $row->id }}"
                                                    <?php if( $products->cat_id==$row->id ) {echo "selected";}?>
                                                    >{{ $row->cat_name }}</option>
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
                                            <option value="{{ $row->id }}"
                                                <?php if( $products->sup_id==$row->id ) {echo "selected";}?>
                                                >{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Godaun</label>
                                        <input type="text" class="form-control" name="product_garage" value="{{ $products->product_garage }}">
                                        @if ($errors->has('product_garage'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('product_garage')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Route</label>
                                        <input type="text" class="form-control" name="product_route" value="{{ $products->product_route }}">
                                        @if ($errors->has('product_route'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('product_route')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Buying Date</label>
                                        <input type="date" class="form-control" name="buy_date" value="{{ $products->buy_date }}">
                                        @if ($errors->has('buy_date'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('buy_date')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Expire Date</label>
                                        <input type="date" class="form-control" name="expire_date" value="{{ $products->expire_date }}">
                                        @if ($errors->has('expire_date'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('expire_date')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Buying Price</label>
                                        <input type="text" class="form-control" name="buying_price" value="{{ $products->buying_price }}">
                                        @if ($errors->has('buying_price'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('buying_price')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Selling Price</label>
                                        <input type="text" class="form-control" name="selling_price" value="{{ $products->selling_price }}">
                                        @if ($errors->has('selling_price'))
                                            <div class="alert alert-danger">
                                                <li>{{$errors->first('selling_price')}}</li>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">New Product Photo</label>
                                        <input type="file" name="product_image" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ url($products->product_image) }}" style="height: 80px; width: 80px;">
                                        <input type="hidden" name="old_photo" value="{{ $products->product_image }}">
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