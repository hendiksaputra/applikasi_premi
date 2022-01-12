@extends('main')

@section('title', 'PPO-ARKA')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Project</h1>
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
                    <strong>Add Data Project</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('projects') }}" class="btn btn-success btnsm">
                        <i class="fa fa-undo"></i>Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ url('projects') }}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="">Code Project</label>
                                    <input type="text" name="code_project" value="{{ old('code_project') }}" class="form-control @error('code_project') is-invalid @enderror" autofocus>
                                    @error('code_project')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Name Project</label>
                                    <input type="text" name="name_project" value="{{ old('name_project') }}" class="form-control @error('name_project') is-invalid @enderror" autofocus>
                                    @error('name_project')
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




