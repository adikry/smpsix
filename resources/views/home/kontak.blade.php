@extends('layout.frontend.main', [
    'title' => 'Kontak - SMPN 6 Garut'
])

@push('canonical')
    <link rel="canonical" href="https://smpn6garut.com/" />
@endpush

@section('container')

<nav style="--bs-breadcrumb-divider: '>';" class="pt-5 mt-3" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb border-bottom border-top">
            <li class="breadcrumb-item my-2"><a href="/"><strong>Home</strong></a></li>
            <li class="breadcrumb-item my-2 active" aria-current="page">Kontak</li>
        </ol>
    </div>
</nav>

<section class="section-padding pt-4">
    <div class="container">
        {{-- <h5 class="fs-1 text-center mb-4 mt-3">Pelayanan SMPN 6 Garut</h5> --}}
        <div class="custom-block-wrap border shadow-lg" style="border-radius:var(--border-radius-small)">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="fs-3 text-center py-3">Pelayanan SMP 6 Garut</h5>
                    <div class="row mb-4 justify-content-center align-items-center">
                        <div class="col-md-3">
                            <img src="/assets/images/logo.png" class="img-fluid" alt="" />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <h3 class="text-color-custom px-3 fs-5">
                                    <i class="fas fa-fw fa-phone"></i>
                                </h3>
                                <h3 class="text-color-custom fs-5">
                                    Hubungi Kami : 0262 123456
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <h3 class="text-color-custom px-3 fs-5">
                                    <i class="fas fa-fw fa-envelope"></i>
                                </h3>
                                <h3 class="text-color-custom fs-5">
                                    Email : smpn6garut@email.com
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col me-5">
                            <div class="d-flex align-items-center">
                                <h3 class="text-color-custom px-3 fs-5">
                                    <i class="fas fa-fw fa-map-marker-alt"></i>
                                </h3>
                                <h3 class="text-color-custom fs-5">
                                    Jl. Bratayuda No.94, Kota Kulon, Kec. Garut Kota, Kabupaten Garut, Jawa Barat 44112
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 pe-4">
                    <h5 class="fs-3 text-center py-3">Lokasi Maps</h5>
                    <div class="row mb-4 justify-content-center align-items-center">
                        <div class="col-md-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1613.016480248153!2d107.91176754067699!3d-7.224184437996489!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68b1b5dfc9b45f%3A0xcdb0c516895db90!2sSMP%206%20Garut!5e0!3m2!1sen!2sid!4v1678469160818!5m2!1sen!2sid" height="300" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
