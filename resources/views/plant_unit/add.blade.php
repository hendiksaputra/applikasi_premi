@extends('layouts.master')

@section('title')
    Form Input Plant Unit
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Input Data Plant Unit</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('plant_units') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('plant_units') }}" method="post">
            @csrf
            <div class="form-group  col-md-6">
                <label for="load_category_id" >Load Category</label>
                <select name="load_category_id" class="form-control @error('load_category_id') is-invalid @enderror">
                    <option value="">--Select--</option>
                    @foreach ($loadCategory as $item)
                      <option value="{{ $item->id }}"
                        {{ old('load_category_id') == $item->id ? 'selected' : null }}>
                        {{ $item->name }}</option>
                    @endforeach
                  </select>
                  @error('load_category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>      
              <div class="form-group  col-md-6">
                <label for="unit_id" >Unit No</label>
                <select name="unit_id" class="form-control @error('unit_id') is-invalid @enderror">
                    <option value="">--Select--</option>
                    @foreach ($unit as $item)
                      <option value="{{ $item->id }}" {{ old('unit_id') == $item->id ? 'selected' : null }}>
                        {{ $item->unit_no }} - {{ $item->unit_desc }} - {{ $item->project->code }}
                      </option>
                    @endforeach
                  </select>
                  @error('unit_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group  col-md-6">
                <label for="dump_distance" >Dump Distance*</label>
                <input type="text" name="dump_distance"
                class="form-control @error('dump_distance') is-invalid @enderror"
                value="{{ old('dump_distance') }}">
                  @error('dump_distance')
                      <div class="has-warning form-group">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group  col-md-6">
                <label for="capacity" >Capacity</label>
                <input type="text" name="capacity"
                class="form-control @error('capacity') is-invalid @enderror"
                    value="{{ old('capacity') }}">
                  @error('capacity')
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
