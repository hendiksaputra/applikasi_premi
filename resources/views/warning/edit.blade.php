@extends('layouts.master')

@section('title')
    Form Edit Warning/SP
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Edit Warning/SP</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('warnings') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('warnings/' . $warning->id) }}" method="post">
            @method('patch')
            @csrf
            <div class="form-group  col-md-6">
              <label for="nik" >NIK</label>
              <input type="text" id="nik" name="nik" value="{{ old('nik', $warning->nik) }}" class="form-control @error('nik') is-invalid @enderror"
                value="{{ old('nik') }}" autofocus readonly> 
                <span class="input-group-btn">
                <button onclick="tampilEmployee()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                </span>
                @error('nik')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group  col-md-6">
                <label for="name_employee" >Employee Name</label>
                <input type="text" name="name_employee" id="name_employee" value="{{ old('name_employee', $warning->name_employee) }}" class="form-control @error('name_employee') is-invalid @enderror" autofocus readonly>
                @error('name_employee')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>  
              <div class="form-group  col-md-6">
                <label for="warning_value" >Warning</label>
                <select name="warning_value" id="warning_value" value="{{ old('warning_value', $warning->warning_value) }}" class="form-control @error('warning_value') is-invalid @enderror">
                <option value="">Select</option>
                <option value="1" {{ $warning->warning_value == '1' ? 'selected' : ''}}>1</option>
                <option value="2" {{ $warning->warning_value == '2' ? 'selected' : ''}}>2</option>
                <option value="3" {{ $warning->warning_value == '3' ? 'selected' : ''}}>3</option>
                
                   
                </select>
                  @error('attendance_value')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>   
              <div class="form-group  col-md-6">
                <label for="warning_month" >Month/Years</label>
                <input type="month" name="warning_month" value="{{ old('warning_month', $warning->warning_month) }}" class="form-control @error('warning_month') is-invalid @enderror" autofocus>
                  @error('warning_month')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group  col-md-6">
                <label for="warning_date" >Date</label>
                <input type="date" name="warning_date"
                name="warning_date" class="form-control @error('warning_date') is-invalid @enderror"
                    value="{{ old('warning_date', $warning->warning_date) }}">
                  @error('warning_date')
                      <div class="has-warning form-group">{{ $message }}</div>
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
