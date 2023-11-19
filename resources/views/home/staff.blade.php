@extends('layout.frontend.main', [
    'title' => 'Staff - SMPN 6 Garut'
])

@push('canonical')
    <link rel="canonical" href="https://smpn6garut.com/" />
@endpush

@section('container')

<nav style="--bs-breadcrumb-divider: '>';" class="pt-5 mt-3" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb border-custom">
            <li class="breadcrumb-item my-2"><a href="/">Home</a></li>
            <li class="breadcrumb-item my-2"><a href="/">Profil</a></li>
            <li class="breadcrumb-item my-2 active" aria-current="page"><strong>Staff</strong></li>
        </ol>
    </div>
</nav>

<section class="section-padding pt-4">
    <div class="container">
        <h5 class="fs-1 text-center mb-4 mt-3">Daftar Staff SMPN 6 Garut</h5>
        <div class="row g-3">
            @foreach ($dataStaff as $staff)
            <div class="col-lg-3 col-md-3 col-6">
                <div class="custom-block-wrap border">
                    <div class="block-image" style="max-height:330px;min-height:330px;padding:15px">
                        @if ($staff->foto)
                        <img src="{{ asset('storage/') . '/' . $staff->foto}}" class="custom-block-image img-fluid rounded" alt="" />
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#96949461" class="bi bi-image-alt" viewBox="0 0 16 16">
                            <path d="M7 2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0zm4.225 4.053a.5.5 0 0 0-.577.093l-3.71 4.71-2.66-2.772a.5.5 0 0 0-.63.062L.002 13v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4.5l-4.777-3.947z" />
                        </svg>
                        @endif
                    </div>
                    <div class="custom-block border-bottom" style="min-height: 75px;max-height:75px">
                        <div class="custom-block-body pb-0">
                            <h5><small>{{ $staff->nama }}</small></h5>
                            <h5><small>Jabatan : {{ $staff->jabatan }}</small></h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $dataStaff->links() }}
        </div>
    </div>
</section>

@endsection
