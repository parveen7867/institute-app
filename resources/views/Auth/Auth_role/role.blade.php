<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

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
      <a href="#" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Choose role to start your session</p>
      @if(session('error'))
   <div class="alert alert-danger">
    <strong>Failed>>></strong>{{session('error')}}
    </div>
    @endif
      <!-- index.html -->
      <div>
  <input type="radio" name="page" value="page1"> Super admin<br>
  <input type="radio" name="page" value="page2"> Admin<br>
  <input type="radio" name="page" value="page3"> Teacher<br>
  <input type="radio" name="page" value="page4"> Student<br>
  <input type="radio" name="page" value="page5"> Parent<br>
  <input type="radio" name="page" value="page5"> Accontant<br>
  <input type="radio" name="page" value="page5"> Librarian<br>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>

<!-- index.html -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[name="page"]').change(function() {
            var selectedPage = $(this).val();
            navigateToPage(selectedPage);
        });

        function navigateToPage(page) {
            // Update the route to match your actual route in the Laravel application
            var url = "{{ url('/role') }}" + "/" + page;
            window.location.href = url;
        }
    });
</script>
</script>

</body>
</html>