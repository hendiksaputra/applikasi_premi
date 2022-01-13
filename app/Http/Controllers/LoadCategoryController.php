<?php

namespace App\Http\Controllers;

use App\Models\LoadCategory;
use Illuminate\Http\Request;

class LoadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loadCategories = LoadCategory::all();
        return view('load_category.index', [
            'title' => 'Load Categories',
            'subtitle' => 'Load Categories Data',
            'loadCategories' => $loadCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('load_category.add', [
            'title' => 'Load Categories',
            'subtitle' => 'Add Load Categories'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        LoadCategory::create($request->all());
        return redirect('load_categories')->with('status', 'Load Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoadCategory  $loadCategory
     * @return \Illuminate\Http\Response
     */
    public function show(LoadCategory $loadCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoadCategory  $loadCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(LoadCategory $loadCategory)
    {
        $title = 'Load Categories';
        $subtitle = 'Edit Load Category';
        return view('load_category.edit', compact('title','subtitle','loadCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoadCategory  $loadCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoadCategory $loadCategory)
    {
        $request->validate([
            'name' => 'required'
        ]);

        LoadCategory::where('id', $loadCategory->id)->update([
            'name' => $request->name
        ]);
        return redirect('load_categories')->with('status', 'Load Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoadCategory  $loadCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoadCategory $loadCategory)
    {
        $loadCategory->delete();

        return redirect('load_categories')->with('status','Load Category deleted successfully');
    }
}
