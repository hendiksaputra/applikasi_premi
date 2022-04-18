<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceCategory;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $attendances = Attendance::with('employee','attendance_category')->latest()->get();

        return view('attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::with('project')->orderBy('nik','asc')->get();
        $category = AttendanceCategory::orderBy('code','asc')->get();

        return view('attendance.add', compact('employees','category'));
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
            'nik' => 'required',
            'name_employee' => 'required',
            'attendances_month' => 'required',
            'present_time' => 'required',
            'attendance_value' => 'required'
        ],[
            'nik.required' => 'NIK is required',
            'name_employee.required' => 'Name Employee Month is required',
            'attendances_month.required' => 'Attendances Time is required',
            'present_time.required' => 'Present Time  is required',
            'attendance_value.required' => 'Attendance Value is required',
        ]);
        Attendance::create([
            'nik' => $request->nik,
            'name_employee' => $request->name_employee,
            'attendances_month' => $request->attendances_month,
            'present_time' => $request->present_time,
            'attendance_value' => $request->attendance_value

        ]);
        return redirect('attendances')->with('status', 'Attendance added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        $employees = Employee::with('project')->orderBy('nik','asc')->get();
        $category = AttendanceCategory::orderBy('code','asc')->get();

        return view('attendance.edit', compact('employees','category','attendance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'nik' => 'required',
            'name_employee' => 'required',
            'attendances_month' => 'required',
            'present_time' => 'required',
            'attendance_value' => 'required'
        ],[
            'nik.required' => 'NIK is required',
            'name_employee.required' => 'Name Employee Month is required',
            'attendances_month.required' => 'Attendances Time is required',
            'present_time.required' => 'Present Time  is required',
            'attendance_value.required' => 'Attendance Value is required',
        ]);
        Attendance::where('id', $attendance->id)->update([
            'nik' => $request->nik,
            'name_employee' => $request->name_employee,
            'attendances_month' => $request->attendances_month,
            'present_time' => $request->present_time,
            'attendance_value' => $request->attendance_value


        ]);
        return redirect('attendances')->with('status', 'Attendance edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect('attendances')->with('status', 'Attendance deleted successfully');
    }
}
