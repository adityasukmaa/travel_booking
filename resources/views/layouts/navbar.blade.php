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
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('cek-reservasi') ? 'active' : '' }}" href="{{ route('cek-reservasi') }}">Cek Reservasi</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('kebijakan') ? 'active' : '' }}" href="{{ route('kebijakan') }}">Kebijakan</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('tentang-kami') ? 'active' : '' }}" href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>