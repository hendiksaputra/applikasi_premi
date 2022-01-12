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

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Data Employee</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('employees/trash') }}" class="btn btn-danger btnsm">
                        <i class="fa fa-trash"></i>Trash
                    </a>
                    <a href="{{ url('employees/create') }}" class="btn btn-success btnsm">
                        <i class="fa fa-plus"></i>Add
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>  
                            <th>NIK</th>
                            <th>Employee Name</th>
                            <th>Name Project</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($employees as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td> 
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->employee_name }}</td>
                                <td>{{ $item->project->name_project }}</td>
                                <td class="text-center">
                                    <a href="{{ url('employees/'.$item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url('employees/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('employees/'.$item->id) }}" method="post" onsubmit="return confirm('Are you sure want to delete this data?')"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </form>
                                    
                                </td>
                            </tr>               
                        @endforeach
                    </tbody>
        
                </table>
               
                
            </div>
        </div>
        
        
    </div>
</div>
@endsection




