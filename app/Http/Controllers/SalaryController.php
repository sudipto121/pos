<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advancedSalary()
    {
        return view('salary.advanced_salary');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InsertAdvanced(Request $request)
    {
        $month = $request->month;
        $emp_id = $request->emp_id;
        $paidAdvanced = DB::table('advance_salaries')
                        ->where('month', $month)
                        ->where('emp_id', $emp_id)
                        ->first();
        if($paidAdvanced === null){
            $data = array();
            $data['emp_id'] = $request->emp_id;
            $data['month'] = $request->month;
            $data['advanced_salary'] = $request->advanced_salary;
            $data['year'] = $request->year;

            $advanced = DB::table('advance_salaries')->insert($data);
            return redirect()->route('all.advancedSalary')->with('message','Salary Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Already Advanced Paid in this Month');
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
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function showAdvancedSalary()
    {
        $salary = DB::table('advance_salaries')
                ->join('employees', 'advance_salaries.emp_id', 'employees.id')
                ->select('advance_salaries.*', 'employees.name', 'employees.salary', 'employees.photo')
                ->orderBy('id', 'desc')
                ->get();
                
        return view('salary.all_advance_salary', compact(['salary']));
    }

    public function paySalary(){
        // $month = date("F", strtotime('-1 month'));
       
        // $salary = DB::table('advance_salaries')
        //         ->join('employees', 'advance_salaries.emp_id', 'employees.id')
        //         ->select('advance_salaries.*', 'employees.name', 'employees.salary', 'employees.photo')
        //         ->where('month', $month)
        //         ->get();
        //         echo "<pre>";
        $employees = DB::table('employees')->get();
        return view('salary.pay_salary', compact(['employees']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
    }
}
