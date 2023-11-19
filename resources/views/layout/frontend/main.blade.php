<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="SMP Negeri 6 Garut merupakan Sekolah Menengah Pertama yang berlokasi di Jl. Bratayuda No.94, Kec. Garut Kota, Kabupaten Garut, Jawa Barat 44112 " />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @stack('canonical')

    <title>{{ $title }}</title>

    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/adminLTE/plugins/fontawesome-free/css/all.min.css">
    {{-- CDN Bootstrap ICON --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/assets/css/template.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    @stack('head')
    @stack('css')
    <style>
        .pagination {
            color: var(--primary-color) !important;
        }

    </style>

</head>
<body>
    @include('layout.frontend.navbar')
    @yield('container')
    @include('layout.frontend.footer')
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> --}}
    {{-- <script src="assets/js/jquery.sticky.js"></script> --}}
    <script src="/assets/js/counter.js"></script>
    <script src="/assets/js/custom.js"></script>
    @stack('js')
</body>
</html>
