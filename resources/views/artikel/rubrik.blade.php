@extends('layout.frontend.main')
@section('container')
<section class="news-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mt-lg-0">
                @if ($artikel->count())
                <div class="row g-3">
                    @foreach ($artikel as $post)
                    <div class="col-md-4 col-lg-4 col-6">
                        <div class="custom-block-wrap border">
                            <div class="position-absolute px-2 py-1 mx-2 mt-3 rounded-pill badge-categories">
                                <a href="/linagar/rubrik/{{ $post->kategori->slug }}">
                                    <small class="text-white">{{ $post->kategori->nama }}</small>
                                </a>
                            </div>
                            <div class="position-absolute px-2 badge-diff">
                                <small class="text-white">{{ date('d/M/Y', strtotime($post->published_at)) }}</small>
                            </div>
                            <a href="/linagar/{{ $post->slug }}">
                                <div class="block-image">
                                    {{-- <img src="http://127.0.0.1:8002/assets/images/news/budi.jpeg" class="custom-block-image img-fluid" alt="" /> --}}
                                    <img src="https://source.unsplash.com/1400x900?random&{{ $post->id }}" class="custom-block-image img-fluid" alt="" />
                                </div>
                                <div class="custom-block border-bottom">
                                    <div class="custom-block-body pb-0">
                                        <h5><small>{{ $post->judul }}</small></h5>
                                    </div>
                                </div>
                            </a>
                            <div class="d-flex justify-content-between align-items-center mx-2 custom-block-footer">
                                {{-- <p class="footer-details">{{ $post->created_at->diffForHumans() }}</p> --}}
                                <p class="footer-details d-lg-block d-none">
                                    {{-- <a href="/linagar?author={{ $post->author->username }}">
                                    {{ $post->author->nama }}
                                    </a> --}}
                                    {{ $post->penulis }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="fs-4 text-center">No post found.</p>
                @endif

            </div>
            <div class="col-lg-4 col-12 mx-auto mt-4 mt-lg-0">
                <form class="custom-form search-form" action="/linagar" method="get">
                    <input class="form-control" type="text" name="keyword" placeholder="Search.." aria-label="Search" />
                    <button type="submit" class="form-control">
                        <i class="bi-search"></i>
                    </button>
                </form>

                <div class="category-block d-flex flex-column">
                    <h5 class="mb-3">Rubrik</h5>

                    <ul class="list-group list-group-flush">
                        @foreach ($kategori as $kat)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ $kat->slug }}" class="{{ ($infoCard == $kat->nama) ? "fw-bold" : "fw-normal" }}"> {{ $kat->nama }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
