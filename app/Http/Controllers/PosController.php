<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){ 
        $products = DB::table('products')
                    ->join('categories', 'products.cat_id', 'categories.id')
                    ->select('categories.cat_name', 'products.*')
                    ->get();
        $customers = DB::table('customers')->get();
        $categories = DB::table('categories')->get();

        return view('pos.pos', compact(['products', 'customers', 'categories']));
    }

    public function pendingOrders(){
        $pendings = DB::table('orders')
                    ->join('customers', 'orders.customer_id', 'customers.id')
                    ->select('customers.name', 'orders.*')            
                    ->where('order_status', 'pending')->get();
        
        return view('orders.pending_orders', compact(['pendings']));
    }

    public function viewOrders($id){
        $order = DB::table('orders')
                    ->join('customers', 'orders.customer_id', 'customers.id')
                    ->where('orders.o_id', $id)
                    ->first();
    
        $order_details = DB::table('orderdetails')
                        ->join('products', 'orderdetails.product_id', 'products.id')
                        ->select('orderdetails.*', 'products.product_name', 'products.product_code')
                        ->where('order_id', $id)
                        ->get();
        // print_r($order);
        // print_r($order_details);            
        return view('orders.order_confirmation', compact(['order', 'order_details']));
    }

    public function posDone($id){
        $approve = DB::table('orders')->where('o_id', $id)->update(['order_status' => 'success']);
        if($approve){
            return redirect()->route('pending.orders')->with('message', 'Successfully Order Confirmed And All Products Delevered');
        }else{
            return redirect()->back();
        }
    }
}
