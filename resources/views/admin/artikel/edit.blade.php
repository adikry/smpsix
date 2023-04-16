@extends('layout.backend.main', [
'title' => 'Linagar',
'contentTitle' => 'Edit Linagar'
])
@push('css')
<link rel="stylesheet" href="/assets/adminLTE/plugins/trix/css/trix.css">
<link rel="stylesheet" href="/assets/adminLTE/plugins/dropify/css/dropify.min.css">
<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }

</style>
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 col-12">
        <div class="pb-3">
            <a href="/admin/linagar" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/admin/linagar/{{ $artikel->slug }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Artikel Linagar</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror " id="judul" value="{{ old('judul', $artikel->judul) }}" required>
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror " id="penulis" value="{{ old('penulis', $artikel->penulis) }}" required>
                        @error('penulis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug', $artikel->slug) }}" required hidden>
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control select2" name="kategori_id" id="kategori" style="width: 100%">
                            <option value="">...</option>
                            @foreach ($kategori as $kat)
                            <option value="{{ $kat->id }}" {{ (old('kategori_id', $artikel->kategori_id) == $kat->id) ? "selected" : "" }}>{{ $kat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-4 col-12">
                            <input type="hidden" name="oldImage" value="{{ $artikel->image }}">
                            <label for="imageMaster">Gambar Utama (Required)</label>
                            <input type="file" name="image[]" class="dropify" id="imageMaster" @if($artikel->image) data-default-file="{{ asset('storage/') . "/" . $artikel->image }}" @endif data-max-file-size="1M" data-height="250" data-allowed-file-extensions="png jpg jpeg" />
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <label for="optional1">Gambar 2 (Optional)</label>
                            <input type="hidden" name="oldOptional1" value="{{ $artikel->optional1 }}">
                            @error('image[1]')
                            {{ $message }}
                            @enderror
                            <input type="file" class="dropify" name="image[]" id="optional1" data-max-file-size="1M" data-height="250" data-allowed-file-extensions="png jpg jpeg" />
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <label for="optional2">Gambar 3 (Optional)</label>
                            <input type="hidden" name="oldOptional2" value="{{ $artikel->optional2 }}">
                            <input type="file" class="dropify" id="optional2" name="image[]" data-max-file-size="1M" data-height="250" data-allowed-file-extensions="png jpg jpeg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        @error('body')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="body" type="hidden" name="body" value="{{ old('body', $artikel->body) }}">
                        <trix-editor input="body"></trix-editor>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="/assets/adminLTE/plugins/trix/js/trix.umd.min.js"></script>
<script src="/assets/adminLTE/plugins/dropify/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {
        $(".select2").select2();
        $(".dropify").dropify();
    });

    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener('change', function() {
        fetch('/admin/linagar/checkSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

</script>
@endpush

@endsection
