<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $title = 'Register';
        $projects = Project::orderBy('code', 'asc')->get();
        return view('register', compact('title','projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users|ends_with:@arka.co.id',
            'password' => 'required|min:5',
            'project_id' => 'required',
        ],[
            'name.required' => 'Full Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'project_id.required' => 'Project is required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $data = User::create($validatedData);
        $data->assignRole('operator');

        return redirect('login')->with('success', 'Registration successfull! Please login.');
    }
}
