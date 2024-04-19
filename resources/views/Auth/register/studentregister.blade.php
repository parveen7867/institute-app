<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>parveen | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  @if(session('success'))
   <div class="alert alert-success">
    <strong>Success>>></strong>{{session('success')}}
    </div>
    @endif
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      
      <a href="../../index2.html" class="h1"><b>Admin</b>Rg</a>
    </div>
    
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      
      @if(session('error'))
   <div class="alert alert-danger">
    <strong>Failed>>></strong>{{session('error')}}
    </div>
    @endif

      <form action="{{route('create.regs')}}" method="post">
      @csrf
      <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter the name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p style="color:red;">
        @if($errors->has('name'))
        {{$errors->first('name')}}
        @endif
       </p>
        <div class="input-group mb-3">
          <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p style="color:red;">
        @if($errors->has('email'))
        {{$errors->first('email')}}
        @endif
</p>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p style="color:red;">
        @if($errors->has('password'))
        {{$errors->first('password')}}
        @endif
</p>
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="conform Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p style="color:red;">
        @if($errors->has('confirm_password'))
        {{$errors->first('confirm_password')}}
        @endif
</p>
<p class="mt-3 mb-1">
        <a href="{{route('.login')}}">Login</a>
      </p>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
