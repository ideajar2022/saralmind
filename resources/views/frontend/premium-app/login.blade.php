<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }

      .container-fluid {
        margin-top: 50px;
      }

      .form-group label {
        font-weight: bold;
      }

      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
      }

      .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
      }

      .btn-primary:focus, .btn-primary.focus {
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
      }

  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <h2 class="text-center mb-4">Login</h2>
        <form action="{{ route('premium-login') }}" method="post">@csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
          </div>
          <span class="text-danger">
            @error('email') {{ $message }} @enderror
          </span>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <span class="text-danger">
            @error('password') {{ $message }} @enderror
          </span>
          
          @if(session('fail'))
            <span class="text-danger">{{ session('fail') }}</span>
          @endif
<!--           <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember-me">
            <label class="form-check-label" for="remember-me">Remember me</label>
          </div> -->
          <br>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>

        <div class="alert alert-warning" style="margin-top: 30px;">
          <b>Note: You will not be able to login from multiple devices with the same account. So, don't share your account with others !!</b>
        </div>
      </div>

    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
