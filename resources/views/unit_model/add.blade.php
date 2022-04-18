@extends('layouts.master')

@section('title')
    Form Unit Model
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Input Data Unit Model</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('unit_models') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('unit_models') }}" method="post">
            @csrf
        <div class="form-group  col-md-6">
          <label for="" >Model No *</label>
          <input type="text" class="form-control" name="model_no" class="form-control @error('model_no') is-invalid @enderror"
          value="{{ old('model_no') }}" autofocus>
            @error('model_no')
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
