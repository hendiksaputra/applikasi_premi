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

      <div class="card">
        <div class="card-header">
          <div class="pull-left">
            <strong>{{ $subtitle }}</strong>
          </div>
          <div class="pull-right">
            <a href="{{ url('attendances') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form action="{{ url('attendances') }}" method="post">
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
                  <label for="">Present Time</label>
                  <input type="datetime-local" name="present_time"
                    class="form-control @error('present_time') is-invalid @enderror" value="{{ old('present_time') }}">
                  @error('present_time')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Category</label>
                  <select name="attendance_category_id"
                    class="form-control @error('attendance_category_id') is-invalid @enderror">
                    <option value="">- Select -</option>
                    @foreach ($category as $item)
                      <option value="{{ $item->id }}"
                        {{ old('attendance_category_id') == $item->id ? 'selected' : null }}>
                        {{ $item->code }} - {{ $item->remarks }}</option>
                    @endforeach
                  </select>
                  @error('attendance_category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>


                <button type="submit" class="btn btn-success">Save

                </button>
              </form>

            </div>

          </div>

        </div>
      </div>


    </div>
  </div>
@endsection
