@extends('layout.frontend.main')

@push('head')
<meta name="twitter:card" content="summary">
<meta property="og:type" content="article">
<meta property="og:site_name" content="SMPN 6 Garut">
<meta property="og:title" content="{{ $artikel->judul }}">
<meta property="og:description" content="{{ $artikel->judul }}">
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:image" content="{{ asset('storage/'. $artikel->image)}}">
<meta property="og:image:width" content="526">
<meta property="og:image:height" content="275">
<meta property="og:image:type" content="image/jpeg">
@endpush

@section('container')
<section class="news-section section-padding pt-5 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">

                <div class="news-block">
                    <div class="news-block-top text-center">
                        @if ($artikel->image)
                        <img src="{{ asset('storage/'.$artikel->image)}}" class="news-image img-fluid" alt="">
                        @else
                        <img src="/assets/images/slide/carousel-1.jpeg" class="news-image img-fluid" alt="">
                        @endif
                    </div>
                </div>
                {{-- {{ asset('storage/'.$artikel->image) }} --}}
                <div class="news-block-info">
                    <div class="d-flex flex-wrap justify-content-between mt-2 rounded px-1" style="background-color:#f4d9c4">
                        <div class="news-block-date">
                            <p class="my-3" style="font-size:0.85rem">
                                <i class="bi-calendar4 custom-icon-author me-1"></i>
                                <b>
                                    {{ date('d M Y', strtotime($artikel->published_at)) }}
                                </b>
                            </p>
                        </div>
                        <div class="news-block-author">
                            <p class="text-right my-3" style="font-size:0.85rem">

                                {{-- <a href="/linagar?author={{ $artikel->author->username }}">{{ $artikel->author->nama }}</a> --}}
                                <b>
                                    <i class="bi-person custom-icon-author me-1"></i>
                                    {{ $artikel->penulis }}</b>
                                -
                                <a href="/linagar?rubrik={{ $artikel->kategori->slug }}"><b>{{ $artikel->kategori->nama }}</b></a>
                            </p>
                        </div>
                    </div>

                    <div class="news-block-title my-3 pt-3">
                        <h4>{{ $artikel->judul }}</h4>
                    </div>

                    <div class="news-block-body text-justify">
                        {!! $artikel->body !!}
                    </div>

                    <div class="row mt-5 mb-4">
                        <div class="col-lg-6 col-12 mb-4 mb-lg-0 text-center">
                            @if ($artikel->optional1)
                            <img src="{{ asset('storage/') .'/'. $artikel->optional1 }}" class="news-detail-image img-fluid" alt="">
                            @else
                            <img src="/assets/images/slide/carousel-2.jpeg" class="news-detail-image img-fluid" alt="">
                            @endif
                        </div>

                        <div class="col-lg-6 col-12">
                            @if ($artikel->optional2)
                            <img src="{{ asset('storage/') .'/'. $artikel->optional2 }}" class="news-detail-image img-fluid" alt="">
                            @else
                            <img src="/assets/images/slide/carousel-1.jpeg" class="news-detail-image img-fluid" alt="">
                            @endif
                        </div>
                    </div>

                    @if ($artikel->published_by)
                    <div class="mt-4 d-flex justify-content-end">
                        <p class="mb-1" style="font-size:0.88rem"><i>Dimuat oleh : {{ $artikel->published_by }}</i></p>
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
                    <div class="category-block d-flex flex-column">
                        <h5 class="mb-3">Rubrik</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($kategori as $kat)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/linagar?rubrik={{ $kat->slug }}" class="fw-semibold">{{ $kat->nama }}</a>
                            </li>
                            @endforeach
                        </ul>

                    </div>

                    <h5 class="mt-5 mb-3">Terbaru</h5>
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
