<?php

namespace App\Http\Controllers;

use App\Models\Prod_parameter;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Prod_parameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $prod_parameters = Prod_parameter::all();
        // // return $prod_parameters;
        // return view('prod_parameter.index', compact('prod_parameters'));

        $prod_parameters = Prod_parameter::with('project')->get();
        return view('prod_parameter/index', compact('prod_parameters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all(); 

        return view('prod_parameter.create', compact('projects'));
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
            'project_id' => 'required',
            'date' => 'required',
            'plan_fuel_factor' => 'required',
            'cum_prod_ob' => 'required',
            'cum_prod_coal' => 'required',
            'cum_fuel' => 'required',
            'join_survey' => 'required',
        ]);

        //input data cara pertama
        // $employee = new Employee;
        // $employee->nik = $request->nik;
        // $employee->project_id = $request->project_id;
        // $employee->employee_name = $request->employee_name;
        // $employee->save();

        // return redirect('employees')->with('status', 'Employee added successfully');
        

        //input data cara kedua mass assignment
        Prod_parameter::create([
             'project_id' => $request->project_id,
             'date' => $request->date,
             'plan_fuel_factor' => $request->plan_fuel_factor,
             'cum_prod_ob' => $request->cum_prod_ob,
             'cum_prod_coal' => $request->cum_prod_coal,
             'cum_fuel' => $request->cum_fuel,
             'join_survey' => $request->join_survey,

         ]);
         return redirect('prod_parameters')->with('status', 'Production Parameters added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prod_parameter  $prod_parameter
     * @return \Illuminate\Http\Response
     */
    public function show(Prod_parameter $prod_parameter)
    {
        $prod_parameter->makeHidden(['project_id']);
        return view('prod_parameter/show', compact('prod_parameter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prod_parameter  $prod_parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Prod_parameter $prod_parameter)
    {
        $projects = Project::all(); 
        return view('prod_parameter.edit', compact('prod_parameter', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prod_parameter  $prod_parameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prod_parameter $prod_parameter)
    {
        $request->validate([
            'project_id' => 'required',
            'date' => 'required',
            'plan_fuel_factor' => 'required',
            'cum_prod_ob' => 'required',
            'cum_prod_coal' => 'required',
            'cum_fuel' => 'required',
            'join_survey' => 'required',
        ]);

        Prod_parameter::where('id', $prod_parameter->id)
            ->update([
             'project_id' => $request->project_id,
             'date' => $request->date,
             'plan_fuel_factor' => $request->plan_fuel_factor,
             'cum_prod_ob' => $request->cum_prod_ob,
             'cum_prod_coal' => $request->cum_prod_coal,
             'cum_fuel' => $request->cum_fuel,
             'join_survey' => $request->join_survey,
                    ]);
        return redirect('prod_parameters')->with('status', 'Production Parameter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prod_parameter  $prod_parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prod_parameter $prod_parameter)
    {
        Prod_parameter::destroy($prod_parameter->id);

        return redirect('prod_parameters')->with('status', 'Production Parameter deleted successfully');
    }

    
}
