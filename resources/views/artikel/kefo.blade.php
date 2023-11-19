@extends('layout.frontend.main', [
    'title' => 'KEFO - SMPN 6 Garut'
])

@push('canonical')
    <link rel="canonical" href="https://smpn6garut.com/kefo" />
@endpush

@section('container')
<section class="news-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mt-lg-0">
                <h5 class="fs-2 text-center">
                    Rubrik Kefo - (Kegiatan Foto & Video)
                </h5>
                @if (request('keyword'))
                <div class="custom-text-box shadow-lg py-3 mt-5">
                    <h4 class="fs-5 m-0">
                        Hasil Pencarian : "{{ request('keyword') }}"
                    </h4>
                </div>
                @endif


                @if ($posts->count())
                <div class="row g-3">
                    @foreach ($posts as $post)
                    <div class="col-md-4 col-lg-4 col-6">
                        <div class="custom-block-wrap border">
                            <div class="position-absolute px-2 py-1 mx-2 mt-3 rounded-pill badge-categories" style="cursor:pointer">
                                <small class="text-white">{{ $post->kategori->nama }}</small>
                            </div>
                            <div class="position-absolute px-2 badge-diff">
                                <small class="text-white">{{ date('d/M/Y', strtotime($post->published_at)) }}</small>
                            </div>
                            <a href="kefo/{{ $post->slug }}">
                                <div class="block-image">
                                    @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->imageUtama)}}" class="custom-block-image img-fluid" alt="" />
                                    @else
                                    <img src="/assets/images/slide/carousel-1.jpeg" class="custom-block-image img-fluid" alt="" />
                                    @endif
                                </div>
                                <div class="custom-block border-bottom" style="min-height:90px;max-height:90px">
                                    <div class="custom-block-body pb-0">
                                        <h5><small>{{ $post->judul }}</small></h5>
                                    </div>
                                </div>
                            </a>
                            <div class="d-flex justify-content-between align-items-center mx-2 custom-block-footer">
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
                <p class="fs-4 text-center mt-5">Sorry, No post found.</p>
                @endif
                <div class="d-flex justify-content-center mt-5 pt-3">
                    {{ $posts->links() }}
                </div>
            </div>
            <div class="col-lg-4 col-12 mx-auto mt-4 mt-lg-0">
                <form class="custom-form search-form" action="/kefo">
                    <input class="form-control" type="text" name="keyword" placeholder="Search.." aria-label="Search" />
                    <button type="submit" class="form-control">
                        <i class="bi-search"></i>
                    </button>
                </form>

                <div class="category-block d-flex flex-column">
                    <h5 class="mb-3">Kegiatan Terbaru</h5>

                    <ul class="list-group list-group-flush">
                        @foreach ($kefoLast as $kefo)
                        <div class="news-block news-block-two-col d-flex mt-4">
                            <div class="news-block-two-col-info border-bottom">
                                <div class="news-block-title mb-2">
                                    <h6 class="fs-6">
                                        <a href="#" class="news-block-title-link">{{ $kefo->judul }}</a>
                                    </h6>
                                </div>

                                <div class="news-block-date">
                                    <p>
                                        <i class="bi-calendar4 custom-icon me-1"></i>
                                        <small>{{ $kefo->published_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
