@extends('layout.backend.main', [
'title' => 'Detail Kefo',
'contentTitle' => 'Detail Kefo'
])
@push('css')
<link rel="stylesheet" href="/assets/vendors/fancybox/jquery.fancybox.min.css">
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-8 col-12">
        <div class="pb-3">
            <a href="/admin/kefo" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
            <a href="/admin/kefo/{{ $kefo->slug }}/edit" class="btn btn-info"><i class="fas fa-edit fa-fw"></i> Edit</a>
            <form action="/admin/kefo/" method="post" id="formDelete" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="btn btn-danger ml-1 deleteArtikel" value="{{ $kefo->slug }}"><i class="fas fa-fw fa-trash-alt"></i> Hapus</button>
            </form>
        </div>
        <div class="news-block bg-white mb-5 rounded">
            <div class="news-block-title py-4 px-5">
                <h4 clas>{{ $kefo->judul }}</h4>
            </div>
            <div class="news-block-top text-center mx-5 rounded shadow-sm">
                @if ($kefo->imageUtama)
                <img src="{{ asset('storage/' .  $kefo->imageUtama) }}" class="news-image img-fluid" alt="">
                @else
                <img src="/assets/images/slide/carousel-3.jpeg" class="news-image img-fluid rounded" alt="">
                @endif
            </div>

            <div class="news-block-info px-5">

                <div class="d-flex justify-content-between mt-2">
                    <div class="news-block-date">
                        <p class="text-muted">
                            <i class="fas fa-calendar-alt fa-fw"></i>
                            {{ date('d/M/Y', strtotime($kefo->created_at)) }}
                        </p>
                    </div>
                    <div class="news-block-author mx-5">
                        <p class="text-muted">
                            <i class="fas fa-portrait fa-fw"></i>
                            {{ $kefo->penulis }}
                            -
                            {{ $kefo->kategori->nama }}
                        </p>
                    </div>
                </div>

                <div class="news-block-body text-justify py-3">
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

                    <a href="/admin/kefo" class="my-2 btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="/assets/vendors/fancybox/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function() {
        $("body").on('click', '.deleteArtikel', function(e) {
            e.preventDefault();

            $form = $("#formDelete")
            const artikel_slug = $(this).val();

            const formAct = $form.attr('action');
            $("#deleteModal").modal('show');

            $("#deleteModal").on("click", "#submitDelete", function() {
                $form.attr('action', formAct + artikel_slug);
                $form.submit();
            });
        });
    });

</script>
@endpush
@endsection
