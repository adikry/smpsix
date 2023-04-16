@extends('layout.backend.main', [
'title' => 'Detail Linagar',
'contentTitle' => 'Detail Linagar'
])
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-8 col-12">
        <div class="pb-3">
            <a href="/admin/linagar" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
            <a href="/admin/linagar/{{ $artikel->slug }}/edit" class="btn btn-info"><i class="fas fa-edit fa-fw"></i> Edit</a>
            <form action="/admin/linagar/" method="post" id="formDelete" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="btn btn-danger ml-1 deleteArtikel" value="{{ $artikel->slug }}"><i class="fas fa-fw fa-trash-alt"></i> Hapus</button>
            </form>
            @can('admin')
            @if ($artikel->published_at)
            <button type="button" class="btn btn-primary ml-1 isPublished" value="{{ $artikel->judul }}"><i class="fas fa-fw fa-check"></i></button>
            @else
            <form action="/admin/linagar/publish?" id="formPublish" class="d-inline">
                @csrf
                <input type="hidden" value="{{ $artikel->slug }}" name="slug">
                <button type="button" class="btn btn-default ml-1 publishArtikel" value="{{ $artikel->slug }}"><i class="fas fa-fw fa-ellipsis-h"></i> Publish</button>
            </form>
            @endif
            @endcan
        </div>
        <div class="news-block bg-white mb-5 rounded shadow-lg">
            <div class="news-block-title py-4 px-5">
                <h4 clas>{{ $artikel->judul }}</h4>
            </div>
            <div class="news-block-top text-center px-5">
                @if ($artikel->image)
                <img src="{{ asset('storage/') .'/'. $artikel->image }}" class="news-image img-fluid" alt="">
                @else
                <img src="/assets/images/slide/carousel-3.jpeg" class="news-image img-fluid" alt="">
                @endif
            </div>

            <div class="news-block-info px-5">
                <div class="d-flex justify-content-between mt-2">
                    <div class="news-block-date">
                        <p class="text-muted">
                            <i class="fas fa-calendar-alt fa-fw"></i>
                            {{ date('d/M/Y', strtotime($artikel->published_at)) }}
                        </p>
                    </div>
                    <div class="news-block-author mx-5">
                        <p class="text-muted">
                            <i class="fas fa-portrait fa-fw"></i>
                            {{ $artikel->penulis }}
                            -
                            {{ $artikel->kategori->nama }}
                        </p>
                    </div>
                </div>

                <div class="news-block-body text-justify">
                    {!! $artikel->body !!}
                </div>

                <div class="row mt-5 mb-4">
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 text-center">
                        @if ($artikel->optional1)
                        <img src="{{ asset('storage/') . '/' . $artikel->optional1 }}" class="news-detail-image img-fluid" alt="">
                        @else
                        <img src="/assets/images/slide/carousel-1.jpeg" class="news-detail-image img-fluid" alt="">
                        @endif
                    </div>

                    <div class="col-lg-6 col-12">
                        @if ($artikel->optional2)
                        <img src="{{ asset('storage/') . '/' . $artikel->optional2 }}" class="news-detail-image img-fluid" alt="">
                        @else
                        <img src="/assets/images/slide/carousel-2.jpeg" class="news-detail-image img-fluid" alt="">
                        @endif
                    </div>
                </div>
                <a href="/admin/linagar" class="my-2 btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
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

    $("body").on('click', '.publishArtikel', function(e) {
        e.preventDefault();
        $form = $("#formPublish")
        const valueId = $(this).val();
        const action = $form.attr('action');
        $("#publishModal").modal('show');
        console.log($form);

        $("#publishModal").on('click', "#confirm", function() {
            $form.attr('action', action + valueId);
            $form.submit();
        });
    });

    $("body").on('click', '.isPublished', function(e) {
        e.preventDefault();
        $("#isPublished").modal('show');
    })

</script>
@endpush

@endsection
