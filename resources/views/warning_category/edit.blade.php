@extends('main')

@section('title', 'PPO-ARKA')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
      <div class="page-header float-left">
        <div class="page-title">
          <h1>{{ $title }})</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active"><i class="fa fa-tags"></i></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="content mt-3">
    <div class="animated fadeIn">

      <div class="card">
        <div class="card-header">
          <div class="pull-left">
            <strong>{{ $subtitle }}</strong>
          </div>
          <div class="pull-right">
            <a href="{{ url('warning_categories') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form action="{{ url('warning_categories/' . $warningCategories->id) }}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="warning_name" class="form-control @error('warning_name') is-invalid @enderror"
                    value="{{ old('warning_name', $warningCategories->warning_name) }}" autofocus>
                  @error('warning_name')
                    <div class="has-warning form-group">{{ $message }}</div>
                  @enderror
                </div>
                <div class=" form-group">
                  <label for="">Index</label>
                  <input type="text" name="warning_index"
                    class="form-control @error('warning_index') is-invalid @enderror"
                    value="{{ old('warning_index', $warningCategories->warning_index) }}" autofocus>
                  @error('warning_index')
                    <div class="has-warning form-group">{{ $message }}</div>
                  @enderror
                </div>
                <button type=" submit" class="btn btn-success">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
