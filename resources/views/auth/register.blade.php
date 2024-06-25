<head>
    @extends('layouts.head')
    <title>TravelClass - Daftar</title>
    <link rel="icon" type="image/x-icon" href="img/logo_travelclass.png" />
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="username"
                                        @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
                                            placeholder="Username">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                    @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Email Address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user class=" form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password""
                                            id="password" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password" name="password_confirmation" placeholder="Ulangi Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" href="{{ route ('register') }}">Daftar</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route ('password.request') }}">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route ('login') }}">Sudah memiliki akun? Masuk!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @extends('layouts.script')

</body>

</html>
