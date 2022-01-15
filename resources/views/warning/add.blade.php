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
      <div class="card">
        <div class="card-header">
          <div class="pull-left">
            <strong>{{ $subtitle }}</strong>
          </div>
          <div class="pull-right">
            <a href="{{ url('warnings') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <form action="{{ url('warnings') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Employee Name</label>
                  <select data-placeholder="Choose an employee..."
                    class="standardSelect @error('employee_id') is-invalid @enderror" tabindex="1" name="employee_id"
                    autofocus>
                    <option value=""></option>
                    @foreach ($employees as $item)
                      <option value="{{ $item->id }}" {{ old('employee_id') == $item->id ? 'selected' : null }}>
                        {{ $item->nik }} -
                        {{ $item->name }}</option>
                    @endforeach
                  </select>
                  @error('employee_id')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Project</label>
                  <input type="text" class="form-control" value="" readonly>
                </div>
                <div class="form-group">
                  <label for="">Warning</label>
                  <select data-placeholder="Choose a warning..."
                    class="standardSelect @error('warning_category_id') is-invalid @enderror" tabindex="1"
                    name="warning_category_id">
                    <option value=""></option>
                    @foreach ($warning_categories as $item)
                      <option value="{{ old('warning_category_id', $item->id) }}"
                        {{ old('warning_category_id') == $item->id ? 'selected' : null }}>{{ $item->warning_name }}
                      </option>
                    @endforeach
                  </select>
                  @error('warning_category_id')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class=" form-group">
                  <label for="">Date</label>
                  <input type="date" name="warning_date" class="form-control @error('warning_date') is-invalid @enderror"
                    value="{{ old('warning_date') }}">
                  @error('warning_date')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <button type=" submit" class="btn btn-success">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
