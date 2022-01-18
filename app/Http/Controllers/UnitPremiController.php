<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitPremi;
use Illuminate\Http\Request;

class UnitPremiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Unit Premis';
        $subtitle = 'Unit Premis Data';
        $unitPremis = UnitPremi::with('unit')->latest()->get();

        return view('unit_premi.index', compact('title', 'subtitle', 'unitPremis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Unit Premis';
        $subtitle = 'Add Unit Premi';
        $unit = Unit::with('unit_model','project')->orderBy('unit_no','asc')->get();
        return view('unit_premi.add', compact('title','subtitle','unit'));
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
            'unit_id' => 'required',
            'premi' => 'required'
        ], [
            'unit_id.required' => 'Unit Number is required',
            'premi.required' => 'Unit Premi is required'
        ]);
        
        // cara insert 3 : Quick Mass Assignment, dengan syarat field table di database dan name input di view harus sama
        UnitPremi::create($request->all()); 

        return redirect('unit_premis')->with('status', 'Unit Premi added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitPremi  $unitPremi
     * @return \Illuminate\Http\Response
     */
    public function show(UnitPremi $unitPremi)
    {
        $title = 'Unit Premis';
        $subtitle = 'Unit Premi Detail';
        // $unitPremi = UnitPremi::with('unit')->get();
        return view('unit_premi.show', compact('title','subtitle','unitPremi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitPremi  $unitPremi
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitPremi $unitPremi)
    {
        $title = 'Unit Premis';
        $subtitle = 'Edit Unit Premi';
        $unit = Unit::with('unit_model','project')->orderBy('unit_no','asc')->get();
        return view('unit_premi.edit', compact('title','subtitle','unit','unitPremi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitPremi  $unitPremi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitPremi $unitPremi)
    {
        $request->validate([
            'unit_id' => 'required',
            'premi' => 'required'
        ], [
            'unit_id.required' => 'Unit Number is required',
            'premi.required' => 'Unit Premi is required'
        ]);

        //cara update 2 : Mass Assignment
        UnitPremi::where('id', $unitPremi->id)->update([
            'unit_id' => $request->unit_id,
            'premi' => $request->premi
        ]);

        return redirect('unit_premis')->with('status', 'Unit Premi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitPremi  $unitPremi
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitPremi $unitPremi)
    {
        $unitPremi->delete();

        return redirect('unit_premis')->with('status', 'Unit Premi deleted successfully');
    }

    public function index_data()
    {
        $unitPremis = UnitPremi::latest()->get();

        return datatables()->of($unitPremis)
            ->addIndexColumn()
            ->addColumn('unit_no', function($unitPremis){
                return $unitPremis->unit->unit_no;
            })
            ->addColumn('code', function($unitPremis){
                return $unitPremis->unit->project->code;
            })
            ->addColumn('premi', function($unitPremis){
                return $unitPremis->premi;
            })
            ->addColumn('action', 'unit_premi.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
