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
            <div class="col-md-12">
              {{-- @dd($unitPremi) --}}
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th style="width: 30%">Unit No</th>
                    <td>{{ $unitPremi->unit->unit_no }}</td>
                  </tr>
                  <tr>
                    <th>Unit Description</th>
                    <td>{{ $unitPremi->unit->unit_desc }}</td>
                  </tr>
                  <tr>
                    <th>Unit Model</th>
                    <td>{{ $unitPremi->unit->unit_model->model_no }}</td>
                  </tr>
                  <tr>
                    <th>Project</th>
                    <td>{{ $unitPremi->unit->project->code }} -
                      {{ $unitPremi->unit->project->name }}</td>
                  </tr>
                  <tr>
                    <th>Premi</th>
                    <td>{{ $unitPremi->premi }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
