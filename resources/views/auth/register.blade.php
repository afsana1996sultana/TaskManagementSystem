<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Task Management System | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('customCSS/style.css')}}">
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Task Management System</a>
        </div>

        <div class="card login_card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new user</p>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="login_from form-control" name="name" value="{{ old('name') }}" placeholder="Full name" autofocus autocomplete="name" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="email" class="login_from form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Email" autocomplete="username"  required> 
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" class="login_from form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Password" autocomplete="new-password" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" class="login_from form-control" name="password_confirmation" id="password_confirmation" value="{{ old('password') }}" placeholder="Retype Password" autocomplete="new-password" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <button type="submit" class="add_btn btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
