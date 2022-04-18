<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')->orderBy('code_project', 'asc')->get();
        //return view('project.index', ['projects' => $projects]);
        return view('project.index', compact('projects'));
    }

    public function add()
    {
        return view('project.add');
    }

    public function addProcess(Request $request)
    {
        $request->validate([
            'code_project' => 'required|min:1',
            'name_project' => 'required',
        ]);

        DB::table('projects')->insert([
            'code_project' => $request->code_project,
            'name_project' => $request->name_project
        ]);
        return redirect('projects')->with('status', 'Project added successfully');
    }

    public function edit($id)
    {
        $projects = DB::table('projects')->where('id', $id)->first();
        return view('project.edit', compact('projects'));
    }

    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'code_project' => 'required|min:1',
            'name_project' => 'required',
        ]);

        DB::table('projects')->where('id', $id)
        ->update([
            'code_project' => $request->code_project,
            'name_project' => $request->name_project
        ]);
        return redirect('projects')->with('status', 'Project updated successfully');
    }

    public function delete($id)
    {
        DB::table('projects')->where('id', $id)->delete();
        return redirect('projects')->with('status', 'Project deleted successfully');
    }

    public function import()
    {
        return view('project.import',
        [
            'title' => 'Projects',
            'subtitle' => 'Import Project'
        ]);
    }

    public function importProcess()
    {
        Excel::import(new ProjectImport, request()->file('file'));

        return redirect('projects')->with('status', 'Project uploaded successfully');
    }

}
