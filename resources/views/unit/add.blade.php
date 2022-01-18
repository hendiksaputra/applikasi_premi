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
            <li class="active"><i class="fa fa-truck"></i></li>
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
            <a href="{{ url('units') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <form action="{{ url('units') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Unit No</label>
                  <input type="text" name="unit_no" class="form-control @error('unit_no') is-invalid @enderror"
                    value="{{ old('unit_no') }}" autofocus>
                  @error('unit_no')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Unit Description</label>
                  <input type="text" name="unit_desc" class="form-control @error('unit_desc') is-invalid @enderror"
                    value="{{ old('unit_desc') }}" autofocus>
                  @error('unit_desc')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Unit Model</label>
                  <select data-placeholder="Choose an unit model..."
                    class="standardSelect @error('unit_model_id') is-invalid @enderror" tabindex="1" name="unit_model_id"
                    autofocus>
                    <option value=""></option>
                    @foreach ($unitModels as $item)
                      <option value="{{ $item->id }}" {{ old('unit_model_id') == $item->id ? 'selected' : null }}>
                        {{ $item->model_no }}</option>
                    @endforeach
                  </select>
                  @error('unit_model_id')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Project</label>
                  <select data-placeholder="Choose a project..."
                    class="standardSelect @error('project_id') is-invalid @enderror" tabindex="1" name="project_id">
                    <option value=""></option>
                    @foreach ($projects as $item)
                      <option value="{{ $item->id }}" {{ old('project_id') == $item->id ? 'selected' : null }}>
                        {{ $item->code }}
                      </option>
                    @endforeach
                  </select>
                  @error('project_id')
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
