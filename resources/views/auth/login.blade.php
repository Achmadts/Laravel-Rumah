<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Login</title>
    <link href="{{ asset('sb_admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary" style="user-select: none;">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Form!</h1>
                                    </div>
                                    <form action="{{ route('auth.authenticate') }}" method="POST" class="user">
                                        @csrf
                                        @error('notif')
                                            <p class="login-box-msg error invalid-feedback"
                                                style="display: inline; font-size: 15px; color: red;">
                                                {{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <input name="email" type="text"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="exampleInputUsername" aria-describedby="emailHelp"
                                                placeholder="Email" autocomplete="off"
                                                @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif>
                                            @error('email')
                                                <p class="login-box-msg error invalid-feedback"
                                                    style="font-size: 15px; color: red;">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="password" autocomplete="off"
                                                @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif>
                                            @error('password')
                                                <p class="login-box-msg error invalid-feedback"
                                                    style="font-size: 15px; color: red;">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheck" name="remember"
                                                            @if (isset($_COOKIE['remember'])) @checked(true) @endif>
                                                        <label class="custom-control-label" for="customCheck"
                                                            style="cursor: pointer;"
                                                            @if (isset($_COOKIE['remember'])) @checked(true) @endif>Remember
                                                            Me</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" value="Login"
                                            class="btn btn-primary w-100 btn-user btn-block">

                                        <div class="d-flex my-3">
                                            <hr style="width: 48%; margin-right: 1%;">
                                            <span style="margin-top: 4px;">OR</span>
                                            <hr style="width: 48%; margin-left: 1%;">
                                        </div>
                                        <div class="mb-3">
                                            <a href="/auth/google/redirect" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a>
                                            <a href="/auth/github/redirect" class="btn btn-success btn-user btn-block"
                                                style="background-color: #09B43A">
                                                <i class="fab fa-github fa-fw"></i> Login with GitHub
                                            </a>
                                        </div>
                                        <div class="text-center">
                                            <p class="small"> Belum punya akun? <a class="medium"
                                                    href="{{ route('register.create') }}">Daftar Sekarang!</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('sb_admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
