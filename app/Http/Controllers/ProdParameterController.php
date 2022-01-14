<?php

namespace App\Http\Controllers;

use App\Models\ProdParameter;
use App\Models\Project;
use Illuminate\Http\Request;

class ProdParameterController extends Controller
{
    public function index()
    {
        $prod_parameters = ProdParameter::with('project')->get();
        return view('prod_parameter/index', compact('prod_parameters'));
    }

    public function create()
    {
        $projects = Project::all(); 

        return view('prod_parameter.create', compact('projects'));
    }

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

        ProdParameter::create([
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

    public function show(ProdParameter $prod_parameter)
    {
        $prod_parameter->makeHidden(['project_id']);
        return view('prod_parameter/show', compact('prod_parameter'));
    }

    public function edit(ProdParameter $prod_parameter)
    {
        $projects = Project::all(); 
        return view('prod_parameter.edit', compact('prod_parameter', 'projects'));
    }

    public function update(Request $request, ProdParameter $prod_parameter)
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

        ProdParameter::where('id', $prod_parameter->id)
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

    public function destroy(ProdParameter $prod_parameter)
    {
        ProdParameter::destroy($prod_parameter->id);

        return redirect('prod_parameters')->with('status', 'Production Parameter deleted successfully');
    }

}
