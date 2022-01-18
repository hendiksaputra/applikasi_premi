<?php

namespace App\Http\Controllers;

use App\Models\LoadCategory;
use App\Models\PlantUnit;
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
        $title = 'Plant Units';
        $subtitle = 'Plant Units Data';
        $plantUnits = PlantUnit::with('load_category', 'unit')->latest()->get();
        return view('plant_unit.index', compact('title', 'subtitle', 'plantUnits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Plant Units';
        $subtitle = 'Add Plant Units';
        $loadCategory = LoadCategory::all();
        $unit = Unit::with('project', 'unit_model')->orderBy('unit_no','asc')->get();
        return view('plant_unit.add', compact('title', 'subtitle', 'loadCategory','unit'));
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
        $title = 'Plant Units';
        $subtitle = 'Plant Units Detail';
        return view('plant_unit.show', compact('title', 'subtitle', 'plantUnit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlantUnit  $plantUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantUnit $plantUnit)
    {
        $title = 'Plant Units';
        $subtitle = 'Edit Plant Units';
        $loadCategory = LoadCategory::all();
        $unit = Unit::with('project', 'unit_model')->orderBy('unit_no','asc')->get();
        return view('plant_unit.edit', compact('title', 'subtitle', 'plantUnit','loadCategory','unit'));
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

    public function index_data()
    {
        $plantUnits = PlantUnit::latest()->get();

        return datatables()->of($plantUnits)
            ->addIndexColumn()
            ->addColumn('load_category_name', function($plantUnits){
                return $plantUnits->load_category->name;
            })
            ->addColumn('unit_no', function($plantUnits){
                return $plantUnits->unit->unit_no;
            })
            ->addColumn('dump_distance', function($plantUnits){
                return $plantUnits->dump_distance;
            })
            ->addColumn('capacity', function($plantUnits){
                return $plantUnits->capacity;
            })
            ->addColumn('action', 'plant_unit.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
