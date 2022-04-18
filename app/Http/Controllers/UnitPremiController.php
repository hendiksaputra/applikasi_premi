<?php

namespace App\Http\Controllers;

use App\Models\UnitPremi;
use App\Models\Unit;
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
        $unitPremis = UnitPremi::with('unit')->latest()->get();

        return view('unit_premi.index', compact( 'unitPremis'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::with('unit_model','project')->orderBy('unit_no','asc')->get();
        return view('unit_premi.add', compact('unit'));
    
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitPremi  $unitPremi
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitPremi $unitPremi)
    {
       
        $unit = Unit::with('unit_model','project')->orderBy('unit_no','asc')->get();
        return view('unit_premi.edit', compact('unit','unitPremi'));
    
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
}
