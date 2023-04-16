@extends('layout.backend.main', [
'title' => 'Profile',
'contentTitle' => 'Ubah Password User'
])
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 col-12">
        <div class="pb-3">
            <a href="/admin" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
            @if (session('success'))
            <div class="row justify-content-end">
                <div class="alert bg-gradient-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif

            @if (session('error'))
            <div class="row justify-content-end">
                <div class="alert bg-gradient-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/admin/ubah-password" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="oldPassword">Password Lama</label>
                        <input type="password" name="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror " id="oldPassword" value="{{ old('oldPassword') }}" required>
                        @error('oldPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Konfirmasi Password Baru</label>
                        <input type="password" name="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror" id="confirmPassword" value="{{ old('confirmPassword') }}" required>
                        @error('confirmPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
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
