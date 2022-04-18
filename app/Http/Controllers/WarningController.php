<?php

namespace App\Http\Controllers;

use App\Models\Warning;
use App\Models\WarningCategory;
use App\Models\Employee;
use Illuminate\Http\Request;

class WarningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // cara menampilkan semua data sesuai urutan di table yang tidak dihapus
        // $warnings = Warning::all();

        // cara menampilkan semua data dengan urutan tertentu
        // $warnings = Warning::with('employee.project')->orderBy('id','desc')->paginate(5)->withQueryString();
        $warnings = Warning::with('employee.project')->latest()->get();
        
        // cara menampilkan semua data termasuk yang soft deleted
        // $warnings = Warning::withTrashed()->with('employee.project')->orderBy('id','desc')->get();

        // return $warnings;
        return view('warning.index', compact('warnings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::with('project')->orderBy('nik','asc')->get();
        $warning_categories = WarningCategory::orderBy('warning_name','asc')->get();
        return view('warning.add', compact('employees', 'warning_categories'));
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
            'nik' => 'required',
            'name_employee' => 'required',
            'warning_value' => 'required',
            'warning_month' => 'required',
            'warning_date' => 'required',
        ], [
            'nik.required' => 'NIK is required',
            'name_employee.required' => 'Name Employee is required',
            'warning_value.required' => 'Warning  is required',
            'warning_month.required' => 'Warning Month is required',
            'warning_date.required' => 'Warning Date is required'
        ]);
        // return $request;
        
        // cara insert 1 : Eloquent ORM
        // $warning = new Warning;
        // $warning->employee_id = $request->employee_id;
        // $warning->warning_category_id = $request->warning_category_id;
        // $warning->warning_date = $request->warning_date;
        // $warning->save();

        //cara insert 2 : Mass Assignment
        // Warning::create([
        //     'employee_id' => $request->employee_id,
        //     'warning_category_id' => $request->warning_category_id,
        //     'warning_date' => $request->warning_date,
        // ]);

        // cara insert 3 : Quick Mass Assignment, dengan syarat field table di database dan name input di view harus sama
        Warning::create($request->all()); 

        // cara insert 4 : gabungan Eloquent ORM dan Mass Assignment, tujuannya untuk memisahkan antara data2 yang sifatnya umum dengan Mass Assignment dan yang sifatnya khusus dengan Eloquent ORM. Data2 yang khusus biasanya di $guarded model, tidak bisa diinsert menggunakan Mass Assignment, sehingga diinput menggunakan Eloquent ORM
        // Warning::create([
        //     'employee_id' => $request->employee_id,
        //     'warning_category_id' => $request->warning_category_id,
        //     'warning_date' => $request->warning_date,
        // ]); -- data umum
        // $warning->warning_date = $request->warning_date; -- data khusus yang di $guarded di model

        return redirect('warnings')->with('status', 'Warning added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function show(Warning $warning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function edit(Warning $warning)
    { 
        $employees = Employee::with('project')->orderBy('nik','asc')->get();
        $warning_categories = WarningCategory::orderBy('warning_name','asc')->get();
        return view('warning.edit', compact('warning', 'employees', 'warning_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warning $warning)
    {
        $request->validate([
            'nik' => 'required',
            'name_employee' => 'required',
            'warning_value' => 'required',
            'warning_month' => 'required',
            'warning_date' => 'required',
        ], [
            'nik.required' => 'NIK is required',
            'name_employee.required' => 'Name Employee is required',
            'warning_value.required' => 'Warning  is required',
            'warning_month.required' => 'Warning Month is required',
            'warning_date.required' => 'Warning Date is required'
        ]);
        // return $warning;
        // cara update 1 : Eloquent ORM
        // $warning = new Warning;
        // $warning->employee_id = $request->employee_id;
        // $warning->warning_category_id = $request->warning_category_id;
        // $warning->warning_date = $request->warning_date;
        // $warning->save();

        //cara update 2 : Mass Assignment
        Warning::where('id', $warning->id)->update([
            'nik' => $request->nik,
            'name_employee' => $request->name_employee,
            'warning_value' => $request->warning_value,
            'warning_month' => $request->warning_month,
            'warning_date' => $request->warning_date,
        ]);

        return redirect('warnings')->with('status', 'Warning updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warning $warning)
    {
        $warning->delete();

        // cara 2
        // Warning::destroy($warning->id);

        // cara 3
        // Warning::where('id', $warning->id)->delete();

        return redirect('warnings')->with('status', 'Warning deleted successfully');
    }
}
