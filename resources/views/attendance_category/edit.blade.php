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
            <li class="active"><i class="fa fa-tags"></i></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="card">
        <div class="card-header">
          <div class="pull-left">
            <strong>{{ $subtitle }}</strong>
          </div>
          <div class="pull-right">
            <a href="{{ url('attendance_categories') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form action="{{ url('attendance_categories/' . $attendanceCategories->id) }}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="">Code</label>
                  <input type="text" name="code" value="{{ old('code', $attendanceCategories->code) }}"
                    class="form-control @error('code') is-invalid @enderror" autofocus>
                  @error('code')
                    <div class="has-warning form-group">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Remarks</label>
                  <input type="text" name="remarks" value="{{ old('remarks', $attendanceCategories->remarks) }}"
                    class="form-control @error('remarks') is-invalid @enderror" autofocus>
                  @error('remarks')
                    <div class="has-warning form-group">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
