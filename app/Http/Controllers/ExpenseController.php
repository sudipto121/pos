<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use DB;

class ExpenseController extends Controller
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
        return view('expense.add_expense');
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'details' => 'required|max:255',  
            'amount' => 'required',  

        ]);
        Expense::create($request->all());
        return redirect()->back()->with('message', 'Expense Added Successfully');
    }
    // Today Expense Show
    public function todayExpense()
    {
        $date = date("d-m-y");
        $todayExp = Expense::where('date', $date)->get();
        return view('expense.today_expense', compact(['todayExp']));
    }
    // Show Monthly Expense
    public function monthlyExpense()
    {
        $month = date("F");
        $monthlyExp = DB::table('expenses')->where('month', $month)->get();
        return view('expense.monthly_expense', compact(['monthlyExp']));
    }
    // Yearly Expense
    public function yearlyExpense()
    {
        $year = date("Y");
        $yearlyExp = DB::table('expenses')->where('year', $year)->get();
        return view('expense.yearly_expense', compact(['yearlyExp']));
    }
    // Edit Today Expense
    public function editTodayExpense($id)
    {
        $edittoday = Expense::where('id', $id)->first();
        return view('expense.edit_today_expense', compact(['edittoday']));
    }
    // Update Today Expense
    public function updateTodayExpense(Request $request, $id)
    {
        $validatedData = $request->validate([
            'details' => 'required|max:255',  
            'amount' => 'required',  

        ]);
        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        Expense::where('id', $id)->update($data);
        return redirect()->route('today.expense')->with('message', 'Expense Updated Successfully');      
    }
}
