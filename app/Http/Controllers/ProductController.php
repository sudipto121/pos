<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('product.add_product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Insert data
    public function store(Request $request){
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'cat_id' => 'required',
            'sup_id' => 'required',
            'product_garage' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'product_image' => 'required|mimes:jpg,png,jpeg|max:2048',  
        ]);

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['product_image'] = $request->product_image;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        $image = $request->file('product_image');

        if($image){
            $image_name = $request->product_name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'product/photo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $data['product_image'] = $image_url;
                $products = DB::table('products')->insert($data);
                if($products){
                    return redirect()->back()->with('message', 'Product Added Succesfully');
                }
                else{
                    return redirect()->back();
                }
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // Show All Data
    public function show()
    {
        $products = Product::all();
        return view('product.all_product', compact(['products']));
    }
    // View single data
    public function view($id){
        $products = DB::table('products')
                    ->join('categories', 'products.cat_id', 'categories.id')
                    ->join('suppliers', 'products.sup_id', 'suppliers.id')
                    ->select('categories.cat_name', 'products.*', 'suppliers.name')
                    ->where('products.id', $id)
                    ->first();
        return view('product.view_product', compact(['products']));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // Edit data
    public function edit($id)
    {
        $products = Product::findorfail($id);
        return view('product.edit_product', compact(['products']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // Update data
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'cat_id' => 'required',
            'sup_id' => 'required',
            'product_garage' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required', 
        ]);

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['product_image'] = $request->product_image;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        $image = $request->file('product_image');

        if($image){
            $image_name = $request->product_name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'product/photo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $data['product_image'] = $image_url;
                // $img = DB::table('products')->where('id', $id)->first();
                // $image_path = $img->product_image;
                // $done = unlink($image_path);
                // $products = DB::table('products')->where('id', $id)->update($data);

                $products = Product::where('id', $id)->update($data);
                if($products){
                    return redirect()->route('all.product')->with('message', 'Product Updated Succesfully');
                }
                else{
                    return redirect()->back();
                }
            }
            else{
                return redirect()->back();
            }
        }
        else{
            $old_photo = $request->old_photo;
            if($old_photo){
                $data['product_image'] = $old_photo;
                $products = Product::where('id', $id)->update($data);
                if($products){
                    return redirect()->route('all.product')->with('message', 'Product Updated Succesfully');
                }
                else{
                    return redirect()->back();
                }
            }
            else{ 
                return redirect()->back();
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::findorfail($id);
        $product_image = $delete->product_image;
        unlink($product_image);
        Product::findorfail($id)->delete();
        return redirect()->back()->with('message', 'Product Deleted Succesfully');
    }
}
