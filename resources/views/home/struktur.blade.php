@extends('layout.frontend.main')
@section('container')
<nav style="--bs-breadcrumb-divider: '>';" class="pt-5 mt-3" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb border-custom">
            <li class="breadcrumb-item my-2"><a href="/">Home</a></li>
            <li class="breadcrumb-item my-2"><a href="/">Profil</a></li>
            <li class="breadcrumb-item my-2 active" aria-current="page"><strong>Struktur Organisasi</strong></li>
        </ol>
    </div>
</nav>
<section class="section-padding pt-4">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-12 col-12">
                <h4 class="text-center" style="color: var(--primary-color)">
                    STRUKTUR ORGANISASI
                </h4>
                <h4 class="mb-4 text-center" style="color: var(--primary-color)">
                    SMP NEGERI 6 GARUT
                </h4>
                <div class="custom-text-box border shadow">
                    <img src="/assets/images/struktur/struktur-organisasi.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
