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

      <div class="card" id="accordionFlushExample">
        <div class="card-header" id="flush-headingOne" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne">
          <strong class="card-title" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
            aria-controls="flush-collapseOne">
            <i class="fa fa-search"> Filter</i>
          </strong>
        </div>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
          data-bs-parent="#accordionFlushExample">
          <div class="card-body">
            <form action="{{ url('attendances/index_data') }}" method="post">

            </form>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="pull-left">
            <strong>{{ $subtitle }}</strong>
          </div>
          <div class="pull-right">
            <a href="{{ url('attendances/trash') }}" class="btn btn-danger btn-sm">
              <i class="fa fa-trash"></i> Trash
            </a>
            <a href="{{ url('attendances/create') }}" class="btn btn-success btn-sm">
              <i class="fa fa-plus"></i> Add
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table id="attendances-table" class="table table-striped table-bordered" width=100%>
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
            {{-- <tbody>
              @foreach ($attendances as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nik }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->project->code }} - {{ $item->project->name }}</td>
                  <td class="text-center">
                    <a href="{{ url('attendances/' . $item->id) }}" class="btn btn-warning btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ url('attendances/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ url('attendances/' . $item->id) }}" method="post"
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
      $("#attendances-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('attendances.index.data') }}',
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
            data: 'time'
          },
          {
            data: 'category'
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
