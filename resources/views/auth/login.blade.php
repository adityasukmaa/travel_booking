<head>
    @extends('layouts.head')
    <title>TravelClass - Login</title>
    <link rel="icon" type="image/x-icon" href="img/logo_travelclass.png" />
</head>

<body class="bg-gradient-primary">

    <div class="container align-items-center justify-content-center" >

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror form-control-user"
                                                name="email" value="{{ old('email') }}" id="email" aria-describedby="emailHelp" 
                                                required autocomplete="email" autofocus placeholder="Masukkan Alamat Email...">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-user"
                                                id="password" placeholder="Password" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Masuk') }}
                                            </button>

                                            <!-- @if (Route::has('password.request'))
                                                {{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route ('password.request') }}">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route ('register') }}">Buat Akun!</a>
                                    </div>
                                </div>
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