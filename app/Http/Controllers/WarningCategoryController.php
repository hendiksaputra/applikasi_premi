<?php

namespace App\Http\Controllers;

use app\Model\WarningCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarningCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Warning Categories';
        $warningCategories = DB::table('warning_categories')->get();
        return view('warning_category.index', compact('title','warningCategories'));
    }

    public function add()
    {
        $title = 'Warning Categories';
        return view('warning_category.add', compact('title'));
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
    

    public function addProcess(Request $request)
    {
        $request->validate([
            'warning_name' => 'required',
            'warning_index' => 'required',
        ]);
        DB::table('warning_categories')->insert([
            'warning_name' => $request->warning_name,
            'warning_index' => $request->warning_index
        ]);
        return redirect('warning_categories')->with('status', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warningCategories = DB::table('warning_categories')->where('id', $id)->first();
        return view('warning_category.edit', compact('warningCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'warning_name' => 'required',
            'warning_index' => 'required',
        ]);
        DB::table('warning_categories')->where('id', $id)
        ->update([
            'warning_name' => $request->warning_name,
            'warning_index' => $request->warning_index
        ]);
        return redirect('warning_categories')->with('status', 'Category updated successfully');
    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        DB::table('warning_categories')->where('id', $id)->delete();
        return redirect('warning_categories')->with('status', 'Category deleted successfully');
    }
}
