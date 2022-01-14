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
      <div class="card">
        <div class="card-header">
          <div class="pull-left">
            <strong>{{ $subtitle }}</strong>
          </div>
          <div class="pull-right">
            <a href="{{ url('unit_premis') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <form action="{{ url('unit_premis/' . $unitPremi->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="">Unit No</label>
                  <select data-placeholder="Choose an unit..."
                    class="standardSelect @error('unit_id') is-invalid @enderror" tabindex="1" name="unit_id" autofocus>
                    <option value=""></option>
                    @foreach ($unit as $item)
                      <option value="{{ $item->id }}"
                        {{ old('unit_id', $unitPremi->unit_id) == $item->id ? 'selected' : null }}>
                        {{ $item->unit_no }} - {{ $item->unit_desc }} - {{ $item->project->code }}</option>
                    @endforeach
                  </select>
                  @error('unit_id')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Premi</label>
                  <input type="text" name="premi" class="form-control @error('premi') is-invalid @enderror"
                    value="{{ old('premi', $unitPremi->premi) }}" autofocus>
                  @error('premi')
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
