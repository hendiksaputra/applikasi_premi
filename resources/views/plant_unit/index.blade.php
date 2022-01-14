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
            <li class="active"><i class="fa fa-flag"></i></li>
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
          {{-- @dd($plantUnits) --}}
          <div class="pull-right">
            <a href="{{ url('plant_units/create') }}" class="btn btn-success btn-sm">
              <i class="fa fa-plus"></i> Add
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table id="plantUnits-table" class="table table-striped table-bordered" width=100%>
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Load Category</th>
                <th>Unit No.</th>
                <th>Dump Distance</th>
                <th>Capacity</th>
                <th width="15%" class="text-center">Action</th>
              </tr>
            </thead>
            {{-- <tbody>
              @foreach ($plantUnits as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->load_category->name }}</td>
                  <td>{{ $item->unit->unit_no }}</td>
                  <td>{{ $item->dump_distance }}</td>
                  <td>{{ $item->capacity }}</td>
                  <td class="text-center">
                    <a href="{{ url('plant_units/' . $item->id) }}" class="btn btn-warning btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ url('plant_units/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ url('plant_units/' . $item->id) }}" method="post"
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
      $("#plantUnits-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('plant_units.index.data') }}',
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
          },
          {
            data: 'load_category_name'
          },
          {
            data: 'unit_no'
          },
          {
            data: 'dump_distance'
          },
          {
            data: 'capacity'
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
