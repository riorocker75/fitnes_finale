<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk</title>

      <meta name="csrf-token" content="{{ csrf_token() }}">
      {{-- <link rel="stylesheet" href="{{asset('dist/plugins/fontawesome-free/css/all.min.css') }}"> --}}
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">
<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">


<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/custom.js')}}"></script>

</head>
<body class=" login-page">
    {{show_alert()}}
<div class="login-box">
 <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a  class="h1"><b>Selamat Datang</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sistem Informasi Fitness</p>

    <form action="{{ url('/login/cek') }}" method="post">
        @csrf  
        @method('POST')
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         <div >
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
      </form>

  
      <!-- /.social-auth-links -->

   
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
</body>
</html>