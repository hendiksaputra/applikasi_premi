@extends('layouts.master')

@section('title')
    Form Input Employee
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Input Data Employee</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('employees') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('employees') }}" method="post">
            @csrf
        <div class="form-group  col-md-6">
          <label for="nik" >NIK</label>
          <input type="text" class="form-control" name="nik" class="form-control @error('nik') is-invalid @enderror"
          value="{{ old('nik') }}" autofocus>
            @error('nik')
                <div class="has-warning form-group">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group  col-md-6">
          <label for="name_employee" >Employee Name</label>
          <input type="text" class="form-control" name="name_employee"  class="form-control @error('name_employee') is-invalid @enderror" value="{{ old('name_employee') }}"
          autofocus>
            @error('name_employee')
                <div class="has-warning form-group">{{ $message }}</div>
            @enderror
        </div> 
        <div class="form-group  col-md-6">
            <label for="project_id" >Project</label>
            <select name="project_id" class="form-control @error('project_id') is-invalid @enderror">
                <option value="">- Select -</option>
                @foreach ($projects as $item)
                  <option value="{{ $item->id }}" {{ old('project_id') == $item->id ? 'selected' : null }}>
                    {{ $item->code_project }} - {{ $item->name_project }}</option>
                @endforeach
              </select>
              @error('project_id')
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
