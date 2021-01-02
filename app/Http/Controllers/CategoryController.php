<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
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

    public function addCategory()
    {
        return view('category.add_category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertCategory(Request $request)
    {
        $validatedData = $request->validate([
            'cat_name' => 'required|unique:categories|max:255',  
        ]);

        // $data = array();
        // $data['cat_name'] = $request->cat_name;
        // $categories = DB::table('categories')->insert($data);

        Category::create($request->all());
        return redirect()->route('all.category')->with('message', 'Category Added Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function allCategory()
    {
        $categories = Category::all();
        return view('category.all_category', compact(['categories']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findorfail($id);
        return view('category.edit_category', compact(['categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cat_name' => 'required|max:255',  
        ]);
        // $data = array();
        // $data['cat_name'] = $request->cat_name;
        // $categories = DB::table('categories')->where('id', $id)->update($data);

        $categories = Category::find($id);
        $categories->cat_name = request('cat_name');
        $categories->update();
        
        return redirect()->route('all.category')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Category Deleted Succesfully');
    }
}
