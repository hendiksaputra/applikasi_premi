@extends('layouts.master')

@section('title')
    Form Edit Production Parameter
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Edit Data Production Parameter</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('prod_parameters') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('prod_parameters/'.$prodParameter->id) }}" method="post">
            @method('PUT')    
            @csrf
            <div class="form-group  col-md-6">
                <label for="project_id" >Project</label>
                <select name="project_id" class="form-control @error('project_id') is-invalid @enderror">
                    <option value="">- Select -</option>
                    @foreach ($projects as $item)
                        <option value="{{ $item->id }}" {{ old('project_id', $prodParameter->project_id ) == $item->id ? 'selected' : null }}>{{ $item->name_project }}</option> 
                    @endforeach     
                </select>
                @error('project_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div> 
        <div class="form-group  col-md-6">
          <label for="parameter_date" >Month/Years</label>
          <input type="month" name="parameter_date" value="{{ old('parameter_date', $prodParameter->parameter_date) }}" class="form-control @error('parameter_date') is-invalid @enderror" autofocus>
            @error('parameter_date')
               <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group  col-md-6">
          <label for="plan_fuel_factor" >Plan Fuel Factor</label>
          <input type="text" name="plan_fuel_factor" value="{{ old('plan_fuel_factor', $prodParameter->plan_fuel_factor) }}" class="form-control @error('plan_fuel_factor') is-invalid @enderror" autofocus>
            @error('plan_fuel_factor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> 
        <div class="form-group  col-md-6">
            <label for="cum_prod_ob" >Cum Production OB</label>
            <input type="text" name="cum_prod_ob" value="{{ old('cum_prod_ob', $prodParameter->cum_prod_ob) }}" class="form-control @error('cum_prod_ob') is-invalid @enderror" autofocus>
            @error('cum_prod_ob')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div> 
          <div class="form-group  col-md-6">
            <label for="cum_prod_coal" >Cum Production Coal</label>
            <input type="text" name="cum_prod_coal" value="{{ old('cum_prod_coal', $prodParameter->cum_prod_coal) }}" class="form-control @error('cum_prod_coal') is-invalid @enderror" autofocus>
            @error('cum_prod_coal')
                <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div> 
          <div class="form-group  col-md-6">
            <label for="cum_fuel" >Cum Fuel</label>
            <input type="text" name="cum_fuel" value="{{ old('cum_fuel', $prodParameter->cum_fuel) }}" class="form-control @error('cum_fuel') is-invalid @enderror" autofocus>
            @error('cum_fuel')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
         </div>
         <div class="form-group  col-md-6">
            <label for="join_survey" >Join Survey</label>
            <input type="text" name="join_survey" value="{{ old('join_survey', $prodParameter->join_survey) }}" class="form-control @error('join_survey') is-invalid @enderror" autofocus>
            @error('join_survey')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
         </div>
                                                            
      </div>

      <div class="box-footer">
        <button type="reset"  class="btn btn-default">Cancel</button>
        <button type=" submit" class="btn btn-success pull-right">Save</button>
      </div>
    </form>
  
  </div>
    
@endsection
