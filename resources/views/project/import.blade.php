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
            <li class="active"><i class="fa fa-building"></i></li>
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
            <a href="{{ url('projects') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form action="{{ url('projects/importProcess') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                  <input type="file" name="file" class="form-control" placeholder="Project Data"
                    aria-label="Project Data" aria-describedby="button-addon2">
                  <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-upload"></i>
                    Import</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
