<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task Management System | Log in</title>

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

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Task Management System</b></a>
            </div>

            <div class="card login_card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" id="email" class="login_from form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email" autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" id="password" class="login_from form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" autocomplete="current-password" required>
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Remember Me</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="add_btn btn btn-primary btn-block">Login</button>
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
