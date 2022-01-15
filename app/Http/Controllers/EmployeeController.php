<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('project')->orderBy('nik', 'asc')->get();
        return view('employee/index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::orderBy('code')->get(); 

        return view('employee.create', compact('projects'));
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
            'name' => 'required',
            'project_id' => 'required',
        ]);

        //input data cara pertama
        // $employee = new Employee;
        // $employee->nik = $request->nik;
        // $employee->project_id = $request->project_id;
        // $employee->name = $request->name;
        // $employee->save();

        // return redirect('employees')->with('status', 'Employee added successfully');
        

        //input data cara kedua mass assignment
         Employee::create([
             'nik' => $request->nik,
             'project_id' => $request->project_id,
             'name' => $request->name,

         ]);
         return redirect('employees')->with('status', 'Employee added successfully');


        //input cara ketiga mass assignment syarat : field tabel dan nama inputan harus sama
        // Employee::create($request->all());
        // return redirect('employees')->with('status', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $employee->makeHidden(['project_id']);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $projects = Project::all(); 
        return view('employee.edit', compact('employee', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'project_id' => 'required',
        ]);
        // cara pertama
        // $employee->nik = $request->nik;
        // $employee->project_id = $request->project_id;
        // $employee->name = $request->name;
        // $employee->save();

        //cara ke dua : mass assignment
        Employee::where('id', $employee->id)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'project_id' => $request->project_id,
        ]);
        return redirect('employees')->with('status', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //cara pertama
        //$employee->delete();

        //cara kedua
        Employee::destroy($employee->id);

        return redirect('employees')->with('status', 'Employee deleted successfully');

    }

    public function trash()
    {
        $employees = Employee::onlyTrashed()->orderBy('nik','asc')->get();
        return view('employee.trash', compact('employees'));

    }

    public function restore ($id = null)
    {
        if($id != null){
            $employees = Employee::onlyTrashed()
            ->where('id', $id)
            ->restore();
        } else {
            $employees = Employee::onlyTrashed()
            ->restore();
        }

        return redirect('employees/trash')->with('status', 'Employee restored successfully');
    }

    public function delete($id = null)
    {
        if($id != null){
            $employees = Employee::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        } else {
            $employees = Employee::onlyTrashed()
            ->forceDelete();
        }

        return redirect('employees/trash')->with('status', 'Employee deleted permanent successfully');
    }

    public function index_data()
    {
        $employees = Employee::orderBy('nik','asc')->get();

        return datatables()->of($employees)
            ->addIndexColumn()
            ->addColumn('nik', function($employees){
                return $employees->nik;
            })
            ->addColumn('name', function($employees){
                return $employees->name;
            })
            ->addColumn('project', function($employees){
                return $employees->project->code .' - '.$employees->project->name;
            })
            ->addColumn('action', 'employee.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
