<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TravelClass</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ url('Frontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('Frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('Frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('Frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('Frontend/css/style.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <div>
            <!-- Responsive navbar-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div>
                            <a class="navbar-brand">
                                <span style="color: #166527;">TRAVEL</span><b style="color: #1A3724;">CLASS</b>
                            </a>
                        </div>
                        <ul class="navbar-nav ms-auto mb-lg-0">
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->is('cek-reservasi') ? 'active' : '' }}" href="{{ url('/cek-reservasi') }}">Cek Reservasi</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('kebijakan') ? 'active' : '' }}" href="{{ route('kebijakan') }}">Kebijakan</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('tentang-kami') ? 'active' : '' }}" href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                            <li class="nav-item"><a class="nav">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        Logout
                                    </button>
                                </form></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Content Start -->
        @yield('content')
        <!-- Content End -->

        <!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6 col-md-6">
                <h5 class="text-white mb-4">Kontak Kami</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jalan Raya Lohbener Lama No. 08, Lohbener - Indramayu, Indonesia</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 897-4787-185</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>travelclass@gmail.com</p>
                </div>
            <div class="col-lg-6 col-md-6">
                <h5 class="text-white mb-4">Tautan Cepat</h5>
                <a class="btn btn-link text-white-50" href="{{ route ('tentang-kami') }}">Tentang Kami</a>
                <a class="btn btn-link text-white-50" href="">Kontak Kami</a>
                <a class="btn btn-link text-white-50" href="">Layanan Kami</a>
                <a class="btn btn-link text-white-50" href="">Kebijakan Privasi</a>
                <a class="btn btn-link text-white-50" href="">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-12 text-center">
                    &copy; <a class="border-bottom" href="{{ route ('home') }}">TravelClass</a>, Semua Hak Dilindungi.
                    <br>
                    Dirancang Oleh <a class="border-bottom" href="#">Sepuh Corporate</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
