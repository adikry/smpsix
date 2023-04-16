@extends('layout.backend.main', [
'title' => 'Siswa',
'contentTitle' => 'Edit Jumlah Siswa'
])
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 col-12">
        <div class="pb-3">
            <a href="/admin/siswa" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/admin/siswa/{{ $siswa->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="jumlah">Jumlah Siswa</label>
                        <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror " id="jumlah" value="{{ old('jumlah', $siswa->jumlah) }}" required>
                        @error('jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
