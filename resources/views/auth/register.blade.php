<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb_admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{ route('register.store') }}" method="POST" class="user">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="nama_petugas"
                                            class="form-control form-control-user @error('nama_petugas') is-invalid @enderror"
                                            id="exampleInputEmail" placeholder="Nama" autocomplete="off" value="{{ old('nama_petugas') }}">
                                        @error('nama_petugas')
                                            <p class="login-box-msg error invalid-feedback"
                                                style="font-size: 15px; color: red;">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="username"
                                            class="form-control form-control-user @error('username') is-invalid @enderror"
                                            id="exampleFirstName" placeholder="Username" autocomplete="off" value="{{ old('username') }}">
                                        @error('username')
                                            <p class="login-box-msg error invalid-feedback"
                                                style="font-size: 15px; color: red;">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="exampleFirstName" placeholder="Email" autocomplete="off" value="{{ old('email') }}">
                                        @error('email')
                                            <p class="login-box-msg error invalid-feedback"
                                                style="font-size: 15px; color: red;">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="exampleFirstName" placeholder="Password" autocomplete="off" value="{{ old('password') }}">
                                        @error('password')
                                            <p class="login-box-msg error invalid-feedback"
                                                style="font-size: 15px; color: red;">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <input type="submit" value="Register" class="btn btn-primary w-100">
                            </form>
                            <hr>
                            <div class="text-center">
                                <p class="small">Sudah punya akun?<a href="{{ route('auth.login') }}"> Login
                                        sekarang!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb_admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb_admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb_admin2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
