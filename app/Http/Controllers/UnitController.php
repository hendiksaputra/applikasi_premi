<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitModel;
use App\Models\Project;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $units = Unit::with('project', 'unit_model')->orderBy('unit_no','asc')->get();
        return view('unit.index', compact('units'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $unitModels = UnitModel::orderBy('model_no','asc')->get();
        $projects = Project::orderBy('code_project','asc')->get();
        return view('unit.add', compact('unitModels', 'projects'));
    
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
            'unit_no' => 'required|unique:units',
            'unit_desc' => 'required',
            'unit_model_id' => 'required',
            'project_id' => 'required',
        ], [
            'unit_no.required' => 'Unit Number is required',
            'unit_desc.required' => 'Unit Description is required',
            'unit_model_id.required' => 'Unit Model is required',
            'project_id.required' => 'Project is required'
        ]);
        
        // cara insert 3 : Quick Mass Assignment, dengan syarat field table di database dan name input di view harus sama
        Unit::create($request->all()); 

        return redirect('units')->with('status', 'Unit added successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $unitModels = UnitModel::orderBy('model_no','asc')->get();
        $projects = Project::orderBy('code_project','asc')->get();
        return view('unit.edit', compact('unitModels', 'projects','unit'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'unit_no' => 'required',
            'unit_desc' => 'required',
            'unit_model_id' => 'required',
            'project_id' => 'required',
        ], [
            'unit_no.required' => 'Unit Number is required',
            'unit_desc.required' => 'Unit Description is required',
            'unit_model_id.required' => 'Unit Model is required',
            'project_id.required' => 'Project is required'
        ]);

        //cara update 2 : Mass Assignment
        Unit::where('id', $unit->id)->update([
            'unit_no' => $request->unit_no,
            'unit_desc' => $request->unit_desc,
            'unit_model_id' => $request->unit_model_id,
            'project_id' => $request->project_id
        ]);

        return redirect('units')->with('status', 'Unit updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect('units')->with('status', 'Unit deleted successfully');
    
    }
}
