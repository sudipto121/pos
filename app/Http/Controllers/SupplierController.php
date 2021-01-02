<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
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
        return view('supplier.add_supplier');
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
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:11',  
            'type' => 'required',   

        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['type'] = $request->type;
        $data['shop'] = $request->shop;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['branch_name'] = $request->branch_name;
        $data['city'] = $request->city;
        $image = $request->file('photo');

        if($image){
            $image_name = $request->name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'supplier/photo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $data['photo'] = $image_url;
                $supplier = DB::table('suppliers')->insert($data);
                if($supplier){
                    return redirect()->route('all.supplier')->with('message', 'Supplier Added Succesfully');
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
            return redirect()->route('all.supplier')->with('message', 'Supplier Added Succesfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */

    // Show data
    public function show(){
        $suppliers = Supplier::all();
        return view('supplier.all_supplier', compact(['suppliers']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */

    // View single data
    public function view($id){
        $suppliers = Supplier::findorfail($id);
        return view('supplier.view_supplier', compact(['suppliers']));
    }

    // Edit data
    public function edit($id){
        $suppliers = Supplier::findorfail($id);
        return view('supplier.edit_supplier', compact(['suppliers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */

    // Update data
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:11',  
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email; 
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['type'] = $request->type;
        $data['shop'] = $request->shop;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['branch_name'] = $request->branch_name;
        $data['city'] = $request->city;
        $image = $request->photo;

        if($image){
            $image_name = $request->name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'supplier/photo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $data['photo'] = $image_url;
                // $delete = Supplier::findorfail($id);
                // $photo = $delete->photo;
                // unlink($photo);
                //$supplier = DB::table('suppliers')->where('id', $id)->update($data);

                $supplier = Supplier::findorfail($id)->update($data);
                if($supplier){
                    return redirect()->route('all.supplier')->with('message', 'Supplier Updated Succesfully');
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
                $supplier = Supplier::where('id', $id)->update($data);
                if($supplier){
                    return redirect()->route('all.supplier')->with('message', 'Supplier Updated Succesfully');
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
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */

    // Delete data
    public function destroy($id){
        $delete = Supplier::findorfail($id);
        $photo = $delete->photo;
        unlink($photo);
        $suppliers = Supplier::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Supplier Deleted Succesfully');
    }
}
