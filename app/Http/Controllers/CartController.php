<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data = array();
        $data['id'] = $request->id; 
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $data['price'] = $request->price;
        $data['weight']=$request->weight;
        
        Cart::add($data);
        // $carts = DB::table('carts')->insert($data);
        return redirect()->back()->with('message', 'Product Added');
    }

    // Update
    public function update(Request $request, $rowId){
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        return redirect()->back()->with('message', 'Quantity Updated');
    }

    // Delete
    public function destroy($rowId){
        Cart::destroy($rowId);
        return redirect()->back()->with('message', 'Product Deleted');
    }

    public function create_invoice(Request $request){
        $request->validate([
            'customer_id' => 'required',  
        ],
        [
            'customer_id.required' => 'Please Select Customer First !',
        ]);
        $customer_id = $request->customer_id;
        $customer = DB::table('customers')->where('id', $customer_id)->first();
        $contents = Cart::content();
        return view('invoice.invoice', compact(['customer', 'contents']));
    }

    public function finalInvoice(Request $request){
        // $request->validate([
        //     'payment_status' => 'required',  
        //     'pay' => 'required', 
        //     'due' => 'required', 
        // ],
        // [
        //     'payment_status.required' => 'Please Select Payment First !',
        //     'pay.required' => 'Pay field is required !',
        //     'due.required' => 'Due field is required !',
        // ]);
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['total_products'] = $request->total_products;
        $data['sub_total'] = $request->sub_total;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;

        $order_id = DB::table('orders')->insertGetId($data);
        $contents = Cart::content();

        $odata = array();
        foreach($contents as $content){
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $content->id;
            $odata['quantity'] = $content->qty;
            $odata['unitcost'] = $content->price;
            $odata['total'] = $content->total;

            $insert = DB::table('orderdetails')->insert($odata);
        }
        if($insert){
            Cart::destroy();
            return redirect()->route('pos')->with('message', 'Success');
        }
        else{
            return redirect()->back();
        }
    }
}
