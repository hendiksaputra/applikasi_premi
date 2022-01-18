<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceCategoryController extends Controller
{
    public function index()
    {
        $title = 'Attendance Categories';
        $subtitle = 'Attendance Categories Data';
        $attendanceCategories = DB::table('attendance_categories')->orderBy('code', 'asc')->get();
        return view('attendance_category.index', compact('title','subtitle','attendanceCategories'));
    }

    public function add()
    {
        $title = 'Attendance Categories';
        $subtitle = 'Add Attendance Categories';
        return view('attendance_category.add', compact('title','subtitle'));
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
        $title = 'Attendance Categories';
        $subtitle = 'Edit Attendance Categories';
        $attendanceCategories = DB::table('attendance_categories')->where('id', $id)->first();
        return view('attendance_category.edit', compact('title','subtitle','attendanceCategories'));
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
