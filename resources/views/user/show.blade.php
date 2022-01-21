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
            <li class="active"><i class="fa fa-key"></i></li>
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
            <strong>{{ $subtitle }}</strong>
          </div>
          <div class="pull-right">
            <a href="{{ url('users') }}" class="btn btn-success btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th style="width: 30%">Full Name</th>
                    <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                    <th style="width: 30%">Email</th>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <th style="width: 30%">Project</th>
                    <td>{{ $user->project->code }}</td>
                  </tr>
                  <tr>
                    <th style="width: 30%">Created at</th>
                    <td>{{ $user->created_at }}</td>
                  </tr>
                  <tr>
                    <th style="width: 30%">Role</th>
                    <td>
                      @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                          <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                      @endif
                    </td>
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
