<?php

namespace App\Http\Controllers;

use App\Models\ProdParameter;
use App\Models\Project;
use Illuminate\Http\Request;

class ProdParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod_parameters = ProdParameter::with('project')->get();
        return view('prod_parameter/index', compact('prod_parameters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $projects = Project::orderBy('code_project')->get(); 
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
            'parameter_date' => 'required',
            'plan_fuel_factor' => 'required',
            'cum_prod_ob' => 'required',
            'cum_prod_coal' => 'required',
            'cum_fuel' => 'required',
            'join_survey' => 'required',
        ]);

        ProdParameter::create([
             'project_id' => $request->project_id,
             'parameter_date' => $request->parameter_date,
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
     * @param  \App\Models\ProdParameter  $prodParameter
     * @return \Illuminate\Http\Response
     */
    public function show(ProdParameter $prodParameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdParameter  $prodParameter
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdParameter $prodParameter)
    {
        $projects = Project::all(); 
        return view('prod_parameter.edit', compact('prodParameter', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdParameter  $prodParameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdParameter $prodParameter)
    {
        $request->validate([
            'project_id' => 'required',
            'parameter_date' => 'required',
            'plan_fuel_factor' => 'required',
            'cum_prod_ob' => 'required',
            'cum_prod_coal' => 'required',
            'cum_fuel' => 'required',
            'join_survey' => 'required',
        ]);

        ProdParameter::where('id', $prodParameter->id)
            ->update([
             'project_id' => $request->project_id,
             'parameter_date' => $request->parameter_date,
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
     * @param  \App\Models\ProdParameter  $prodParameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdParameter $prodParameter)
    {
        ProdParameter::destroy($prodParameter->id);

        return redirect('prod_parameters')->with('status', 'Production Parameter deleted successfully');
    }
}
