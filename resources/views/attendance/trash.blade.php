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
            <li class="active"><i class="fa fa-check-square"></i></li>
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
            <a href="{{ url('attendances/restore') }}" class="btn btn-info btn-sm">
              <i class="fa fa-plus"></i> Restore
            </a>
            <a href="{{ url('attendances/delete') }}" class="btn btn-danger btn-sm"
              onclick="return confirm('Are you sure want to delete all data?')">
              <i class="fa fa-trash"></i> Delete All
            </a>
            <a href="{{ url('attendances') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered" width=100%>
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Employee Name</th>
                <th>Time</th>
                <th>Category</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @if ($attendances->count() > 0)
                @foreach ($attendances as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->employee->nik }}</td>
                    <td>{{ $item->employee->name }}</td>
                    <td>{{ $item->present_time }}</td>
                    <td>{{ $item->attendance_category->code }} - {{ $item->attendance_category->remarks }}</td>
                    <td class="text-center">
                      <a href="{{ url('attendances/restore/' . $item->id) }}" class="btn btn-info btn-sm">
                        Restore
                      </a>
                      <a href="{{ url('attendances/delete/' . $item->id) }}" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure to delete permanent this data?')">
                        Delete Permanent
                      </a>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center">Empty Data</td>
                </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>


    </div>
  </div>
@endsection
