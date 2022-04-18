@extends('layouts.master')

@section('title')
    Form Input Unit Premi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Input Data Unit Premi</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('unit_premis') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('unit_premis') }}" method="post">
            @csrf
        <div class="form-group  col-md-6">
          <label for="unit_id" >Unit No *</label>
          <select name="unit_id" class="form-control @error('unit_id') is-invalid @enderror">
            <option value="">- Select -</option>
            @foreach ($unit as $item)
                      <option value="{{ $item->id }}" {{ old('unit_id') == $item->id ? 'selected' : null }}>
                        {{ $item->unit_no }} - {{ $item->unit_desc }} - {{ $item->project->code_project }}</option>
            @endforeach
          </select>
          @error('unit_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group  col-md-6">
          <label for="premi" >Premi *</label>
          <input type="text" class="form-control" name="premi"  class="form-control @error('premi') is-invalid @enderror"
          value="{{ old('premi') }}" autofocus>
            @error('premi')
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
