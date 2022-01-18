<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarningCategoryController extends Controller
{
    public function index()
    {
        $title = 'Warning Categories';
        $subtitle = 'Warning Categories Data';
        $warningCategories = DB::table('warning_categories')->get();
        return view('warning_category.index', compact('title','subtitle','warningCategories'));
    }

    public function add()
    {
        $title = 'Warning Categories';
        $subtitle = 'Add Warning Categories';
        return view('warning_category.add', compact('title','subtitle'));
    }

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

    public function edit($id)
    {
        $title = 'Warning Categories';
        $subtitle = 'Edit Warning Categories';
        $warningCategories = DB::table('warning_categories')->where('id', $id)->first();
        return view('warning_category.edit', compact('title','subtitle','warningCategories'));
    }

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

    public function delete($id)
    {
        DB::table('warning_categories')->where('id', $id)->delete();
        return redirect('warning_categories')->with('status', 'Category deleted successfully');
    }
}
