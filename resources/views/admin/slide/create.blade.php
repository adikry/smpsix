@extends('layout.backend.main', [
'title' => 'Slide',
'contentTitle' => 'Tambah Slide'
])
@push('css')
<link rel="stylesheet" href="/assets/adminLTE/plugins/dropify/css/dropify.min.css">
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 col-12">
        <div class="pb-3">
            <a href="/admin/slide" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/admin/slide" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4 col-12">
                            <label for="imageSlide">Image Slide</label>
                            <input type="file" name="imageSlide" class="dropify" id="imageSlide" data-max-file-size="2M" data-height="250" data-allowed-file-extensions="png jpg jpeg" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alt">Alt Text</label>
                        <input type="text" name="alt" class="form-control @error('alt') is-invalid @enderror " id="alt" value="{{ old('alt') }}" required>
                        @error('alt')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="urutan">Urutan</label>
                        <select class="form-control @error('urutan') is-invalid @enderror select2" name="urutan" id="urutan" style="width: 100%" required>
                            <option value="">...</option>
                            <option value="1">Pertama</option>
                            <option value="2">Kedua</option>
                            <option value="3">Ketiga</option>
                        </select>
                        @error('urutan')
                        <div class="invalid-feedback">
                            Urutan sudah ada!
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="/assets/adminLTE/plugins/dropify/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {
        $(".select2").select2();
        $(".dropify").dropify();
    });

</script>
@endpush
