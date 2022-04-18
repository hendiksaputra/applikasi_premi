@extends('layouts.master')

@section('title')
    Form Edit Warning Category
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Edit Warning Category</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('warning_categories') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('warning_categories/' . $warningCategories->id) }}" method="post">
            @method('patch')
            @csrf
        <div class="form-group  col-md-6">
          <label for="" >Warning Category Name *</label>
          <input type="text" class="form-control" name="warning_name" class="form-control @error('warning_name') is-invalid @enderror"
          value="{{ old('warning_name', $warningCategories->warning_name) }}" autofocus>
            @error('warning_name')
                <div class="has-warning form-group">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group  col-md-6">
          <label for="product_name" >Index *</label>
          <input type="text" class="form-control" name="warning_index" class="form-control @error('warning_index') is-invalid @enderror"
          value="{{ old('warning_index', $warningCategories->warning_index) }}" autofocus>
            @error('warning_index')
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
