<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">

  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
   <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/admin-lte/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/admin-lte/css/login.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('{{asset('backend/images/auth-bg-1.jpg')}}')">
<div class="login-box">
  <div class="login-logo">
    <a href="#" class="backend-img-wrapper">
      <img src="{{asset('backend/images/saralmind-logo.png')}}" alt="">
    </a>
  </div>
  <div class="card fat">
    <div class="card-body">
        <div class="text-center">
            <h4>Reset Password</h4>
            <h6>Enter your Username and Password </h6>
        </div>
        <form method="POST" action="http://cabinteely.test/password/email" class="my-login-validation mt-4" novalidate="">
            <input type="hidden" name="_token" value="Oe6z4OHfdFHAsWT7IYYo6kIkcKDNhwukXsdvAGvf">								<div class="form-group">
                <label for="email">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="" required="" autofocus="">
                    
                <div class="form-text text-muted login-note">
                    By clicking "Reset Password" we will send a password reset link
                </div>
            </div>

            <div class="form-group m-0">
                <button style="background-color: #3f3b25; border-color: #3f3b25" type="submit" class="btn btn-primary-les btn-block">
                    Reset Password
                </button>
            </div>
            <div class="new-account">
                <p>I remembered my password.</p><a href="http://cabinteely.test/logout" class="btn-flip-back">Go back</a>
            </div>
        </form>
    </div>
</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/admin-lte/js/adminlte.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js"></script>

<script>
  feather.replace()
</script>

</body>
</html>
