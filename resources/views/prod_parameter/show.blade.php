@extends('main')

@section('title', 'PPO-ARKA')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Production Parameter</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href=""></a>Production</li>
                    <li><a href=""></a>Parameter</li>
                    <li class="active">Detail</li>
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
                    <strong>Detail Data Production Parameter</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('prod_parameters') }}" class="btn btn-default btnsm">
                        <i class="fa fa-undo"></i>Back
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 30%">Name Project</th>
                                    <td>{{ $prod_parameter->project->name_project }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%">Date</th>
                                    <td>{{ $prod_parameter->date }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%">Plan Fuel Factor</th>
                                    <td>{{ $prod_parameter->plan_fuel_factor }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%">Cum Production OB</th>
                                    <td>{{ $prod_parameter->cum_prod_ob }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%">Cum Production Coal</th>
                                    <td>{{ $prod_parameter->cum_prod_coal }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%">Cum Fuel</th>
                                    <td>{{ $prod_parameter->cum_fuel }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%">Join Survey</th>
                                    <td>{{ $prod_parameter->join_survey }}</td>
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




