<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Users';
        $subtitle = 'Users Data';
        // $users = DB::table('users')
        //             ->join('projects','users.project_id','=','projects.id')
        //             ->select('users.id', 'users.name', 'email', 'code')
        //             ->orderBy('users.name', 'asc')
        //             ->get();
        $users = User::orderBy('name','asc')->get();

        return view('user.index', compact('title','subtitle','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Users';
        $subtitle = 'Add Users';
        $projects = Project::orderBy('code', 'asc')->get();
        $roles = DB::table('roles')
                    ->select('id','name')
                    ->orderBy('name', 'asc')
                    ->get();
        
        return view('user.add', compact('title','subtitle','projects','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:dns|unique:users|ends_with:@arka.co.id',
            'password' => 'required|min:5',
            'project_id' => 'required',
            'roles' => 'required',
        ],[
            'name.required' => 'Full Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'project_id.required' => 'Project is required',
            'roles.required' => 'Role is required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        
        return redirect('users')->with('success', 'User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Users';
        $subtitle = 'Users Detail';
        // $user = DB::table('users')
        //             ->join('projects','users.project_id','=','projects.id')
        //             ->select('users.id as id', 'users.name as name', 'email', 'code','users.created_at as created_at')
        //             ->where('users.id', $id)
        //             ->orderBy('users.name', 'asc')
        //             ->first();
        $user = User::find($id);
        // dd($user);
        return view('user.show', compact('title','subtitle','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Users';
        $subtitle = 'Edit Users';
        // $user = DB::table('users')
        //             ->join('projects','users.project_id','=','projects.id')
        //             ->select('users.id as id', 'users.name as name', 'email', 'password', 'projects.id as project_id', 'code','users.created_at as created_at')
        //             ->where('users.id', $id)
        //             ->orderBy('users.name', 'asc')
        //             ->first();
        $user = User::find($id);
        $roles = DB::table('roles')
                    ->select('id','name')
                    ->orderBy('name', 'asc')
                    ->get();
        $userRole = $user->roles->pluck('id','id')->first();
        $projects = Project::orderBy('code', 'asc')->get();
        
        return view('user.edit', compact('title','subtitle','user','projects','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'project_id' => 'required',
            'roles' => 'required'
        ],[
            'name.required' => 'Full Name is required',
            'email.required' => 'Email is required',
            'project_id.required' => 'Project is required',
            'roles.required' => 'Role is required'
        ]);
        
        $input = $request->all();
        $user = User::find($id);

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users|ends_with:@arka.co.id';
        }

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }

        // User::where('id',$user->id)->update($input);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
        
        return redirect('users')->with('success', 'User edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        DB::table('users')->where('id', $id)->delete();
        return redirect('users')->with('status', 'User deleted successfully');
    }
}
