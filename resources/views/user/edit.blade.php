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
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form action="{{ url('users/' . $user->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="User Name"
                    name="name" value="{{ old('name', $user->name) }}" autofocus>
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                    name="email" value="{{ old('email', $user->email) }}">
                  @error('email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Password <sup class="text-danger">*always change the password before saving</sup></label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" name="password" value="{{ old('password', $user->password) }}">
                  @error('password')
                    <div class=" text-danger">{{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Project</label>
                  <select name="project_id" class="form-control @error('project_id') is-invalid @enderror">
                    <option value="">- Select Project -</option>
                    @foreach ($projects as $item)
                      <option value="{{ $item->id }}"
                        {{ old('project_id', $user->project_id) == $item->id ? 'selected' : null }}>
                        {{ $item->code }} - {{ $item->name }}</option>
                    @endforeach
                  </select>
                  @error('project_id')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
