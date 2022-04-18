<?php

namespace App\Http\Controllers;

use App\Models\PlantUnit;
use App\Models\LoadCategory;
use App\Models\Unit;
use Illuminate\Http\Request;


class PlantUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantUnits = PlantUnit::with('load_category', 'unit')->latest()->get();
        return view('plant_unit.index', compact('plantUnits'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loadCategory = LoadCategory::all();
        $unit = Unit::with('project', 'unit_model')->orderBy('unit_no','asc')->get();
        return view('plant_unit.add', compact( 'loadCategory','unit'));
    
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
            'load_category_id' => 'required',
            'unit_id' => 'required',
            'dump_distance' => 'required',
            'capacity' => 'required',
        ],[
            'load_category_id.require' => 'Load Category is required',
            'unit_id.require' => 'Unit No is required',
        ]);

        PlantUnit::create($request->all());

        return redirect('plant_units')->with('status', 'Plant Unit added successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlantUnit  $plantUnit
     * @return \Illuminate\Http\Response
     */
    public function show(PlantUnit $plantUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlantUnit  $plantUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantUnit $plantUnit)
    {
       
        $loadCategory = LoadCategory::all();
        $unit = Unit::with('project', 'unit_model')->orderBy('unit_no','asc')->get();
        return view('plant_unit.edit', compact('plantUnit','loadCategory','unit'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlantUnit  $plantUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlantUnit $plantUnit)
    {
        $request->validate([
            'load_category_id' => 'required',
            'unit_id' => 'required',
            'dump_distance' => 'required',
            'capacity' => 'required',
        ],[
            'load_category_id.require' => 'Load Category is required',
            'unit_id.require' => 'Unit No is required',
        ]);

        PlantUnit::where('id', $plantUnit->id)->update([
            'load_category_id' => $request->load_category_id,
            'unit_id' => $request->unit_id,
            'dump_distance' => $request->dump_distance,
            'capacity' => $request->capacity
        ]);

        return redirect('plant_units')->with('status', 'Plant Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlantUnit  $plantUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantUnit $plantUnit)
    {
        $plantUnit->delete();

        return redirect('plant_units')->with('status', 'Plant Unit deleted successfully');
    }

}
