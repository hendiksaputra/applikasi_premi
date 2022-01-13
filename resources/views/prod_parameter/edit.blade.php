@extends('main')

@section('title', 'PPO-ARKA')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Production Parameter</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    
                    <li class="active"><i class="fa fa-dashboard"></i></li>
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
                    <strong>Edit Data Production Parameter</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('prod_parameters') }}" class="btn btn-success btnsm">
                        <i class="fa fa-undo"></i>Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
                        
                        
                        <form action="{{ url('prod_parameters/'.$prod_parameter->id) }}" method="post">
                            @method('PUT')    
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="cc-exp" class="control-label mb-1">Project</label>
                                        <select name="project_id" class="form-control @error('project_id') is-invalid @enderror">
                                            <option value="">- Select -</option>
                                            @foreach ($projects as $item)
                                                <option value="{{ $item->id }}" {{ old('project_id', $prod_parameter->project_id ) == $item->id ? 'selected' : null }}>{{ $item->name_project }}</option> 
                                            @endforeach     
                                        </select>
                                        @error('project_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="x_card_code" class="control-label mb-1">Date</label>
                                    <input type="date" name="date" value="{{ old('date', $prod_parameter->date) }}" class="form-control @error('date') is-invalid @enderror" autofocus>
                                        @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-6">
                                  <label for="x_card_code" class="control-label mb-1">Plan Fuel Factor</label>
                                  <input type="text" name="plan_fuel_factor" value="{{ old('plan_fuel_factor', $prod_parameter->plan_fuel_factor) }}" class="form-control @error('plan_fuel_factor') is-invalid @enderror" autofocus>
                                        @error('plan_fuel_factor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                              </div>
                              <div class="col-6">
                                  <label for="x_card_code" class="control-label mb-1">Cum Production OB</label>
                                  <input type="text" name="cum_prod_ob" value="{{ old('cum_prod_ob', $prod_parameter->cum_prod_ob) }}" class="form-control @error('cum_prod_ob') is-invalid @enderror" autofocus>
                                  @error('cum_prod_ob')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="col-6">
                                  <label for="x_card_code" class="control-label mb-1">Cum Production Coal</label>
                                  <input type="text" name="cum_prod_coal" value="{{ old('cum_prod_coal', $prod_parameter->cum_prod_coal) }}" class="form-control @error('cum_prod_coal') is-invalid @enderror" autofocus>
                                  @error('cum_prod_coal')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="col-6">
                                  <label for="x_card_code" class="control-label mb-1">Cum Fuel</label>
                                  <input type="text" name="cum_fuel" value="{{ old('cum_fuel', $prod_parameter->cum_fuel) }}" class="form-control @error('cum_fuel') is-invalid @enderror" autofocus>
                                  @error('cum_fuel')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="col-6">
                                  <label for="x_card_code" class="control-label mb-1">Join Survey</label>
                                  <input type="text" name="join_survey" value="{{ old('join_survey', $prod_parameter->join_survey) }}" class="form-control @error('join_survey') is-invalid @enderror" autofocus>
                                  @error('join_survey')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                              </div>
                            </div>
                            <hr>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-save"></i>&nbsp;
                                    <span id="payment-button-amount">Save</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

              </div>
                
            </div>
        </div>
        
        
    </div>
</div>
@endsection




