@extends('main')

@section('title', 'PPO-ARKA')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
      <div class="page-header float-left">
        <div class="page-title">
          <h1>{{ $title }}</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active"><i class="fa fa-th-large"></i></li>
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
            <a href="{{ url('unit_models') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form action="{{ url('unit_models/' . $unitModel->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="">Model No</label>
                  <input type="text" name="model_no" class="form-control @error('model_no') is-invalid @enderror"
                    value="{{ old('model_no', $unitModel->model_no) }}" autofocus>
                  @error('model_no')
                    <div class="has-warning form-group">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
