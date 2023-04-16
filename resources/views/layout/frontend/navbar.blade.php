<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 d-lg-block">
                <ul class="social-icon">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-facebook"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-instagram"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-youtube"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-envelope"></a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-8 d-none d-sm-block d-flex flex-wrap">
                <p class="me-4 mb-0 float-end">
                    <i class="bi-geo-alt me-2"></i>
                    Jl. Bratayuda No.94, Kec. Garut Kota, Kabupaten Garut, Jawa Barat 44112
                </p>
            </div>
        </div>
    </div>
</header>
<nav class="navbar sticky-top navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/images/SMP 6.png" class="logo img-fluid" alt="SMPN 6 Garut" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{  Request::is('/') ? "active" : "" }}" href="/">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  {{  Request::is('profil*') ? "active" : "" }}" href="#" role="button" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ Request::is('profil/about') ? "active" : "" }}" href="/profil/about"> Tentang Kami</a></li>
                        <li><a class="dropdown-item {{ Request::is('profil/sejarah') ? "active" : "" }}" href="/profil/sejarah"> Sejarah</a></li>
                        <li><a class="dropdown-item {{ Request::is('profil/visi-misi') ? "active" : "" }}" href="/profil/visi-misi"> Visi & Misi</a></li>
                        <li><a class="dropdown-item {{ Request::is('profil/guru') ? "active" : "" }}" href="/profil/guru"> Guru</a></li>
                        <li><a class="dropdown-item {{ Request::is('profil/staff') ? "active" : "" }}" href="/profil/staff"> Staff</a></li>
                        <li><a class="dropdown-item {{ Request::is('profil/struktur-organisasi') ? "active" : "" }}" href="/profil/struktur-organisasi"> Struktur Organisasi</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kefo*') ? "active" : "" }}" href="/kefo">Galeri Kegiatan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('linagar*') ? "active" : "" }}" href="/linagar">Linagar</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('ppdb*') ? "active" : "" }}" href="">PPDB</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kontak') ? "active" : "" }}" href="/kontak">Kontak</a>
                </li>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="text-center my-2"><i class="bi bi-person-circle"></i> {{ auth()->user()->nama }}</li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/admin"><i class="bi bi-grid-1x2"></i> Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-in-left"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" style="padding:20px 0" href="/login"><span class="rounded text-white p-2" style="background:var(--primary-color)">Login</span></a>
                </li>
                @endauth
                <!-- <li class="nav-item ms-3">
                    <a class="nav-link custom-btn custom-border-btn btn" href="donate.html">Donate</a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>
