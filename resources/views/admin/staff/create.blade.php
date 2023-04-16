@extends('layout.backend.main', [
'title' => 'Staff',
'contentTitle' => 'Tambah Staff'
])
@push('css')
<link rel="stylesheet" href="/assets/adminLTE/plugins/dropify/css/dropify.min.css">
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 col-12">
        <div class="pb-3">
            <a href="/admin/staff" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/admin/staff" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror " id="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="number" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" value="{{ old('nip') }}" required>
                            @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jabatan">List Jabatan</label>
                            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" value="{{ old('jabatan') }}" required>
                            @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4 col-12">
                            <label for="foto">Foto Profil</label>
                            <input type="file" name="foto" class="dropify" id="foto" data-max-file-size="1M" data-height="250" data-allowed-file-extensions="png jpg jpeg" required />
                        </div>
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
        $(".dropify").dropify();
    });

</script>
@endpush
