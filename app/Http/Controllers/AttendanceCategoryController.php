<?php

namespace App\Http\Controllers;

use App\Models\AttendanceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendanceCategories = DB::table('attendance_categories')->orderBy('code', 'asc')->get();
        return view('attendance_category.index', compact('attendanceCategories'));
    }

    public function add()
    {
        return view('attendance_category.add');
    }

    public function addProcess(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:attendance_categories,code',
            'remarks' => 'required',
        ]);
        DB::table('attendance_categories')->insert([
            'code' => $request->code,
            'remarks' => $request->remarks
        ]);
        return redirect('attendance_categories')->with('status', 'Category added successfully');
    }

    public function edit($id)
    {
        $attendanceCategories = DB::table('attendance_categories')->where('id', $id)->first();
        return view('attendance_category.edit', compact('attendanceCategories'));
    }

    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'remarks' => 'required',
        ]);
        DB::table('attendance_categories')->where('id', $id)
        ->update([
            'code' => $request->code,
            'remarks' => $request->remarks
        ]);
        return redirect('attendance_categories')->with('status', 'Category updated successfully');
        // return redirect()->route('attendance_category.index')->with('status', 'Category updated successfully');
    }

    public function delete($id)
    {
        DB::table('attendance_categories')->where('id', $id)->delete();
        return redirect('attendance_categories')->with('status', 'Category deleted successfully');
    }
}

