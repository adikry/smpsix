@extends('layout.backend.main', [
'title' => 'Kefo',
'contentTitle' => 'Tambah Kefo'
])
@push('css')
<link rel="stylesheet" href="/assets/adminLTE/plugins/dropify/css/dropify.min.css">
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 col-12">
        <div class="pb-3">
            <a href="/admin/kefo" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/admin/kefo" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Kegiatan</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror " id="judul" value="{{ old('judul') }}" required>
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror " id="penulis" value="{{ old('penulis') }}" required>
                        @error('penulis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') }}" hidden>
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc_kefo">Deskripsi Kegiatan</label>
                        <textarea name="desc_kefo" class="form-control @error('desc_kefo') is-invalid @enderror" id="desc_kefo">{{ old('desc_kefo') }}</textarea>
                        @error('desc_kefo')
                        <div class="invalid-feedback">
                            {{ "Deskripsi Harus di Isi!" }}
                        </div>
                        @enderror
                    </div>
                    <input type="hidden" name="kategori_id" value="3">
                    <label for="imageMaster">Gambar Utama (Required)</label>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-8 col-12">
                            <input type="file" name="imageUtama" class="dropify" id="imageMaster" data-max-file-size="1M" data-height="250" data-allowed-file-extensions="png jpg jpeg" required />
                        </div>
                    </div>
                    <label class="mt-4">Gallery Kegiatan</label>
                    <div id="row" class="row align-items-center">
                        <div class="col-md-2 col-lg-2 col-2">
                            <input type="file" name="image[]" class="dropify" data-max-file-size="1M" data-height="70" data-allowed-file-extensions="png jpg jpeg">
                        </div>
                        <div class="col-md-6 col-lg-6 col-6">
                            <textarea name="desc[]" class="form-control" style="height: 80px;max-height:80px"></textarea>
                        </div>
                        <div class="col-md-2 col-lg-2 col-2">
                            <button type="button" class="btn btn-lg btn-primary" id="addRow" value="1"><i class="fas fa-plus-square"></i></button>
                        </div>
                    </div>
                    <div id="add" class="mb-4"></div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="/assets/adminLTE/plugins/dropify/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {

        $("#addRow").on('click', function() {
            let idVal = parseInt($(this).val());
            if (idVal < 7) {
                let rowId = idVal + 1;
                newRowAdd =
                    '<div id="row' + rowId + '" class="row align-items-center mt-2">' +
                    '<div class="col-md-2 col-lg-2 col-2">' +
                    '<input type="file" name="image[]" class="dropify" data-max-file-size="1M" data-height="70" data-allowed-file-extensions="png jpg jpeg" required>' +
                    '</div>' +
                    '<div class="col-md-6 col-lg-6 col-6">' +
                    '<textarea name="desc[]" class="form-control" style="height: 80px;max-height:80px" required></textarea>' +
                    '</div>' +
                    '<div class="col-md-2 col-lg-2 col-2"><button type="button" class="btn btn-lg btn-danger" id="DeleteRow" value="' + rowId + '"><i class="fas fa-plus-square"></i></button></div></div>';
                $("#add").append(newRowAdd);
                $(this).val(rowId);
                $(".dropify").dropify({
                    tpl: {
                        message: '<div class="dropify-message"><span class="file-icon" /> <p>Select File</p></div>'
                    }
                });
            } else {
                $("#imageKefo").modal('show');
            }
        });

        $("body").on("click", "#DeleteRow", function() {
            const idDelete = $(this).val();
            $(this).parents("#row" + idDelete).remove();
            const valueAdd = parseInt($("#addRow").val()) - 1;
            $("#addRow").val(valueAdd);
        })


        $(".dropify").dropify({
            tpl: {
                message: '<div class="dropify-message"><span class="file-icon" /> <p>Select File</p></div>'
            }
        });

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
