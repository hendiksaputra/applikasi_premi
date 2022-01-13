<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $title = 'Project';
        $subtitle = 'Project Data';
        $projects = DB::table('projects')->orderBy('code', 'asc')->get();
        //return view('project.index', ['projects' => $projects]);
        return view('project.index', compact('title','subtitle','projects'));
    }

    public function add()
    {
        $title = 'Project';
        $subtitle = 'Add Project';
        return view('project.add', compact('title','subtitle'));
    }

    public function addProcess(Request $request)
    {
        $request->validate([
            'code' => 'required|min:1',
            'name' => 'required',
        ]);

        DB::table('projects')->insert([
            'code' => $request->code,
            'name' => $request->name
        ]);
        return redirect('projects')->with('status', 'Project added successfully');
    }

    public function edit($id)
    {
        $title = 'Project';
        $subtitle = 'Edit Project';
        $project = DB::table('projects')->where('id', $id)->first();
        return view('project/edit', compact('title','subtitle','project'));
    }

    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|min:1',
            'name' => 'required',
        ]);

        DB::table('projects')->where('id', $id)
        ->update([
            'code' => $request->code,
            'name' => $request->name
        ]);
        return redirect('projects')->with('status', 'Project updated successfully');
    }

    public function delete($id)
    {
        DB::table('projects')->where('id', $id)->delete();
        return redirect('projects')->with('status', 'Project deleted successfully');
    }
    
}
