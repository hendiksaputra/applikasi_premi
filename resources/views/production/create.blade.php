@extends('layouts.master')

@section('title')
    Transaction Daily Premi Operator Produksi
@endsection

@push('css')

@endpush

@section('breadcrumb')
    @parent
    <li class="active">Transaction Premi Operator Produksi</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="box box-widget">
            <div class="box-body">
                <form action="{{ url('productions') }}" method="post">
                @csrf
                <table width="100%">
                    <tr>
                        <td style="vertival-align:top">
                            <label for="date_production">Date</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="date_production" id="date" name="date_production" value="<?=date('Y-m-d') ?>" class="form-control @error('date_production') is-invalid @enderror"
                                value="{{ old('date_production') }}">
                                    @error('date_production')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top; width:30%">
                        <label for="parameter_date">Month/Years</label>
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <input type="text" id="parameter_date" name="parameter_date" class="form-control" 
                                class="form-control @error('parameter_date') is-invalid @enderror"
                                value="{{ old('parameter_date') }}" autofocus> 
                                <span class="input-group-btn">
                                    <button onclick="tampilParameter()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                                </span>
                                           
                            </div>
                            @error('parameter_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror   
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="vertival-align:top">
                            <label for="project">Project</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="project" name="project" class="form-control @error('project') is-invalid @enderror"
                                value="{{ old('project') }}" readonly>
                            </div>
                            @error('project')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>
                    </tr>
                    <tr>
                        <td style="vertival-align:top">
                            <label for="plan_fuel_factor">Plan Fuel Factor</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="plan_fuel_factor" name="plan_fuel_factor"  class="form-control @error('plan_fuel_factor') is-invalid @enderror"
                                value="{{ old('plan_fuel_factor') }}" readonly>
                            </div>
                            @error('plan_fuel_factor')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>
                    </tr>
                    <tr>
                        <td style="vertival-align:top">
                            <label for="cum_prod_ob">Cum Prod OB</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="cum_prod_ob" name="cum_prod_ob" class="form-control @error('cum_prod_ob') is-invalid @enderror"
                                value="{{ old('cum_prod_ob') }}" readonly>
                            </div>
                            @error('cum_prod_ob')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>
                    </tr>
                    <tr>
                        <td style="vertival-align:top">
                            <label for="cum_prod_coal">Cum Prod Coal</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="cum_prod_coal" name="cum_prod_coal" class="form-control @error('cum_prod_coal') is-invalid @enderror"
                                value="{{ old('cum_prod_coal') }}" readonly>
                            </div>
                            @error('cum_prod_coal')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>
                    </tr>
                    <tr>
                        <td style="vertival-align:top">
                            <label for="cum_fuel">Cum Fuel</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="cum_fuel" name="cum_fuel" name="cum_prod_coal" class="form-control @error('cum_fuel') is-invalid @enderror"
                                value="{{ old('cum_fuel') }}" readonly>
                            </div>
                            @error('cum_fuel')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>
                    </tr>
                    <tr>
                        <td style="vertival-align:top">
                            <label for="join_survey">Join Survey</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="join_survey" name="join_survey" onkeyup="sum();" class="form-control @error('join_survey') is-invalid @enderror"
                                value="{{ old('join_survey') }}" readonly>
                            </div>
                            @error('join_survey')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>
                    </tr>
                    <tr>
                        <td style="vertival-align:top">
                            <label for="ffact">FFact</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="ffact" name="ffact" onkeyup="sum();" class="form-control @error('ffact') is-invalid @enderror"
                                value="{{ old('ffact') }}" readonly>
                            </div>
                            @error('ffact')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>
                    </tr>
             </table>
            </div>
        </div>
    </div>

<div class="col-lg-4">
    <div class="box box-widget">
        <div class="box-body">
            <table width="100%">
                <tr>
                    <td style="vertical-align:top; width:30%">
                    <label for="nik">Employee</label>
                    </td>
                    <td>
                        <div class="form-group input-group">
                            <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror"
                            value="{{ old('nik') }}" autofocus> 
                            <span class="input-group-btn">
                                <button onclick="tampilEmployee()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                            </span>
                            @error('nik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror                
                        </div>

                        
                    </td>
                </tr>
                <tr>
                        <td style="vertival-align:top">
                            <label for="name_employee">Name Employee</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="name_employee" name="name_employee" class="form-control @error('name_employee') is-invalid @enderror"
                                value="{{ old('name_employee') }}" readonly>
                            </div>
                            @error('name_employee')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>
                </tr>
                
                <tr>
                    <td style="vertival-align:top">
                        <label for="job_type">Job Type</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="job_type" name="job_type" placeholder="Produksi" class="form-control @error('job_type') is-invalid @enderror"
                            value="Produksi" readonly>
                        </div>
                    </td>
                </tr>
                
                
            </table>
        </div>
        
    </div>
    <div class="col-lg-14">
        <div class="box box-widget">
        <div class="box-body">
            <table width="100%">
                <tr>
                    <td style="vertical-align:top; width:30%">
                    <label for="unit_satu_id">Unit Type 1</label>
                    </td>
                    <td>
                        <div class="form-group input-group">
                            <input type="text" id="unit_satu_id" name="unit_satu_id" class="form-control @error('unit_satu_id') is-invalid @enderror"
                            value="{{ old('unit_satu_id') }}" autofocus> 
                            <span class="input-group-btn">
                                <button onclick="tampilUnit1()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                            </span>               
                        </div>
                        @error('unit_satu_id')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                    </td>
                </tr>
                
               
            </table>
        </div>
        </div>
        </div>
        <div class="col-lg-14">
            <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top; width:30%">
                        <label for="unit_dua_id">Unit Type 2</label>
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <input type="text" id="unit_dua_id" name="unit_dua_id" class="form-control @error('unit_dua_id') is-invalid @enderror"
                                value="{{ old('unit_dua_id') }}" autofocus> 
                                <span class="input-group-btn">
                                    <button onclick="tampilUnit2()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                                </span>               
                            </div>
                            @error('unit_dua_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    
                   
                </table>
        </div>
        </div>
        </div>
        <div class="col-lg-14">
            <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top; width:30%">
                        <label for="insiden">Insiden</label>
                        </td>
                        <td>
                            <div>
                                <select name="insiden" id="insiden" class="form-control @error('insiden') is-invalid @enderror"
                                value="{{ old('insiden') }}">
                                <option value="">Select</option>
                                 <option value="0">0</option>
                                 <option value="1">1</option>    
                                </select>
                             </div>
                             @error('insiden')
                                <div class="text-danger">{{ $message }}</div>
                             @enderror
                        </td>
                    </tr>
                    
                   
                </table>
        </div>
        </div>
        </div>

        <div class="col-lg-14">
            <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="achindiv">AchIndiv</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="achindiv" onkeyup="sum();" name="achindiv" style="text-align:right" class="form-control" readonly>
                            </div>
                        </td>
                    </tr> 
                    
                   
                </table>
        </div>
        </div>
        </div>
</div>

<div class="col-lg-4">
    <div class="box box-widget">
        <div class="box-body">
            <table width="100%">
                <tr>
                    <td style="vertical-align:top; width:30%">
                    <label for="unit_no">Master Plant Unit</label>
                    </td>
                    <td>
                        <div class="form-group input-group">
                            <input type="text" id="unit_no" name="unit_no" class="form-control @error('unit_no') is-invalid @enderror"
                            value="{{ old('unit_no') }}" autofocus> 
                            <span class="input-group-btn">
                                <button onclick="tampilUnit()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                            </span>               
                        </div>
                        @error('unit_no')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td style="vertival-align:top">
                        <label for="dump_distance">Distance</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="dump_distance" name="dump_distance" class="form-control @error('dump_distance') is-invalid @enderror"
                            value="{{ old('dump_distance') }}" readonly>
                        </div>
                        @error('dump_distance')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td style="vertival-align:top">
                        <label for="capacity">Capacity</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="capacity" name="capacity" class="form-control @error('capacity') is-invalid @enderror"
                            value="{{ old('capacity') }}" readonly>
                        </div>
                        @error('capacity')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top; width:30%">
                    <label for="unit_no2">Unit Premi</label>
                    </td>
                    <td>
                        <div class="form-group input-group">
                            <input type="text" id="unit_no2" name="unit_no2" class="form-control @error('unit_no2') is-invalid @enderror"
                            value="{{ old('unit_no2') }}" autofocus> 
                            <span class="input-group-btn">
                                <button onclick="tampilUnit3()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                            </span>               
                        </div>
                        @error('unit_no2')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td style="vertival-align:top">
                        <label for="premi">Premi</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="premi" name="premi" class="form-control @error('premi') is-invalid @enderror"
                            value="{{ old('premi') }}" readonly>
                        </div>
                        @error('premi')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                
                <tr>
                    <td style="vertival-align:top">
                        <label for="daily_production">Daily Production</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="daily_production" name="daily_production" onkeyup="sum();" class="form-control @error('daily_production') is-invalid @enderror"
                            value="">
                        </div>
                        @error('daily_production')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td style="vertival-align:top">
                        <label for="hours_production">Working Hours Production</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="hours_production" name="hours_production" onkeyup="sum();" class="form-control @error('hours_production') is-invalid @enderror"
                            value="">
                        </div>
                        @error('hours_production')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td style="vertival-align:top">
                        <label for="hours_total">Working Hours Total</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="hours_total" onkeyup="sum_global()" name="hours_total" class="form-control @error('hours_total') is-invalid @enderror"
                            value="">
                        </div>
                        @error('hours_total')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td style="vertival-align:top">
                        <label for="off_to_work">Off To Work</label>
                    </td>
                    <td>
                        <div>
                           <select name="off_to_work" id="off_to_work" class="form-control @error('off_to_work') is-invalid @enderror"
                           value="{{ old('off_to_work') }}">
                           <option value="">Select</option>
                            <option value="0">0</option>
                            <option value="1">1</option>    
                           </select>
                        </div>
                        @error('off_to_work')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
            
            </table>
        </div>
    </div>
</div>

</div>
<div class="row">
    <div class="col-lg-3">
        <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertival-align:top">
                            <label for="shift">Shift</label>
                        </td>
                        <td>
                            <div>
                               <select name="shift" id="shift" class="form-control @error('shift') is-invalid @enderror"
                               value="{{ old('shift') }}">
                               <option value="">Select</option>
                                <option value="Day">Day</option>
                                <option value="Night">Night</option>    
                               </select>
                            </div>
                            @error('shift')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>                          
                </table>
            </div>
        </div>
    </div>

   


    <div class="col-lg-3">
        <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                   
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="prodakt">ProdAkt</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="prodakt" onkeyup="sum();" name="prodakt" style="text-align:right" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align:top;">
                            <label for="achff">AchFF</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="achff" onkeyup="sum();" name="achff" style="text-align:right" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="ffpr">FFPR</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="ffpr" onkeyup="sum();" name="ffpr" style="text-align:right" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="fpi">FPI</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="fpi" onkeyup="sum();" name="fpi" style="text-align:right" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="fpremi">FPREMI</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="fpremi" onkeyup="sum();" name="fpremi" style="text-align:right" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div>
            <tr>
                <td style="vertical-align:top;">
                    <label for="pakt">PAKT</label>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" id="pakt" onkeyup="sum();" name="pakt" style="text-align:right" class="form-control" readonly>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top;">
                    <label for="premiopr">PREMIOPR</label>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" id="premiopr" onkeyup="sum();" name="premiopr" style="text-align:right" class="form-control" readonly>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top;">
                    <label for="sumpremi">SUMPREMI</label>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" id="sumpremi" onkeyup="sum();" name="sumpremi" style="text-align:right" class="form-control" readonly>
                    </div>
                </td>
            </tr>
        </div>
    </div>

    <div class="col-lg-3">
        <div>
            <button type="submit" class="btn btn-flat btn-success">
                <i class="fa fa-paper-plane-0"></i>Simpan
            </button>
            <button type="reset" class="btn btn-flat btn-warning">
                <i class="fa fa-refresh"></i>Cancel
            </button><br><br>
            
        </div>
    </div>
</form>
</div>

</div>
 --}}
@includeIf('transaction.parameter')
@includeIf('transaction.employee')
@includeIf('transaction.unit')
@includeIf('transaction.unit1')
@includeIf('transaction.unit2')
@includeIf('transaction.unit3')

@endsection

@push('scripts')
<script>

function tampilParameter() {
        $('#modal-parameter').modal('show');
    }

function pilihParameter(id, p_date, p_code_project, p_plan_fuel_factor, p_cum_prod_ob, p_cum_prod_coal, p_cum_fuel, p_join_survey) {
        $('#id').val(id);
        $('#parameter_date').val(p_date);
        $('#project').val(p_code_project);
        $('#plan_fuel_factor').val(p_plan_fuel_factor);
        $('#cum_prod_ob').val(p_cum_prod_ob);
        $('#cum_prod_coal').val(p_cum_prod_coal);
        $('#cum_fuel').val(p_cum_fuel);
        $('#join_survey').val(p_join_survey);

        var FFact = (parseFloat(p_cum_fuel) / parseFloat(p_cum_prod_ob)) + (parseFloat(p_cum_prod_coal) / 1.3) * parseFloat(p_join_survey);
        
        $('#ffact').val(FFact);
        

        sum_global();

        hideParameter();
    }
function hideParameter() {
        $('#modal-parameter').modal('hide');
    }

    

    function tampilEmployee() {
        $('#modal-employee').modal('show');
    }

    function pilihEmployee(id, name, nik) {
        $('#id').val(id);
        $('#name_employee').val(name);
        $('#nik').val(nik);
        hideEmployee();
    }

    function hideEmployee() {
        $('#modal-employee').modal('hide');
    }

    function tampilUnit() {
        $('#modal-unit').modal('show');
    }

    function pilihUnit(id, unit, dump, capa) {
        $('#id').val(id);
        $('#unit_no').val(unit);
        $('#dump_distance').val(dump);
        $('#capacity').val(capa);
        hideUnit();
    }

    function hideUnit() {
        $('#modal-unit').modal('hide');
    }
    
    function tampilUnit1() {
        $('#modal-unit1').modal('show');
    }

    function pilihUnit1(id, unit1) {
        $('#id').val(id);
        $('#unit_satu_id').val(unit1);
        hideUnit1();
    }

    function hideUnit1() {
        $('#modal-unit1').modal('hide');
    }

    function tampilUnit2() {
        $('#modal-unit2').modal('show');
    }

    function pilihUnit2(id, unit2) {
        $('#id').val(id);
        $('#unit_dua_id').val(unit2);
        hideUnit2();
    }

    function hideUnit2() {
        $('#modal-unit2').modal('hide');
    }

    function tampilUnit3() {
        $('#modal-unit3').modal('show');
    }

    function pilihUnit3(id,unit, premi) {
        $('#id').val(id);
        $('#unit_no2').val(unit);
        $('#premi').val(premi);

        sum_global();

        hideUnit3();
    }

    function hideUnit3() {
        $('#modal-unit3').modal('hide');
    }



  

    function sum(){
        var txtFirstNumberValue = document.getElementById('daily_production').value;  //ProdHaritxt
        var txtSecondNumberValue = document.getElementById('hours_production').value; //JamkerProd
        var txtThirdNumberValue = document.getElementById('join_survey').value; // Join Survey
        var txtFourthNumberValue = document.getElementById('capacity').value; // Mplan1
        var txtFifthNumberValue = document.getElementById('prodakt').value; // Mplan2

        var result = parseFloat(txtFirstNumberValue) / parseFloat(txtSecondNumberValue) * parseFloat(txtThirdNumberValue);
       
     
        if (!isNaN(result)) {
           
            document.getElementById('prodakt').value = result;

            sum_global();
                
              
        } 
    }

    function sum_global()
    {
                var ffact = document.getElementById('ffact').value;
                
                var p_plan_fuel_factor = document.getElementById('plan_fuel_factor').value;
                var achff1 = parseFloat(ffact) / parseFloat(p_plan_fuel_factor);
                var achff = achff1.toFixed(3);
                $('#achff').val(achff);

                var ffpr = 0;
                if(achff < 1)
                {
                    ffpr = 1.05;
                }
                else if(achff < 1.1)
                {
                    ffpr = 1;
                }
                else if(achff < 1.5)
                {
                    ffpr = 0.8;
                }
                else
                {
                    ffpr = 0.9;
                }

                $('#ffpr').val(ffpr);

                var prodakt = document.getElementById('prodakt').value;
                var capacity    = document.getElementById('capacity').value;

                var AchIndiv = parseFloat(prodakt) / parseFloat(capacity);

                if(!isNaN(AchIndiv))
                {
                    $('#achindiv').val(AchIndiv);
                }
                else
                {
                    $('#achindiv').val(0);
                }


                var fpi = 0;
                if(AchIndiv < 0.9)
                {
                    fpi = 0.8;
                }
                else if(AchIndiv < 1)
                {
                    fpi = 0.9;
                }
                else if(AchIndiv < 1.1)
                {
                    fpi = 1;
                }
                else
                {
                    fpi = 1.1;
                }

                $('#fpi').val(fpi);

                var fpremi = parseFloat(ffpr) * parseFloat(fpi);
                if(!isNaN(fpremi)) {
                    document.getElementById('fpremi').value = fpremi;
                }
                else {
                    document.getElementById('fpremi').value = 0;
                }
                
                var premi = document.getElementById('premi').value;
                var pakt = parseFloat(fpremi) * parseFloat(premi);
                var pakt1 = pakt.toFixed(3);

                if(!isNaN(pakt)) {
                    document.getElementById('pakt').value = pakt;
                }
                else {
                    document.getElementById('pakt').value = 0;
                }

                var hours_total = document.getElementById('hours_total').value;
                var premiopr = parseFloat(pakt) * parseFloat(hours_total);
                var premiopr1 = premiopr.toFixed(3);
                if(!isNaN(premiopr)) {
                    document.getElementById('premiopr').value = premiopr;
                }
                else {
                    document.getElementById('premiopr').value = 0;
                }

                var sumpremi = premiopr.toFixed(3);
                if(isNaN(sumpremi)) {
                    document.getElementById('sumpremi').value = 0;
                }
                else {
                    document.getElementById('sumpremi').value = sumpremi;
                }
    }
    
</script>

@endpush

