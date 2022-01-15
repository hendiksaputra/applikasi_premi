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
            <strong>{{ $subtitle }}</strong>
          </div>
          <div class="pull-right">
            <a href="{{ url('warnings/trash') }}" class="btn btn-danger btn-sm">
              <i class="fa fa-trash"></i> Trash
            </a>
            <a href="{{ url('warnings/create') }}" class="btn btn-success btn-sm">
              <i class="fa fa-plus"></i> Add
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table id="warnings-table" class="table table-striped table-bordered" width=100%>
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>NIK</th>
                <th>Employee</th>
                <th>Project</th>
                <th>Warning</th>
                <th>Date</th>
                <th width="15%" class="text-center">Action</th>
              </tr>
            </thead>
            {{-- <tbody>
              @foreach ($warnings as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->employee->nik }}</td>
                  <td>{{ $item->employee->employee_name }}</td>
                  <td>{{ $item->employee->project->code_project }}</td>
                  <td>{{ $item->warning_category->sp_name }}</td>
                  <td>{{ $item->sp_date }}</td>
                  <td class="text-center">
                    <a href="{{ url('warning/' . $item->id) }}" class="btn btn-warning btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ url('warning/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ url('warning/' . $item->id) }}" method="post"
                      onsubmit="return confirm('Are you sure want to delete this data?')" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody> --}}
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('style/assets/js/lib/data-table/datatables.min.js') }}"></script>
  <script>
    $(function() {
      $("#warnings-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('warnings.index.data') }}',
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
          },
          {
            data: 'nik'
          },
          {
            data: 'name'
          },
          {
            data: 'code'
          },
          {
            data: 'warning_name'
          },
          {
            data: 'warning_date'
          },
          {
            data: 'action',
            orderable: false,
            searchable: false,
            className: 'text-center'
          },
        ],
        fixedHeader: true,
      })
    });
  </script>
@endsection
