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
            <li class="active"><i class="fa fa-users"></i></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="content mt-3">
    <div class="animated fadeIn">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          <div class="pull-left">
            <strong>{{ $subtitle }}</strong>
          </div>
          <div class="pull-right">
            <a href="{{ url('employees') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              {{-- @dd($employee->nik) --}}
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th style="width: 30%">NIK</th>
                    <td>{{ $employee->nik }}</td>
                  </tr>
                  <tr>
                    <th style="width: 30%">Employee Name</th>
                    <td>{{ $employee->name }}</td>
                  </tr>
                  <tr>
                    <th style="width: 30%">Name Project</th>
                    <td>{{ $employee->project->code }} - {{ $employee->project->name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="pull-left">
            <strong>Warning Detail</strong>
          </div>
        </div>
        <div class="card-body table-responsive">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <table id="bootstrap-data-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Warning</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($employee->warning as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->warning_category->warning_name }}</td>
                      <td>{{ $item->warning_date }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
