@extends('layout.backend.main', [
'title' => 'Dashboard',
'contentTitle' => 'Dashboard'
])
@section('content')
<div class="row">
    <div class="col-md-3 col-lg-3 col-6">
        <div class="small-box bg-gradient-info">
            <div class="inner pl-4">
                <h3>@count('artikel')</h3>
                <p>Artikel Linagar</p>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="/admin/linagar" class="small-box-footer">Detail Artikel Linagar...</a>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-6">
        <div class="small-box bg-gradient-primary">
            <div class="inner pl-4">
                <h3>@count('kefo')</h3>
                <p>Kegiatan Kefo</p>
            </div>
            <div class="icon">
                <i class="fas fa-camera-retro"></i>
            </div>
            <a href="/admin/kefo" class="small-box-footer">Detail Kegiatan Kefo...</a>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-6">
        <div class="small-box bg-gradient-success">
            <div class="inner pl-4">
                <h3>@count('guru')</h3>
                <p>Guru</p>
            </div>
            <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <a href="/admin/guru" class="small-box-footer">Detail Daftar Guru...</a>
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-6">
        <div class="small-box bg-gradient-secondary">
            <div class="inner pl-4">
                <h3>@count('staff')</h3>
                <p>Staff</p>
            </div>
            <div class="icon">
                <i class="fas fa-portrait"></i>
            </div>
            <a href="/admin/staff" class="small-box-footer">Detail Daftar Staff...</a>
        </div>
    </div>
</div>
@endsection
