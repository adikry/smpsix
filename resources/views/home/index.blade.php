@extends('layout.frontend.main', [
    'title' => 'SMPN 6 Garut - Membangun Sekolah yang Literat'
])

@push('canonical')
    <link rel="canonical" href="https://smpn6garut.com/" />
@endpush

@section('container')
<main>
    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="container">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="carousel-content text-center">
                                    <h3>Selamat Datang di Website</h3>
                                    <h1 class="pt-3">SMPN 6 Garut</h1>
                                    <h4 class="mt-3"><i>Membangun Sekolah yang Literat</i></h4>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-inner">
                            @foreach ($heros as $hero)
                            <div class="carousel-item @if($hero->urutan == 1) active @endif">
                                <img src="{{ asset('storage/' . $hero->imageSlide) }}" class="carousel-image img-fluid" alt="..." />
                            </div>
                            @endforeach
                            {{-- <div class="carousel-item">
                                <img src="/assets/images/slide/carousel-2.jpeg" class="carousel-image img-fluid" alt="..." />
                            </div>

                            <div class="carousel-item">
                                <img src="/assets/images/slide/carousel-3.jpeg" class="carousel-image img-fluid" alt="..." />
                            </div> --}}
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h2 class="mb-5">SMP Negeri 6 Garut</h2>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <img src="assets/images/icons/hands.png" class="featured-block-image img-fluid" alt="" />
                        <p class="featured-block-text"><strong>A</strong>manah</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <img src="assets/images/icons/heart.png" class="featured-block-image img-fluid" alt="" />
                        <p class="featured-block-text">
                            <strong>B</strong>ertanggung Jawab
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <img src="assets/images/icons/receive.png" class="featured-block-image img-fluid" alt="" />
                        <p class="featured-block-text"><strong>D</strong>isiplin</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding section-bg" id="section_2">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-12 col-12">
                        <h2 class="mb-4 text-center" style="color: var(--white-color)">
                            Visi & Misi
                        </h2>
                        <div class="custom-text-box">
                            <h5 class="mb-3">Visi</h5>
                            <p class="mb-2">
                                Visi Sekolah adalah imajinasi moral yang dijadikan dasar
                                atau rujukan dalam menentukan tujuan atau keadaan masa depan
                                sekolah yang secara khusus diharapkan oleh Sekolah. Visi
                                Sekolah merupakan turunan dari Visi Pendidikan Nasional,
                                yang dijadikan dasar atau rujukan untuk merumuskan Misi,
                                Tujuan sasaran untuk pengembangan sekolah dimasa depan yang
                                diimpikan dan terus terjaga kelangsungan hidup dan
                                perkembangannya.
                            </p>
                            <p class="mb-2">
                                Adapun visi SMP Negeri 6 Garut :
                                <strong>“TERWUJUDNYA INSAN BERTAQWA , BERKARAKTER SERTA UNGGUL
                                    ILMU PENGETAHUAN, TEKNOLOGI, DAN SENI.”</strong>
                            </p>
                            <p>
                                Dengan branding sekolah <strong>“ABADI”</strong> dari
                                akronim
                                <strong>“AMANAH,BERTANGGUNG JAWAB,DISIPLIN”.</strong>
                            </p>
                        </div>

                        <div class="custom-text-box mb-lg-0">
                            <h5 class="mb-3">Misi</h5>

                            <p class="mb-1">
                                Adapun misi untuk mewujudkan SMP Negeri 6 Garut sebagai
                                sekolah yang realitas adalah sebagai berikut :
                            </p>
                            <p class="mb-1">Mewujudkan peserta didik yang :</p>
                            <ul class="custom-list mt-2">
                                <li class="custom-list-item d-flex">
                                    • Taat Beribadah kepada Tuhan Yang Maha Esa.
                                </li>

                                <li class="custom-list-item d-flex">
                                    • Memiliki kompetensi keagamaan yang cukup sebagai dasar
                                    keimanan diri
                                </li>
                                <li class="custom-list-item d-flex">
                                    • Berkarakter Karimah dalam Kehidupan
                                </li>
                                <li class="custom-list-item d-flex">
                                    • Disiplin diri yang tinggi dalam kehidupan sehari hari
                                </li>
                                <li class="custom-list-item d-flex">
                                    • Memiliki kecerdasan dan keterampilan dalam bidang iptek
                                </li>
                                <li class="custom-list-item d-flex">
                                    • Memiliki semangat kompetitif yang tinggi dalam bidang
                                    iptek
                                </li>
                            </ul>
                            <p>
                                Meningkatkan dan menumbuhkan sikap silih asih, silih asuh,
                                silih asah di antara warga sekolah melalui penghayatan pada
                                nilai-nilai tradisional serta menata etika sopan santun
                                sehingga menjadi sumber kearifan dalam bertindak.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row gx-4 gy-4">
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Berita Terbaru</h2>
                </div>

                {{-- LOOP BERITA --}}
                @foreach ($artikels as $artikel)
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="custom-block-wrap border">
                        <div class="position-absolute px-2 py-1 mx-2 mt-3 rounded-pill badge-categories">
                            <a href="/linagar?rubrik={{ $artikel->kategori->slug }}">
                                <small class="text-white">{{ $artikel->kategori->nama }}</small>
                            </a>
                        </div>
                        <a href="/linagar/{{ $artikel->slug }}">
                            <div class="block-image">
                                @if ($artikel->image)
                                <img src="{{ asset('storage/') . '/' . $artikel->image}}" class="custom-block-image img-fluid" alt="{{ $artikel->judul }}" />
                                @else
                                <img src="/assets/images/slide/carousel-1.jpeg" class="custom-block-image img-fluid" alt="" />
                                @endif
                            </div>
                            <div class="custom-block border-bottom">
                                <div class="custom-block-body pb-0">
                                    <h5>{{ $artikel->judul }}</h5>
                                </div>
                            </div>
                        </a>
                        <div class="d-flex justify-content-between align-items-center mx-2 custom-block-footer">
                            <p class="footer-details">
                                @if ($artikel->published_at)
                                {{-- {{ $post->published_at->diffForHumans() }} --}}
                                {{ $artikel->published_at->diffForHumans() }}
                                @endif
                            </p>
                            <p class="footer-details d-lg-block d-none">
                                {{-- <a href="#">
                                    {{ $artikel->author->nama }}
                                </a> --}}
                                {{ $artikel->penulis }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <a href="/linagar" class="btn custom-btn shadow py-2 mt-5">Lihat Semua</a>
            </div>
        </div>
    </section>


    <section class="cta-section section-padding section-bg">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 col-12 ms-auto">
                    <h2 class="mb-0" style="color:var(--primary-color);">
                        Bertaqwa, Berkarakter <br />
                        Unggul IPTEK & Seni
                    </h2>
                </div>

                <div class="col-lg-5 text-end d-lg-block d-none">
                    <img src="assets/images/logo.png" alt="logo SMPN 6 Garut" class="img-fluid" style="width: 30%" />
                </div>
            </div>
        </div>
    </section>

    <section class="volunteer-section section-padding" id="section_4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <h2 class="mb-4 text-center mb-0">Data Pokok Sekolah</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-lg-3 col-4">
                        <div class="custom-block-body text-center">
                            <h4 class="mt-lg-3 mb-lg-3">Siswa</h4>
                            <div class="counter-thumb">
                                <span class="counter-number" data-from="1" data-to="{{ $siswa->jumlah }}" data-speed="1000"></span>
                                <span class="counter-number-text"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-4">
                        <div class="custom-block-body text-center">
                            <h4 class="mt-lg-3 mb-lg-3">Guru</h4>
                            <div class="counter-thumb">
                                <span class="counter-number" data-from="1" data-to="{{ $guru }}" data-speed="1000"></span>
                                <span class="counter-number-text"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-4">
                        <div class="custom-block-body text-center">
                            <h4 class="mt-lg-3 mb-lg-3">Staff</h4>
                            <div class="counter-thumb">
                                <span class="counter-number" data-from="1" data-to="{{ $staff }}" data-speed="1000"></span>
                                <span class="counter-number-text"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
