@extends('layout.backend.main', [
'title' => 'User Admin',
'contentTitle' => 'Edit User Admin'
])
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 col-12">
        <div class="pb-3">
            <a href="/admin/user" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/admin/user/{{ $user->username }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror " id="nama" value="{{ old('nama', $user->nama) }}" required>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" onkeyup="this.value = this.value.replace(/[^a-z0-9-_.]/g, '')" value="{{ old('username', $user->username) }}" required>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isAdmin">Jadikan Sebagai Administrator</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_admin" id="is_admin1" value="0" checked>
                            <label class="form-check-label" for="is_admin1">
                                Tidak
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_admin" id="is_admin2" value="1">
                            <label class="form-check-label" for="is_admin2">
                                Ya
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
