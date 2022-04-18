<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Employee;
use App\Models\ProdParameter;
use App\Models\PlantUnit;
use App\Models\LoadCategory;
use App\Models\Unit;
use App\Models\UnitModel;
use App\Models\Transaction;
use App\Models\UnitPremi;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supports = Support::with('project')->get();
        return view('support/index', compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::orderBy('name_employee','asc')->get();
        $project = Project::orderBy('name_project','asc')->get();
        $prod_parameter = ProdParameter::orderBy('parameter_date','asc')->get();
        $plantUnits = PlantUnit::with('load_category', 'unit')->latest()->get();
        $unitPremis = UnitPremi::with('unit')->latest()->get();
        $units = Unit::with('project', 'unit_model')->orderBy('unit_no','asc')->get();

        return view('support.create', compact('employee','project','prod_parameter','plantUnits','units','unitPremis'));

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
            'date_support' => 'required',
            'parameter_date' => 'required',
            'project' => 'required',
            'plan_fuel_factor' => 'required',
            'cum_prod_ob' => 'required',
            'cum_prod_coal' => 'required',
            'cum_fuel' => 'required',
            'join_survey' => 'required',
            'nik' => 'required',
            'name_employee' => 'required',
            'job_type' => 'required',
            'shift' => 'required',
            'no_unit_1' => 'required',
            'no_unit_2' => 'required',
            'unit_no' => 'required',
            'dump_distance' => 'required',
            'capacity' => 'required',
            'unit_no_2' => 'required',
            'premi' => 'required',
            'working_hours' => 'required',
            'insiden' => 'required',
            'off_to_work' => 'required',
            'ffact' => 'required',
            'achff' => 'required',
            'ffpr' => 'required',
            'premi_op_support' => 'required',
        ]);

        Support::create([
             'date_support' => $request->date_support,
             'parameter_date' => $request->parameter_date,
             'project' => $request->project,
             'plan_fuel_factor' => $request->plan_fuel_factor,
             'cum_prod_ob' => $request->cum_prod_ob,
             'cum_prod_coal' => $request->cum_prod_coal,
             'cum_fuel' => $request->cum_fuel,
             'join_survey' => $request->join_survey,
             'nik' => $request->nik,
             'name_employee' => $request->name_employee,
             'job_type' => $request->job_type,
             'shift' => $request->shift,
             'no_unit_1' => $request->no_unit_1,
             'no_unit_2' => $request->no_unit_2,
             'unit_no' => $request->unit_no,
             'dump_distance' => $request->dump_distance,
             'capacity' => $request->capacity,
             'unit_no_2' => $request->unit_no_2,
             'premi' => $request->premi,
             'working_hours' => $request->working_hours,
             'insiden' => $request->insiden,
             'off_to_work' => $request->off_to_work,
             'ffact' => $request->ffact,
             'achff' => $request->achff,
             'ffpr' => $request->ffpr,
             'premi_op_support' => $request->premi_op_support,

         ]);
         return redirect('supports')->with('status', 'premi operator support added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        //
    }


}
