<?php

namespace App\Http\Controllers;

use App\Models\Premirekap;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Employee;
use App\Models\ProdParameter;
use App\Models\PlantUnit;
use App\Models\LoadCategory;
use App\Models\Unit;
use App\Models\UnitModel;
use App\Models\UnitPremi;
use App\Models\Production;
use App\Models\Support;
use App\Models\Attendance;
use App\Models\AttendanceCategory;
use App\Models\Warning;


class PremirekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $premirekap = Premirekap::with('project')->get();
        return view('premirekap/index', compact('premirekap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::with('project')->orderBy('nik','asc')->get();
        $project = Project::orderBy('name_project','asc')->get();
        $prod_parameter = ProdParameter::orderBy('parameter_date','asc')->get();
        $plantUnits = PlantUnit::with('load_category', 'unit')->latest()->get();
        $unitPremis = UnitPremi::with('unit')->latest()->get();
        $units = Unit::with('project', 'unit_model')->orderBy('unit_no','asc')->get();
        $attendances = Attendance::with('employee','attendance_category')->latest()->get();
        $category = AttendanceCategory::orderBy('code','asc')->get();
       // $production = Production::with('project')->get();
        $parameter_dates = Production::select('parameter_date')
       ->groupBy('parameter_date')
       ->get();

       $niks = Production::select('nik')
       ->groupBy('nik')
       ->get();

       $parameter_date = Support::select('parameter_date')
       ->groupBy('parameter_date')
       ->get();

       
       $nik = Support::select('nik')
       ->groupBy('nik')
       ->get();

       $attendances_month = Attendance::select('attendances_month')
       ->groupBy('attendances_month')
       ->get();

       $attendances_nik = Employee::with('project')
        -> select('nik')
        ->groupBy('nik')
        ->get();        
            
        
      
    
        
        //return $dataTable->render('transaction_detail.index', compact('employee', 'project', 'prod_parameter', 'plantUnits', 'units'));
        return view('premirekap.create', compact('employees','project','prod_parameter','plantUnits','units','unitPremis','parameter_dates','niks','parameter_date','nik','attendances_month','attendances','attendances_nik','category'));
    }

    // public function getData($id)
    // {
    //     $data = Production::where("nik", $id)->get();
    //     return view('premirekap.create', compact('data'));
    // }

    public function getPeriode(Request $request)
    {
        if ($request->ajax()) {
            $parameter_dates = Production::select('parameter_date')
                ->groupBy('parameter_date')
                ->get();

            return response()->json($parameter_dates);
        }
    }

    public function getNik(Request $request)
    {
        if ($request->ajax()) {

            $niks = Production::select('nik')
                ->groupBy('nik')
                ->get();

            return response()->json($niks);
        }
    }

    public function records(Request $request)
    {
        if ($request->ajax()) {

            if (request('prd') && request('nik')) {
                $productions = Production::where('parameter_date', '=', request('prd'))->where('nik', '=', request('nik'))
                    ->latest()
                    ->get();
            } else {
                $productions = Production::when(request('prd'), function ($query) {
                    $query->where('parameter_date', '=', request('prd'));
                })
                    ->when(request('nik'), function ($query) {
                        $query->where('result', '=', request('nik'));
                    })
                    ->latest()
                    ->get();
            }

            return response()->json([
                'productions' => $productions
            ]);
        } else {
            abort(403);
        }
    }
    


    //Function Support
    public function getPeriodespt(Request $request)
    {
        if ($request->ajax()) {
            $parameter_date = Support::select('parameter_date')
                ->groupBy('parameter_date')
                ->get();

            return response()->json($parameter_date);
        }
    }


    public function getNikspt(Request $request)
    {
        if ($request->ajax()) {

            $nik = Support::select('nik')
                ->groupBy('nik')
                ->get();

            return response()->json($nik);
        }
    }

    public function recordsupport(Request $request)
    {
        if ($request->ajax()) {

            if (request('spt') && request('nik')) {
                $supports = Support::where('parameter_date', '=', request('spt'))->where('nik', '=', request('nik'))
                    ->latest()
                    ->get();
            } else {
                $supports = Support::when(request('spt'), function ($query) {
                    $query->where('parameter_date', '=', request('spt'));
                })
                    ->when(request('nik'), function ($query) {
                        $query->where('result', '=', request('nik'));
                    })
                    ->latest()
                    ->get();
            }

            return response()->json([
                'supports' => $supports
            ]);
        } else {
            abort(403);
        }
    }

    //Function Atenndances
    public function getPeriodeatc(Request $request)
    {
        if ($request->ajax()) {
            $attendances_month = Attendance::select('attendances_month')
                ->groupBy('attendances_month')
                ->get();

            return response()->json($attendances_month);
        }
    }

    public function getNikatc(Request $request)
    {
        if ($request->ajax()) {

            $attendances_nik = Employee::with('project')
            -> select('nik')
            ->groupBy('nik')
            ->get();    

            return response()->json($attendances_nik);
        }
    }

    public function recordatc(Request $request)
    {
        if ($request->ajax()) {

            if (request('atc') && request('nik')) {
                $attendances = Attendance::where('attendances_month', '=', request('atc'))->where('nik', '=', request('nik'))
                ->latest()
                ->get();
            } else {
                $attendances = Attendance::when(request('atc'), function ($query) {
                    $query->where('attendances_month', '=', request('atc'));
                })
                    ->when(request('nik'), function ($query) {
                        $query->where('result', '=', request('nik'));
                    })
                    ->latest()
                    ->get();
            }

            return response()->json([
                'attendances' => $attendances
            ]);
        } else {
            abort(403);
        }
    }

     //Function Warning
     public function getPeriodewarning(Request $request)
     {
         if ($request->ajax()) {
             $warning_month = Warning::select('warning_month')
                 ->groupBy('warning_month')
                 ->get();
 
             return response()->json($warning_month);
         }
     }

     public function getNikwarning(Request $request)
     {
         if ($request->ajax()) {
 
             $warning_nik = Warning::select('nik')
             ->groupBy('nik')
             ->get();    
 
             return response()->json($warning_nik);
         }
     }

     public function recordwarning(Request $request)
    {
        if ($request->ajax()) {

            if (request('wrn') && request('nik')) {
                $warnings = Warning::where('warning_month', '=', request('wrn'))->where('nik', '=', request('nik'))
                ->latest()
                ->get();
            } else {
                $warnings = Warning::when(request('wrn'), function ($query) {
                    $query->where('warning_month', '=', request('wrn'));
                })
                    ->when(request('nik'), function ($query) {
                        $query->where('result', '=', request('nik'));
                    })
                    ->latest()
                    ->get();
            }

            return response()->json([
                'warnings' => $warnings
            ]);
        } else {
            abort(403);
        }
    }
 




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Premirekap  $premirekap
     * @return \Illuminate\Http\Response
     */
    public function show(Premirekap $premirekap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Premirekap  $premirekap
     * @return \Illuminate\Http\Response
     */
    public function edit(Premirekap $premirekap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Premirekap  $premirekap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Premirekap $premirekap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Premirekap  $premirekap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Premirekap $premirekap)
    {
        //
    }
}
