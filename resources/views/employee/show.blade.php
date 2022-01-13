@extends('main')

@section('title', 'PPO-ARKA')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Employee</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href=""></a>Employee</li>
                    <li><a href=""></a>Data</li>
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
                    <strong>Detail Data Employee</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('employees') }}" class="btn btn-default btnsm">
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
                                    <th style="width: 30%">NIK</th>
                                    <td>{{ $employee->nik }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%">Employee Name</th>
                                    <td>{{ $employee->employee_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%">Name Project</th>
                                    <td>{{ $employee->project->name_project }}</td>
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




