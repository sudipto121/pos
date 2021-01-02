<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('add_employee');
    }

    // Insert data
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'nid_no' => 'required|unique:employees|max:255',
            'address' => 'required',
            'phone' => 'required|min:11',
            'photo' => 'required|mimes:jpg,png,jpeg|max:2048',
            'salary' => 'required',   
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['nid_no'] = $request->nid_no;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
        $image = $request->file('photo');


        if($image){
            $image_name = $request->name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'employee/photo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $data['photo'] = $image_url;
                $employee = DB::table('employees')->insert($data);
                if($employee){
                    return redirect()->route('all.employee')->with('message', 'Employee Added Succesfully');
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
        $employees = Employee::all();
        return view('all_employee', compact(['employees']));
    } 

    // View single data
    public function view($id){
        // $employees = Employee::findorfail($id);
        $employees = DB::table('employees')->where('id', $id)->first();
        return view('view_employee', compact(['employees']));
    }

    // Delete data
    public function destroy($id){
        $delete = Employee::findorfail($id);
        $photo = $delete->photo;
        unlink($photo);
        $employees = Employee::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Employee Deleted Succesfully');
    }

    // Edit data 
    public function edit($id){
        $employees = Employee::findorfail($id);
        return view('edit_employee', compact(['employees']));
    }

    // Update data
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'nid_no' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|min:11',
            'salary' => 'required',   
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['nid_no'] = $request->nid_no;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
        $image = $request->photo;

        if($image){
            $image_name = $request->name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'employee/photo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $data['photo'] = $image_url;
                $delete = Employee::findorfail($id);
                $photo = $delete->photo;
                unlink($photo);
                $employee = Employee::where('id', $id)->update($data);
                if($employee){
                    return redirect()->route('all.employee')->with('message', 'Employee Updated Succesfully');
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
                $employee = Employee::where('id', $id)->update($data);
                if($employee){
                    return redirect()->route('all.employee')->with('message', 'Employee Updated Succesfully');
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
