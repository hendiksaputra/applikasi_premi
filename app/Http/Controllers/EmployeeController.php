<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;

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
        $projects = Project::orderBy('code_project')->get(); 

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
            'name_employee' => 'required',
            'project_id' => 'required',
        ]);

        //input data cara pertama
        $employee = new Employee;
        $employee->nik = $request->nik;
        $employee->project_id = $request->project_id;
        $employee->name_employee = $request->name_employee;
        $employee->save();

        // return redirect('employees')->with('status', 'Employee added successfully');
        

        //input data cara kedua mass assignment
        //  Employee::create([
        //      'nik' => $request->nik,        
        //      'name_employee' => $request->name_employee,
        //      'project_id' => $request->project_id,

        //  ]);
         return redirect('employees')->with('status', 'Employee added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
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
            'name_employee' => 'required',
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
            'name_employee' => $request->name_employee,
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
        Employee::destroy($employee->id);

        return redirect('employees')->with('status', 'Employee deleted successfully');

    }
}
