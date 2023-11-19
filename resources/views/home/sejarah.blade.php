@extends('layout.frontend.main', [
    'title' => 'Sejarah - SMPN 6 Garut'
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
            <li class="breadcrumb-item my-2 active" aria-current="page"><strong>Sejarah</strong></li>
        </ol>
    </div>
</nav>
<section class="section-padding pt-4">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 col-12">
                <h4 class="text-center" style="color: var(--primary-color)">
                    SEJARAH SINGKAT
                </h4>
                <h4 class="mb-4 text-center" style="color: var(--primary-color)">
                    SMP NEGERI 6 GARUT
                </h4>
                <div class="custom-text-box border shadow">
                    <p class="mb-2">
                        Pada Awalnya sekolah ini didirikan pada tahun 1979, berdasarkan keputusan Menteri P dan K RI No 030/U7 bernama ST Negeri II Garut yang bertempat di Jl. RSU No. 3 Garut . Pada Tahun 1980 berganti nama menjadi SMP Negeri VII Garut dan berpindah lokasi di Jalan Bratayuda Talun , Kelurahan Kota Kulon Kecamatan Garut Kota Kabupaten Garut.
                    </p>
                    <p class="mb-2">
                        Pada tahun 1997 Kandepdikbud Kabupaten Garut mengeluarkan SK perubahan Nama sekolah yang berdasar pada SK Kemendikbud Nomor : 034,035,036/1997, nama dari SMP Negeri 7 Garut menjadi <strong>SLTP Negeri 6 Garut</strong> yang selanjutnya terintegritas menjadi <strong>SMP Negeri 6 Garut</strong>.
                    </p>
                    <p class="mb-2">
                        Sejalan dengan perkembangan jaman SMP Negeri 6 Garut menata diri menuju :
                        <ul>
                            <li>Sekolah Berwawasan Lingkungan Hidup</li>
                            <li>Sekolah Berwawasan Budi Pekerti</li>
                            <li>Sekolah Standar Nasional</li>
                            <li>Sekolah Percontohan Kantin Sehat</li>
                            <li>Sekolah Percontohan Pendidikan Agama dan Akhlaq Mulia</li>
                            <li>Sekolah Penggerak</li>
                        </ul>
                    </p>
                    <p class="mb-2">
                        Kepemimpinan Kepala Sekolah SMP Negeri 6 Garut Telah Mengalami beberapa kali pergantian sebagai berikut :
                        <ul style="list-style-type: decimal">
                            <li>Saleh Wirasaswita (tahun 1979 – tahun 1986)</li>
                            <li>H. Dayat (tahun 1986 – tahun 1990)</li>
                            <li>Komar BA (tahun 1990 – tahun 1993)</li>
                            <li>Umbil BA (tahun 1993 – tahun 1997)</li>
                            <li>H. Juju Juariah (tahun 1997 – tahun 2000)</li>
                            <li>Drs. Sofian (tahun 2000 – tahun 2005)</li>
                            <li>Cholid Jawawi Bsc, S.Pd (tahun 2005 – tahun 2008)</li>
                            <li>Drs. H. Eutik (tahun 2008 - tahun 2009)</li>
                            <li>Drs. H. Deden. S (tahun 2009 – tahun 2012)</li>
                            <li>Somantri, M.Pd (tahun 2013 – tahun 2014)</li>
                            <li>Asep Gungun, S.Pd.,M.Pd (tahun 2014 – tahun 2015)</li>
                            <li>H. Herman, S.Pd, M.Pd (tahun 2015 – tahun 2019)</li>
                            <li>Darsono,S.Pd.,M.Pd (tahun 2019 – tahun 2022)</li>
                            <li>Dr. H . Budi Suhardiman,M.Pd (tahun 2022 sampai sekarang)</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
