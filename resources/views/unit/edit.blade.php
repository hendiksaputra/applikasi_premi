@extends('layouts.master')

@section('title')
    Form Edit Unit
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Edit Unit</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('units') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('units/' . $unit->id) }}" method="post">
            @method('patch')
            @csrf
        <div class="form-group  col-md-6">
          <label for="unit_no" >Unit No</label>
          <input type="text" class="form-control" name="unit_no" class="form-control @error('unit_no') is-invalid @enderror"
          value="{{ old('unit_no', $unit->unit_no) }}" autofocus>
            @error('unit_no')
                <div class="has-warning form-group">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group  col-md-6">
          <label for="unit_desc" >Unit Description</label>
          <input type="text" class="form-control" name="unit_desc" class="form-control @error('unit_desc') is-invalid @enderror"
          value="{{ old('unit_desc', $unit->unit_desc) }}" autofocus>
            @error('unit_desc')
                <div class="has-warning form-group">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group  col-md-6">
            <label for="unit_model_id" >Unit Model</label>
            <select name="unit_model_id" class="form-control @error('unit_model_id') is-invalid @enderror">
                <option value="">- Select -</option>
                @foreach ($unitModels as $item)
                  <option value="{{ $item->id }}"
                    {{ old('unit_model_id', $unit->unit_model_id) == $item->id ? 'selected' : null }}>
                    {{ $item->model_no }}</option>
                @endforeach
              </select>
              @error('project_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>     
        <div class="form-group  col-md-6">
            <label for="project_id" >Project</label>
            <select name="project_id" class="form-control @error('project_id') is-invalid @enderror">
                <option value="">- Select -</option>
                @foreach ($projects as $item)
                <option value="{{ $item->id }}"
                  {{ old('project_id', $unit->project_id) == $item->id ? 'selected' : null }}>
                  {{ $item->code_project }}
                </option>
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
