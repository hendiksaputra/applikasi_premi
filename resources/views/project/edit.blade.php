@extends('layouts.master')

@section('title')
    Form Edit Project
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Input Edit Project</li>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
    
      <div class="pull-right">
        <a href="{{ url('projects') }}" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i>Back</a>
      </div>
    </div>
    <!-- /.box-header -->
<div class="box-body">
        
<div class="box box-primary">
      <div class="box-body">
        <form action="{{ url('projects/' . $projects->id) }}" method="post">
            @method('patch')
            @csrf
        <div class="form-group  col-md-6">
          <label for="" >Project Code</label>
          <input type="text" class="form-control" name="code_project" class="form-control @error('code_project') is-invalid @enderror"
          value="{{ old('code_project', $projects->code_project) }}" autofocus>
            @error('code_project')
                <div class="has-warning form-group">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group  col-md-6">
          <label for="name_project" >Project Name</label>
          <input type="text" class="form-control" name="name_project" class="form-control @error('name_project') is-invalid @enderror"
          value="{{ old('name_project', $projects->name_project) }}" autofocus>
            @error('name_project')
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
