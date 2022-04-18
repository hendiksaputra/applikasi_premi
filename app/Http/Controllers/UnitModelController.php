<?php

namespace App\Http\Controllers;

use App\Models\UnitModel;
use Illuminate\Http\Request;

class UnitModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitModels = UnitModel::all();
        return view('unit_model.index', [  'unitModels' => $unitModels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit_model.add');
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
            'model_no' => 'required|unique:unit_models,model_no'
        ]);
        
        UnitModel::create($request->all());

        return redirect('unit_models')->with('status', 'Unit models added successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitModel  $unitModel
     * @return \Illuminate\Http\Response
     */
    public function show(UnitModel $unitModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitModel  $unitModel
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitModel $unitModel)
    {
        return view('unit_model.edit', ['unitModel' => $unitModel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitModel  $unitModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitModel $unitModel)
    {
        if ($request->model_no != $unitModel->model_no) {
            $rules['model_no'] = 'required|unique:unit_models';
        }
        
        $validatedData = $request->validate($rules);
        
        UnitModel::where('id', $unitModel->id)->update($validatedData);

        return redirect('unit_models')->with('status', 'Unit models updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitModel  $unitModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitModel $unitModel)
    {
        $unitModel->delete();

        return redirect('unit_models')->with('status', 'Unit models deleted successfully');
    
    }
}
