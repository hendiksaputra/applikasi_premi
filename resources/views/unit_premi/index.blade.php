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
            <li class="active"><i class="fa fa-rub"></i></li>
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
          {{-- @dd($unitPremis) --}}
          <div class="pull-right">
            <a href="{{ url('unit_premis/create') }}" class="btn btn-success btn-sm">
              <i class="fa fa-plus"></i> Add
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table id="units-table" class="table table-striped table-bordered" width=100%>
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Unit No.</th>
                <th>Project</th>
                <th>Premi</th>
                <th width="15%" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($unitPremis as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->unit->unit_no }}</td>
                  <td>{{ $item->unit->project->code }}</td>
                  <td>{{ $item->premi }}</td>
                  <td class="text-center">
                    <a href="{{ url('unit_premis/' . $item->id) }}" class="btn btn-warning btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ url('unit_premis/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ url('unit_premis/' . $item->id) }}" method="post"
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
      $("#units-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('units.index.data') }}',
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
          },
          {
            data: 'unit_no'
          },
          {
            data: 'model_no'
          },
          {
            data: 'code_project'
          },
          {
            data: 'action',
            orderable: false,
            searchable: false
          },
        ],
        fixedHeader: true,
      })
    });
  </script> --}}
@endsection
