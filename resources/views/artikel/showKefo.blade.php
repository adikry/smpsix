@extends('layout.frontend.main')
@push('css')
<link rel="stylesheet" href="/assets/vendors/fancybox/jquery.fancybox.min.css">
@endpush
@push('head')
<meta name="twitter:card" content="summary">
<meta property="og:type" content="article">
<meta property="og:site_name" content="SMPN 6 Garut">
<meta property="og:title" content="{{ $kefo->judul }}">
<meta property="og:description" content="{{ $kefo->judul }}">
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:image" content="{{ asset('storage/'. $kefo->imageUtama)}}">
<meta property="og:image:width" content="526">
<meta property="og:image:height" content="275">
<meta property="og:image:type" content="image/jpeg">
@endpush
@section('container')
<section class="news-section section-padding pt-5 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="news-block bg-white mb-5 rounded">
                    <div class="news-block-top text-center rounded shadow-sm">
                        @if ($kefo->imageUtama)
                        <img src="{{ asset('storage/' .  $kefo->imageUtama) }}" class="news-image img-fluid" alt="">
                        @else
                        <img src="/assets/images/slide/carousel-3.jpeg" class="news-image img-fluid rounded" alt="">
                        @endif
                    </div>

                    <div class="news-block-info">

                        <div class="d-flex flex-wrap justify-content-between mt-2 rounded px-1" style="background-color:#f4d9c4">
                            <div class="news-block-date">
                                <p class="my-3" style="font-size:0.85rem">
                                    <i class="bi-calendar4 custom-icon-author me-1"></i>
                                    <b>
                                        {{ date('d M Y', strtotime($kefo->published_at)) }}
                                    </b>
                                </p>
                            </div>
                            <div class="news-block-author">
                                <p class="text-right my-3" style="font-size:0.85rem">
                                    <b>
                                        <i class="bi-person custom-icon-author me-1"></i>
                                        {{ $kefo->penulis }} - {{ $kefo->kategori->nama }}</b>
                                    {{-- <a href="/linagar?rubrik={{ $kefo->kategori->slug }}"><b></b></a> --}}
                                </p>
                            </div>
                        </div>

                        <div class="news-block-title pt-3 my-3">
                            <h4 clas>{{ $kefo->judul }}</h4>
                        </div>

                        <div class="news-block-body">
                            <p>
                                {{ $kefo->desc_kefo }}
                            </p>
                            <div class="bd-layout">
                                <div class="row">
                                    @foreach ($images as $image)
                                    <a class="mb-4 col-6 col-sm-4 img-fluid" data-fancybox="gallery" data-src="{{ asset('storage/' . $image->file_image) }}" data-caption="{{ $image->desc }}">
                                        <img class="rounded img-fluid" src="{{ asset('storage/' . $image->file_image) }}" />
                                    </a>
                                    @endforeach
                                </div>
                            </div>

                            @if ($kefo->published_by)
                            <div class="d-flex justify-content-end">
                                <p class="text-muted"><small><i>Published By : {{ $kefo->published_by }}</i></small></p>
                            </div>
                            @endif


                            <div class="social-share border-top mt-2 py-4 d-flex flex-wrap align-items-center">
                                <div class="tags-block me-auto">
                                    <h5>Bagikan Ke : </h5>
                                </div>

                                <div class="d-flex">
                                    <a href="#" class="social-icon-link bi-whatsapp"></a>

                                    <a href="#" class="social-icon-link bi-twitter"></a>

                                    <a href="#" class="social-icon-link bi-envelope"></a>
                                </div>
                            </div>

                            {{-- <a href="/admin/kefo" class="my-2 btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mt-4 mt-lg-0">
                <div class="side-news-content">
                    <div class="container">
                        <img src="/assets/images/linagar.png" alt="Linagar" class="img-fluid">
                    </div>
                    <form class="custom-form search-form" action="/linagar" method="get" role="form">
                        <input class="form-control" type="text" name="keyword" placeholder="Search" aria-label="Search">

                        <button type="submit" class="form-control">
                            <i class="bi-search"></i>
                        </button>
                    </form>
                    <h5 class="mt-5 mb-3">Terbaru di Kefo</h5>
                    <div class="row">
                        @foreach ($latests as $latest)
                        <div class="news-block news-block-two-col d-flex mt-4">
                            <div class="news-block-two-col-info border-bottom">
                                <div class="news-block-title mb-2">
                                    <h6 class="fs-6">
                                        <a href="#" class="news-block-title-link">{{ $latest->judul }}</a>
                                    </h6>
                                </div>

                                <div class="news-block-date">
                                    <p>
                                        <i class="bi-calendar4 custom-icon me-1"></i>
                                        <small>{{ $latest->published_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-featured_post">

        </div>
    </div>
    </div>
</section>
@endsection
@push('js')
<script src="/assets/vendors/fancybox/jquery.fancybox.min.js"></script>
@endpush
