<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Project;
use App\Models\Employee;
use App\Models\ProdParameter;
use App\Models\PlantUnit;
use App\Models\LoadCategory;
use App\Models\Unit;
use App\Models\UnitModel;
use App\Models\UnitPremi;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $production = Production::with('project')->get();
        return view('production/index', compact('production'));
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
    
        
        //return $dataTable->render('transaction_detail.index', compact('employee', 'project', 'prod_parameter', 'plantUnits', 'units'));
        return view('production.create', compact('employee','project','prod_parameter','plantUnits','units','unitPremis'));
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
            'date_production' => 'required',
            'parameter_date' => 'required',
            'project' => 'required',
            'plan_fuel_factor' => 'required',
            'cum_prod_ob' => 'required',
            'cum_prod_coal' => 'required',
            'cum_fuel' => 'required',
            'join_survey' => 'required',
            'ffact' => 'required',
            'nik' => 'required',
            'name_employee' => 'required',
            'job_type' => 'required',
            'unit_satu_id' => 'required',
            'unit_dua_id' => 'required',
            'insiden' => 'required',
            'achindiv' => 'required',
            'unit_no' => 'required',
            'dump_distance' => 'required',
            'capacity' => 'required',
            'unit_no2' => 'required',
            'premi' => 'required',
            'daily_production' => 'required',
            'hours_production' => 'required',
            'hours_total' => 'required',
            'off_to_work' => 'required',
            'shift' => 'required',
            'prodakt' => 'required',
            'achff' => 'required',
            'ffpr' => 'required',
            'fpi' => 'required',
            'fpremi' => 'required',
            'pakt' => 'required',
            'premiopr' => 'required',
            'sumpremi' => 'required',
        ]);

        Production::create([
             'date_production' => $request->date_production,
             'parameter_date' => $request->parameter_date,
             'project' => $request->project,
             'plan_fuel_factor' => $request->plan_fuel_factor,
             'cum_prod_ob' => $request->cum_prod_ob,
             'cum_prod_coal' => $request->cum_prod_coal,
             'cum_fuel' => $request->cum_fuel,
             'join_survey' => $request->join_survey,
             'ffact' => $request->ffact,
             'nik' => $request->nik,
             'name_employee' => $request->name_employee,
             'job_type' => $request->job_type,
             'unit_satu_id' => $request->unit_satu_id,
             'unit_dua_id' => $request->unit_dua_id,
             'insiden' => $request->insiden,
             'achindiv' => $request->achindiv,
             'unit_no' => $request->unit_no,
             'dump_distance' => $request->dump_distance,
             'capacity' => $request->capacity,
             'unit_no2' => $request->unit_no2,
             'premi' => $request->premi,
             'daily_production' => $request->daily_production ,
             'hours_production' => $request->hours_production,
             'hours_total' => $request->hours_total,
             'off_to_work' => $request->off_to_work,
             'shift' => $request->shift,
             'prodakt' => $request->prodakt,
             'achff' => $request->achff,
             'ffpr' => $request->ffpr,
             'fpi' => $request->fpi,
             'fpremi' => $request->fpremi,
             'pakt' => $request->pakt,
             'premiopr' => $request->premiopr,
             'sumpremi' => $request->sumpremi,

         ]);
         return redirect('productions')->with('status', 'premi operator production added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production)
    {
        //
    }
}
