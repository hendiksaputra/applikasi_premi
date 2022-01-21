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
            <li class="active"><i class="fa fa-key"></i></li>
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
            {{-- <a href="{{ url('users/trash') }}" class="btn btn-danger btn-sm">
              <i class="fa fa-trash"></i> Trash
            </a> --}}
            <a href="{{ url('users/create') }}" class="btn btn-success btn-sm">
              <i class="fa fa-plus"></i> Add
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered" width=100%>
            <thead>
              <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Project</th>
                <th>Role</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->project->code }}</td>
                  <td>
                    @if (!empty($item->getRoleNames()))
                      @foreach ($item->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                      @endforeach
                    @endif
                  </td>
                  <td class="text-center">
                    <a href="{{ url('users/' . $item->id) }}" class="btn btn-warning btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ url('users/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ url('users/' . $item->id) }}" method="post"
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
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- <script src="{{ asset('style/assets/js/lib/data-table/datatables.min.js') }}"></script>
  <script>
    $(function() {
      $("#users-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('users.index.data') }}',
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
            data: 'project'
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
  </script> --}}
@endsection
