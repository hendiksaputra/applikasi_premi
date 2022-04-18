@extends('layouts.master')

@section('title')
    Form Edit Load Warning Category
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Edit Data Load Category</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('load_categories') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('load_categories/' . $loadCategory->id) }}" method="post">
            @method('PUT')
            @csrf
        <div class="form-group  col-md-6">
          <label for="" >Load Category Name *</label>
          <input type="text" class="form-control" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $loadCategory->name) }}" autofocus>
            @error('name')
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
