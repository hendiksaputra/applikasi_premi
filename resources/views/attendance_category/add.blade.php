@extends('layouts.master')

@section('title')
    Form Input Attendance Category
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Input Data Attendance Category</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('attendance_categories') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('attendance_categories') }}" method="post">
            @csrf
        <div class="form-group  col-md-6">
          <label for="" >Code *</label>
          <input type="text" class="form-control" name="code" class="form-control @error('code') is-invalid @enderror"
          value="{{ old('code') }}" autofocus>
            @error('code')
                <div class="has-warning form-group">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group  col-md-6">
          <label for="product_name" >Remarks *</label>
          <input type="text" class="form-control" name="remarks"  class="form-control @error('remarks') is-invalid @enderror"
          value="{{ old('remarks') }}" autofocus>
            @error('remarks')
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
