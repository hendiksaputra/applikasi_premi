@extends('layouts.master')

@section('title')
    Daftar Attendance Category
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Attendance Category</li>
@endsection


@section('content')

<div class="content mt-3">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Attendance Category Data Table</h3>
          <div class="pull-right">
            <a href="{{ url('attendance_categories/add') }}" class="btn btn-success btn-sm">
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
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Code</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Remarks</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Action</th>
            </thead>
            <tbody>
                @foreach ($attendanceCategories as $item)       
            <tr role="row" class="odd">
              <td class="sorting_1">{{ $loop->iteration }}</td>
              <td>{{ $item->code }}</td>
              <td>{{ $item->remarks }}</td>
              <td class="text-center">
                
                <form action="{{ url('attendance_categories/' . $item->id) }}" method="post"
                  onsubmit="return confirm('Are you sure want to delete this data?')" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                  </button>
                  <a href="{{ url('attendance_categories/edit/' . $item->id) }}" class="btn btn-primary btn-sm">
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
