<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceCategory;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $title = 'Attendances';
    //     $subtitle = 'Attendances Data';
    //     $attendances = Attendance::with('employee','attendance_category')->latest()->get();
    
    //     return view('attendance.index', compact('title', 'subtitle', 'attendances','category'));
    // }
    
    public function index(Request $request)
    {
        $title = 'Attendances';
        $subtitle = 'Attendances Data';
        $category = AttendanceCategory::orderBy('code','asc')->get();
        if ($request->ajax()) {
            $attendances = DB::table('attendances')
                        ->select(['attendances.id','employees.nik','employees.name','attendances.present_time','attendance_categories.code','attendance_categories.remarks'])
                        ->join('employees','attendances.employee_id','=','employees.id')
                        ->join('attendance_categories','attendances.attendance_category_id','=','attendance_categories.id')
                        ->orderBy('attendances.id', 'desc');
            return datatables()->of($attendances)
                ->addIndexColumn()
                ->addColumn('nik', function($attendances){
                    return $attendances->nik;
                })
                ->addColumn('name', function($attendances){
                    return $attendances->name;
                })
                ->addColumn('time', function($attendances){
                    return $attendances->present_time;
                })
                ->addColumn('category', function($attendances){
                    return $attendances->code .' - '.$attendances->remarks;
                })
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('date1') && !empty($request->get('date2')))) {
                        $instance->where(function($w) use($request){
                            $date1 = $request->get('date1');
                            $date2 = $request->get('date2');
                            $w->whereBetween(DB::raw('DATE(present_time)'), array($date1, $date2));
                        });
                    }
                    if (!empty($request->get('nik'))) {
                        $instance->where(function($w) use($request){
                            $nik = $request->get('nik');
                            $w->orWhere('nik', 'LIKE','%'.$nik.'%');
                        });
                    }
                    if (!empty($request->get('name'))) {
                        $instance->where(function($w) use($request){
                            $name = $request->get('name');
                            $w->orWhere('name', 'LIKE','%'.$name.'%');
                        });
                    }
                    if (!empty($request->get('category'))) {
                        $instance->where(function($w) use($request){
                            $category = $request->get('category');
                            $w->orWhere('code', 'LIKE','%'.$category.'%');
                        });
                    }
                    if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->orWhere('name', 'LIKE', "%$search%")
                            ->orWhere('nik', 'LIKE', "%$search%");
                        });
                    }
                }, true)
                ->addColumn('action', 'attendance.action')
                ->rawColumns(['action'])
                ->toJson();
        } else {
            
        }
        return view('attendance.index', compact('title','subtitle','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Attendances';
        $subtitle = 'Add Attendances';
        $employees = Employee::with('project')->orderBy('nik','asc')->get();
        $category = AttendanceCategory::orderBy('code','asc')->get();

        return view('attendance.add', compact('title', 'subtitle', 'employees','category'));
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
            'employee_id' => 'required',
            'present_time' => 'required',
            'attendance_category_id' => 'required'
        ],[
            'employee_id.required' => 'Employee is required',
            'present_time.required' => 'Present Time is required',
            'attendance_category_id.required' => 'Attendance Category is required',
        ]);
        Attendance::create([
            'employee_id' => $request->employee_id,
            'present_time' => $request->present_time,
            'attendance_category_id' => $request->attendance_category_id

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
        $title = 'Attendances';
        $subtitle = 'Attendances Detail';
        // $attendances = Attendance::with('employee','attendance_category')->latest()->get();

        return view('attendance.show', compact('title', 'subtitle', 'attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        $title = 'Attendances';
        $subtitle = 'Edit Attendances';
        $employees = Employee::with('project')->orderBy('nik','asc')->get();
        $category = AttendanceCategory::orderBy('code','asc')->get();

        return view('attendance.edit', compact('title', 'subtitle', 'employees','category','attendance'));
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
            'employee_id' => 'required',
            'present_time' => 'required',
            'attendance_category_id' => 'required'
        ],[
            'employee_id.required' => 'Employee is required',
            'present_time.required' => 'Present Time is required',
            'attendance_category_id.required' => 'Attendance Category is required',
        ]);
        Attendance::where('id', $attendance->id)->update([
            'employee_id' => $request->employee_id,
            'present_time' => $request->present_time,
            'attendance_category_id' => $request->attendance_category_id

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

    public function index_data()
    {
        $attendances = Attendance::latest()->get();

        return datatables()->of($attendances)
            ->addIndexColumn()
            ->addColumn('nik', function($attendances){
                return $attendances->employee->nik;
            })
            ->addColumn('name', function($attendances){
                return $attendances->employee->name;
            })
            ->addColumn('time', function($attendances){
                return $attendances->present_time;
            })
            ->addColumn('category', function($attendances){
                return $attendances->attendance_category->code .' - '.$attendances->attendance_category->remarks;
            })
            ->addColumn('action', 'attendance.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function trash()
    {
        $title = 'Attendances';
        $subtitle = 'Attendances Data - Deleted';
        $attendances = Attendance::onlyTrashed()->latest()->get();
        return view('attendance.trash', compact('title','subtitle','attendances'));

    }

    public function restore ($id = null)
    {
        if($id != null){
            $attendances = Attendance::onlyTrashed()
            ->where('id', $id)
            ->restore();
        } else {
            $attendances = Attendance::onlyTrashed()
            ->restore();
        }

        return redirect('attendances/trash')->with('status', 'Attendance restored successfully');
    }

    public function delete($id = null)
    {
        if($id != null){
            $attendances = Attendance::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        } else {
            $attendances = Attendance::onlyTrashed()
            ->forceDelete();
        }

        return redirect('attendances/trash')->with('status', 'Attendance deleted permanent successfully');
    }
}
