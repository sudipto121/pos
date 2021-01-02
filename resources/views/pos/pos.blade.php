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
                        <h4 class="pull-left page-title">POS (Point of Sale)</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Moltran</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <h3 class="">Product Category in the list</h3>
                        <div class="portfolioFilter">
                            @foreach ($categories as $category)
                            <a href="#" data-filter="*" class="current">{{ $category->cat_name }}</a>
                            @endforeach                            
                        </div>
                    </div>
                </div>
                <br>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-5">
                        <div class="panel panel-info">
                            <div class="price_card text-center">
                                <ul class="price-features">
                                    <table id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Sub total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $cart = Cart::content();
                                            @endphp
                                            @foreach ($cart as $show)
                                            <tr>
                                                <td>{{ $show->name }}</td>
                                                <td>
                                                    <form action="{{ url('/cart-update/'.$show->rowId) }}" method="POST">
                                                        @csrf
                                                        <input type="number" name="qty" value="{{ $show->qty }}" style="width: 40px;">
                                                        <button type="submit" class="btn btn-sm btn-info" style="margin-top: -5px;"><i class="fa fa-check"></i></button>
                                                    </form>
                                                </td>
                                                <td>{{ $show->price }}</td>
                                                <td>{{ $show->price*$show->qty }}</td>
                                                <td><a href="{{ url('/cart-remove/'.$show->rowId) }}"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                </ul>
                                <div class="pricing-header bg-primary">
                                    
                                    <span class="name">Quantity: {{ Cart::count() }}</span>
                                    <span class="name">Sub Total: {{ Cart::subtotal() }}</span>
                                    <span class="name">Vat: {{ Cart::tax() }}</span>
                                    <span class="price">Total: {{ Cart::total() }}</span>
                                </div>
                                
                                <form action="{{ url('/create-invoice') }}" method="POST">
                                    @csrf
                                    <div class="panel panel-info">
                                        <div class="panel panel-heading"><h3 class="panel-title text-center text-white">Add Customer
                                            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>    
                                            </h3>
                                        </div>
                                    </div>
                                    <select name="customer_id" class="form-control">
                                        <option disabled selected>Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Create Invoice</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Product Code</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $row)
                                
                                <tr>
                                    <form action="{{ url('/add-cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                    <input type="hidden" name="name" value="{{ $row->product_name }}">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="weight" value="1">
                                    <input type="hidden" name="price" value="{{ $row->selling_price }}">

                                    <td>
                                        <img src="{{ url($row->product_image) }}" style="height: 80px; width: 80px;">
                                    </td>
                                    <td>{{ $row->product_name }}</td>
                                    <td>{{ $row->cat_name }}</td>
                                    <td>{{ $row->product_code }}</td>
                                    <td><button type="submit"><i class="fa fa-plus-square"></i></button></td>
                                    </form>
                                </tr> 
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               

            </div> <!-- container -->
                        
        </div> <!-- content -->

        <footer class="footer text-right">
            2015 © Moltran.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Add Customer Modal -->
    <!-- ============================================================== -->
    <form action="{{ url('/insert-customer') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title">Add Customer</h4> 
                </div> 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-body"> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">Name</label> 
                                <input type="text" class="form-control" name="name" id="field-1" placeholder="John"> 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-2" class="control-label">Email</label> 
                                <input type="email" class="form-control" name="email" id="field-2" placeholder="Doe@gmail.com"> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label">Phone</label> 
                                <input type="text" class="form-control" name="phone" id="field-4" placeholder="01"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Address</label> 
                                <input type="text" class="form-control" name="address" id="field-5" placeholder="Address"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-6" class="control-label">Shop Name</label> 
                                <input type="text" class="form-control" name="shopname" id="field-6" placeholder="Shop Name"> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label">Account Holder</label> 
                                <input type="text" class="form-control" name="account_holder" id="field-4" placeholder="Account Holder"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Account Number</label> 
                                <input type="text" class="form-control" name="account_number" id="field-5" placeholder="Account Number"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-6" class="control-label">Bank Name</label> 
                                <input type="text" class="form-control" name="bank_name" id="field-6" placeholder="Bank Name"> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label">Bank Branch</label> 
                                <input type="text" class="form-control" name="bank_branch" id="field-4" placeholder="Bank Branch"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">City</label> 
                                <input type="text" class="form-control" name="city" id="field-5" placeholder="City"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-6" class="control-label">Photo</label> 
                                <input type="file" class="form-control" name="photo" accept="image/*" id="field-6"> 
                            </div> 
                        </div> 
                    </div>
                     
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                    <button type="submit" class="btn btn-info waves-effect waves-light" id="">Submit</button> 
                </div> 
            </div> 
        </div>
    </div><!-- /.modal -->
</form>
@endsection
