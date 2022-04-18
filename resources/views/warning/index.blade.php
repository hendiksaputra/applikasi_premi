@extends('layouts.master')

@section('title')
    Daftar Warning/SP
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Warning/SP</li>
@endsection


@section('content')

<div class="content mt-3">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Warning/SP Data Table</h3>
          <div class="pull-right">
            <a href="{{ url('warnings/create') }}" class="btn btn-success btn-sm">
              <i class="fa fa-plus"></i> Add
            </a>
          </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row">
              <div class="col-sm-6"></div><div class="col-sm-6"></div>
          </div>
          <div class="row"><div class="col-sm-12">
              <table id="table1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NIK</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Employee Name</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Warning</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Month/Years</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Date</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Action</th>
            </thead>
            <tbody>
                @foreach ($warnings as $item)    
            <tr role="row" class="odd">
              <td class="sorting_1">{{ $loop->iteration }}</td>
              <td>{{ $item->nik }}</td>
              <td>{{ $item->name_employee }}</td>
              <td>{{ $item->warning_value }}</td>
              <td>{{ $item->warning_month }}</td>
              <td>{{ $item->warning_date }}</td>
              <td class="text-center">
                
                <form action="{{ url('warnings/' . $item->id) }}" method="post"
                  onsubmit="return confirm('Are you sure want to delete this data?')" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                  </button>
                  <a href="{{ url('warnings/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                </form>
            
            
             </td>
              
            </tr>
            @endforeach
           </tbody>
            
          </table>
        </div></div><div class="row"><div class="col-sm-5">
            
        </div>
        <!-- /.box-body -->
      </div>
@endsection
