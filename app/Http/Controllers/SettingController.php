<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
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
    public function setting(Request $request)
    {
        $setting = DB::table('settings')->first();
        return view('setting.setting', compact(['setting']));
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required|min:11',
            'company_city' => 'required',
            'company_country' => 'required',   
            'company_zipcode' => 'required',   
        ]);
        
        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['company_email'] = $request->company_email;
        $data['company_phone'] = $request->company_phone;
        $data['company_city'] = $request->company_city;
        $data['company_country'] = $request->company_country;
        $data['company_zipcode'] = $request->company_zipcode;
        
        $image = $request->company_logo;

        if($image){
            $image_name = $request->company_name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'company/logo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $data['company_logo'] = $image_url;
                // $delete = Employee::findorfail($id);
                // $logo = $delete->company_logo;
                // unlink($logo);
                $company = DB::table('settings')->where('id', $id)->update($data);
                if($company){
                    return redirect()->back()->with('message', 'Company Information Updated Succesfully');
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
            $old_logo = $request->old_logo;
            if($old_logo){
                $data['company_logo'] = $old_logo;
                $company = DB::table('settings')->where('id', $id)->update($data);
                if($company){
                    return redirect()->back()->with('message', 'Company Information Updated Succesfully');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
