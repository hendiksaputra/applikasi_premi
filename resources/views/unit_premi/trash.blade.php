@extends('main')

@section('title', 'PPO-ARKA')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
      <div class="page-header float-left">
        <div class="page-title">
          <h1>Warning Data</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active"><i class="fa fa-warning"></i></li>
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
            <strong>Deleted Warning List</strong>
          </div>
          <div class="pull-right">
            <a href="{{ url('warnings/delete') }}" class="btn btn-danger btn-sm"
              onclick="return confirm('Are you sure want to delete all data?')">
              <i class="fa fa-trash"></i> Delete All
            </a>
            <a href="{{ url('warnings/restore') }}" class="btn btn-info btn-sm">
              <i class="fa fa-plus"></i> Restore
            </a>
            <a href="{{ url('warnings') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>NIK</th>
                <th>Employee</th>
                {{-- <th>Position</th> --}}
                <th>Project</th>
                <th>Warning</th>
                <th>Date</th>
                <th width="20%" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($warnings as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->employee->nik }}</td>
                  <td>{{ $item->employee->employee_name }}</td>
                  {{-- <td>{{ $item->position }}</td> --}}
                  <td>{{ $item->employee->project->code_project }}</td>
                  <td>{{ $item->warning_category->sp_name }}</td>
                  <td>{{ $item->sp_date }}</td>
                  <td class="text-center">
                    <a href="{{ url('warnings/restore/' . $item->id) }}" class="btn btn-info btn-sm">
                      Restore
                    </a>
                    <a href="{{ url('warnings/delete/' . $item->id) }}" class="btn btn-danger btn-sm"
                      onclick="return confirm('Are you sure want to delete this data?')">
                      Delete
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
