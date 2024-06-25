<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.head')
    <title>Admin Registration</title>
</head>

<body class="bg-gradient-primary">
    
</br>
    
    <div class="container">
        
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <h1>INI ADALAH HALAMAN ADMIN TRAVEL</h1>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Logout
                                </button>
                            </form>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Admin Account</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('admin.register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username"
                                        name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        name="email" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
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


</body>
</html>