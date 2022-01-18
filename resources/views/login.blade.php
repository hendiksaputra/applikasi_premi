<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title }} - Premi Operator</title>
  {{-- <meta name="description" content="Sufee Admin - HTML5 Admin Template"> --}}
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="{{ asset('/style/assets/css/normalize.css') }}">
  <link rel="stylesheet" href="{{ asset('/style/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/style/assets/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/style/assets/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('/style/assets/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/style/assets/css/cs-skin-elastic.css') }}">
  <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
  <link rel="stylesheet" href="{{ asset('/style/assets/scss/style.css') }}">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

  <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body class="bg-dark">
  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
      <div class="login-content">
        <div class="login-form">
          <div class="login-logo">
            <a href="{{ url('/') }}">
              <img class="align-content" src="{{ asset('style/images/logo3.png') }}" alt="" width="200">
            </a><br>
            <div class="form-group">
              <label>Premi <strong>Operator</strong></label>
            </div>
          </div>

          @if (session()->has('success'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          @if (session()->has('loginError'))
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
              {{ session('loginError') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <form action="{{ url('/login') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                name="email" value="{{ old('email') }}" autofocus>
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
          </form>
          <div class="register-link m-t-15 text-center">
            <p>Don't have account ? <a href="{{ url('/register') }}"> Sign Up Here</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
  <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
  <script src="{{ asset('style/assets/js/main.js') }}"></script>


</body>

</html>
