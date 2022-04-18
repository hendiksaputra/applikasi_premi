@extends('layouts.master')

@section('title')
    Transaction Daily Premi Operator Support
@endsection



@section('breadcrumb')
    @parent
    <li class="active">Transaction Premi Operator Support</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="box box-widget">
            <div class="box-body">
                <form action="{{ url('supports') }}" method="post">
                @csrf
                <table width="100%">
                    <tr>
                        <td style="vertival-align:top">
                            <label for="date_support">Date</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="date" id="date_support" name="date_support" value="<?=date('Y-m-d') ?>" class="form-control @error('date_support') is-invalid @enderror"
                                value="{{ old('date_support') }}">
                                    @error('date_support')
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
                                value="{{ old('parameter_date') }}" autofocus readonly> 
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
                                <input type="text" id="cum_fuel" name="cum_fuel" name="cum_fuel" class="form-control @error('cum_fuel') is-invalid @enderror"
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
                    {{-- <tr>
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
                    </tr> --}}
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
                    <label for="nik">NIK</label>
                    </td>
                    <td>
                        <div class="form-group input-group">
                            <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror"
                            value="{{ old('nik') }}" autofocus readonly> 
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
                            <input type="text" id="job_type" name="job_type" placeholder="Support" class="form-control @error('job_type') is-invalid @enderror"
                            value="Support" readonly>
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
                        <label for="no_unit_1">Unit Type 1</label>
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <input type="text" id="no_unit_1" name="no_unit_1" class="form-control @error('no_unit_1') is-invalid @enderror"
                                value="{{ old('no_unit_1') }}" autofocus readonly> 
                                <span class="input-group-btn">
                                    <button onclick="tampilUnit1()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                                </span>               
                            </div>
                            @error('no_unit_1')
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
                        <label for="no_unit_2">Unit Type 2</label>
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <input type="text" id="no_unit_2" name="no_unit_2" class="form-control @error('no_unit_2') is-invalid @enderror"
                                value="{{ old('no_unit_2') }}" autofocus readonly> 
                                <span class="input-group-btn">
                                    <button onclick="tampilUnit2()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                                </span>               
                            </div>
                            @error('no_unit_2')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    
                   
                </table>
        </div>
        </div>
        </div>
        

        {{-- <div class="col-lg-14">
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
        </div> --}}
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
                            value="{{ old('unit_no') }}" autofocus readonly> 
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
                    <label for="unit_no_2">Unit Premi</label>
                    </td>
                    <td>
                        <div class="form-group input-group">
                            <input type="text" id="unit_no_2" name="unit_no_2" class="form-control @error('unit_no_2') is-invalid @enderror"
                            value="{{ old('unit_no_2') }}" autofocus readonly> 
                            <span class="input-group-btn">
                                <button onclick="tampilUnit3()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                            </span>               
                        </div>
                        @error('unit_no_2')
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
                        <label for="working_hours">Working Hours</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="working_hours" name="working_hours" onkeyup="sum();" class="form-control @error('working_hours') is-invalid @enderror">
                        </div>
                        @error('working_hours')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                
                <tr>
                    <td style="vertival-align:top">
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
            {{-- <div align="right">
                <h4>Invoice <b><span id="invoice"></span></b></h4>
                <h1><b><span id="grand_total2" style="font-size:50pt">0</span></b></h1>
            </div> --}}
            </table>
        </div>

        <div class="col-lg-14">
            <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align:top; width:30%">
                        <label for="off_to_work">Off To Work</label>
                        </td>
                        <td>
                            <div>
                               <select name="off_to_work" id="off_to_work" class="form-control @error('off_to_work') is-invalid @enderror"
                               value="{{ old('off_to_work') }}">
                               <option value="">Select</option>
                                <option value="1">Late</option>
                                <option value="0">Not Late</option>    
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
</div>



</div>
<div class="row"> 
    <div class="col-lg-3">
        <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                   
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="ffact">FFAct</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="ffact" onkeyup="sum();" name="ffact" style="text-align:right" class="form-control" readonly>
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
                            <label for="premi_op_support">Premi OP Support</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="premi_op_support" onkeyup="sum();" name="premi_op_support" style="text-align:right" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                    
                </table>
            </div>
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

@includeIf('support.parameter')
@includeIf('support.employee')
@includeIf('support.unit1')
@includeIf('support.unit2')
@includeIf('support.unit')
@includeIf('support.unit3')


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

    function pilihEmployee(id, nik, name) {
        $('#id').val(id);
        $('#nik').val(nik);
        $('#name_employee').val(name);  
        hideEmployee();
    }

    function hideEmployee() {
        $('#modal-employee').modal('hide');
    }


    function tampilUnit1() {
        $('#modal-unit1').modal('show');
    }

    function pilihUnit1(id, unit1) {
        $('#id').val(id);
        $('#no_unit_1').val(unit1);
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
        $('#no_unit_2').val(unit2);
        hideUnit2();
    }

    function hideUnit2() {
        $('#modal-unit2').modal('hide');
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

    function tampilUnit3() {
        $('#modal-unit3').modal('show');
    }

    function pilihUnit3(id, unit, premi) {
        $('#id').val(id);
        $('#unit_no_2').val(unit);
        $('#premi').val(premi);

        sum_global();

        hideUnit3();
    }

    function hideUnit3() {
        $('#modal-unit3').modal('hide');
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
                    ffpr = 1.15;
                }
                else if(achff >= 1)
                {
                    ffpr = 1;
                }
                else if(achff >= 1.05)
                {
                    ffpr = 0.85;
                }
                else
                {
                    ffpr = 0.65;
                }

                $('#ffpr').val(ffpr);

                // var working_hours = document.getElementById('working_hours').value;
                // var premi = document.getElementById('premi').value;
                // var ffpr = document.getElementById('ffpr').value;


                // var premi_op_support = parseFloat(working_hours) * parseFloat(premi) * parseFloat(ffpr);
                // var premi_op_support1 = premi_op_support.toFixed(3);
                // if(!isNaN(premi_op_support)) {
                //     document.getElementById('premi_op_support').value = premi_op_support;
                // }
                // else {
                //     document.getElementById('premi_op_support').value = 0;
                // }        
    }

    function sum()
    {
        var working_hours = document.getElementById('working_hours').value;
        var premi = document.getElementById('premi').value;
        var ffpr = document.getElementById('ffpr').value;

        var result = parseFloat(working_hours) * parseFloat(premi) * parseFloat(ffpr);
       
     
       if (!isNaN(result)) {
          
           document.getElementById('premi_op_support').value = result;

           sum_global();
               
             
       } 


    }



</script>

@endpush
