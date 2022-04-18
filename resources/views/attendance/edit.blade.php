@extends('layouts.master')

@section('title')
    Form Edit Attendence
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Edit Attendence</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('attendances') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('attendances/' . $attendance->id) }}" method="post">
            @method('patch')
            @csrf
            <div class="form-group  col-md-6">
              <label for="nik" >NIK</label>
              <input type="text" id="nik" name="nik" value="{{ old('nik', $attendance->nik) }}" class="form-control @error('nik') is-invalid @enderror"
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
                <input type="text" name="name_employee" id="name_employee" value="{{ old('name_employee', $attendance->name_employee) }}" class="form-control @error('name_employee') is-invalid @enderror" autofocus readonly>
                @error('name_employee')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>  
              <div class="form-group  col-md-6">
                <label for="attendances_month" >Month/Years</label>
                <input type="month" name="attendances_month" value="{{ old('attendances_month', $attendance->attendances_month) }}" class="form-control @error('attendances_month') is-invalid @enderror" autofocus>
                  @error('attendances_month')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
                <div class="form-group  col-md-6">
                  <label for="present_time" >Present Time</label>
                  <input type="datetime-local" class="form-control" name="present_time" class="form-control @error('present_time') is-invalid @enderror"
                  value="{{ old('present_time', date('Y-m-d\TH:i', strtotime($attendance->present_time))) }}" autofocus>
                    @error('present_time')
                        <div class="has-warning form-group">{{ $message }}</div>
                    @enderror
                </div>  
                <div class="form-group  col-md-6">
                    <label for="attendance_value" >Category</label>
                    <select name="attendance_value" id="attendance_value" value="{{ old('attendance_value', $attendance->attendance_value) }}" class="form-control @error('attendance_value') is-invalid @enderror">
                    <option value="">Select</option>
                    <option value="0" {{ $attendance->attendance_value == '0' ? 'selected' : ''}}>1901</option>
                    <option value="0" {{ $attendance->attendance_value == '0' ? 'selected' : ''}}>1902</option>
                    <option value="1" {{ $attendance->attendance_value == '1' ? 'selected' : ''}}>1903</option>
                    <option value="1" {{ $attendance->attendance_value == '1' ? 'selected' : ''}}>1904</option>
                    <option value="1" {{ $attendance->attendance_value == '1' ? 'selected' : ''}}>1905</option>
                       
                    </select>
                      @error('attendance_value')
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
