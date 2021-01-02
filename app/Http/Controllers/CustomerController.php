<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('customer.add_customer');
    }

    // Insert data
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:11',
            'city' => 'required',   
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;
        $image = $request->file('photo');

        if($image){
            $image_name = $request->name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'customer/photo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $data['photo'] = $image_url;
                $customer = DB::table('customers')->insert($data);
                if($customer){
                    return redirect()->back()->with('message', 'Customer Added Succesfully');
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

    // Show data
    public function show(){
        $customers = customer::all();
        return view('customer.all_customer', compact(['customers']));
    }

    // View single data
    public function view($id){
        $customers = customer::findorfail($id);
        return view('customer.view_customer', compact(['customers']));
    }

    // Delete data
    public function destroy($id){
        $delete = customer::findorfail($id);
        $photo = $delete->photo;
        unlink($photo);
        $customers = customer::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Customer Deleted Succesfully');
    }

    // Edit data
    public function edit($id){
        $customers = customer::findorfail($id);
        return view('customer.edit_customer', compact(['customers']));
    }

    // Update data
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:11',
            'city' => 'required',   
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;
        $image = $request->photo;

        if($image){
            $image_name = $request->name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'customer/photo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $data['photo'] = $image_url;
                $delete = customer::findorfail($id);
                $photo = $delete->photo;
                unlink($photo);
                $customer = customer::where('id', $id)->update($data);
                if($customer){
                    return redirect()->route('all.customer')->with('message', 'Customer Updated Succesfully');
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
                $data['photo'] = $old_photo;
                $customer = customer::where('id', $id)->update($data);
                if($customer){
                    return redirect()->route('all.customer')->with('message', 'Customer Updated Succesfully');
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
}
