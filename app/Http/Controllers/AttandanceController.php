<?php

namespace App\Http\Controllers;

use App\Models\Attandance;
use Illuminate\Http\Request;
use DB;

class AttandanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')->get();
        return view('attandance.add_attandance', compact(['employees']));
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
       // return $request->all();
       $date = $request->att_date;
       $att_date = DB::table('attandances')->where('att_date', $date)->first();
       if($att_date == null){
        foreach($request->user_id as $id){
            $data[] = [
                "user_id" => $id,
                "attandance" => $request->attandance[$id],
                "att_date" => $request->att_date,
                "att_year" => $request->att_year,
                "month" => $request->month,
            ];
        }
        $att = DB::table('attandances')->insert($data);
        return redirect()->back()->with('message','Attadanse Added Successfully');

       }else{
        return redirect()->back()->with('error','Attadanse Already Taken');

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $attandances = DB::table('attandances')
                        ->join('employees','attandances.user_id','employees.id')
                        ->select('employees.name','employees.photo','attandances.*')                  
                        ->get();
                        // echo "<pre>";
                        // print_r($attandances);
        return view('attandance.all_attandance', compact(['attandances']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attandance $attandance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attandance $attandance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attandance $attandance)
    {
        //
    }
}
