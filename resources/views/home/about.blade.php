@extends('layout.frontend.main')

@section('container')

<nav style="--bs-breadcrumb-divider: '>';" class="pt-5 mt-3" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb border-custom">
            <li class="breadcrumb-item my-2"><a href="/">Home</a></li>
            <li class="breadcrumb-item my-2"><a href="/">Profil</a></li>
            <li class="breadcrumb-item my-2 active" aria-current="page"><strong>Tentang Kami</strong></li>
        </ol>
    </div>
</nav>

<section class="section-padding pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>Membangun Sekolah yang Literat: Dari Lisan ke Tulisan</h2>
                <p>Selamat datang di web SMPN 6 Garut. Web ini tidak hanya sebagai media informasi terkait dengan berbagai hal tentang sekolah, tetapi juga sebagai wahana membangun warga sekolah yang literat. Pada web ini ada majalah Linagar (Liputan Enam Garut) sebagai tempat warga sekolah mengekpresikan hasil karya kreatifnya berupa liputan sekolah dan luar sekolah (Lilah), prestasi siswa (Tasiswa), kegiatan, foto, dan video (Kefo), berita alumni (Beni), cerita mendidik (Cerdik), siswa menulis (Walis), dan guru menulis (Gulis).
                </p>
            </div>
            <div class="col-md-4 m-auto">
                <img src="/assets/images/logo.png" class="img-fluid" width="80%" alt="#">
            </div>
        </div>
    </div>
</section>

<section class="section-padding section-bg" id="section_2">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-lg-12 col-12">
                    <h2 class="mb-4 text-center" style="color: var(--white-color)">
                        Visi & Misi
                    </h2>
                    <div class="custom-text-box">
                        <h5 class="mb-3">Visi</h5>
                        <p class="mb-2">
                            Visi Sekolah adalah imajinasi moral yang dijadikan dasar
                            atau rujukan dalam menentukan tujuan atau keadaan masa depan
                            sekolah yang secara khusus diharapkan oleh Sekolah. Visi
                            Sekolah merupakan turunan dari Visi Pendidikan Nasional,
                            yang dijadikan dasar atau rujukan untuk merumuskan Misi,
                            Tujuan sasaran untuk pengembangan sekolah dimasa depan yang
                            diimpikan dan terus terjaga kelangsungan hidup dan
                            perkembangannya.
                        </p>
                        <p class="mb-2">
                            Adapun visi SMP Negeri 6 Garut :
                            <strong>“TERWUJUDNYA INSAN BERTAQWA , BERKARAKTER SERTA UNGGUL
                                ILMU PENGETAHUAN, TEKNOLOGI, DAN SENI”</strong>
                        </p>
                        <p>
                            Dengan branding sekolah <strong>“ABADI”</strong> dari
                            akronim
                            <strong>“AMANAH,BERTANGGUNG JAWAB,DISIPLIN”.</strong>
                        </p>
                    </div>

                    <div class="custom-text-box mb-lg-0">
                        <h5 class="mb-3">Misi</h5>

                        <p class="mb-1">
                            Adapun misi untuk mewujudkan SMP Negeri 6 Garut sebagai
                            sekolah yang realitas adalah sebagai berikut :
                        </p>
                        <p class="mb-1">Mewujudkan peserta didik yang :</p>
                        <ul class="custom-list mt-2">
                            <li class="custom-list-item d-flex">
                                • Taat Beribadah kepada Tuhan Yang Maha Esa.
                            </li>

                            <li class="custom-list-item d-flex">
                                • Memiliki kompetensi keagamaan yang cukup sebagai dasar
                                keimanan diri
                            </li>
                            <li class="custom-list-item d-flex">
                                • Berkarakter Karimah dalam Kehidupan
                            </li>
                            <li class="custom-list-item d-flex">
                                • Disiplin diri yang tinggi dalam kehidupan sehari hari
                            </li>
                            <li class="custom-list-item d-flex">
                                • Memiliki kecerdasan dan keterampilan dalam bidang iptek
                            </li>
                            <li class="custom-list-item d-flex">
                                • Memiliki semangat kompetitif yang tinggi dalam bidang
                                iptek
                            </li>
                        </ul>
                        <p>
                            Meningkatkan dan menumbuhkan sikap silih asih, silih asuh,
                            silih asah di antara warga sekolah melalui penghayatan pada
                            nilai-nilai tradisional serta menata etika sopan santun
                            sehingga menjadi sumber kearifan dalam bertindak.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <h2 class="text-center">Struktur Organisasi</h2>
        <div class="d-flex justify-content-center">
            <img src="/assets/images/struktur/struktur-organisasi.png" class="img-fluid" alt="">
        </div>
    </div>
</section>

@endsection
