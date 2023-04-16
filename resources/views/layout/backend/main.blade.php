<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMPN 6 - {{ $title ?? '' }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/adminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/adminLTE/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/assets/adminLTE/plugins/select2/css/select2.min.css">
    <script src="/assets/adminLTE/plugins/jquery/jquery.min.js"></script>
    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layout.backend.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout.backend.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid px-4">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">{{ $contentTitle ?? '' }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <hr class="rounded" style="border: 1.5px solid rgba(255, 85, 28, 0.2)">
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Modal -->
            @include('layout.backend.logout')
            @include('layout.backend.delModal')
            @include('layout.backend.modalImage')
            @include('layout.backend.modalPublish')
            @include('layout.backend.modalIsPublished')

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }}</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <a href="https://www.instagram.com/entitasofficial/" target="_blank" class="text-muted"><small>SMPN 6 Garut</small></a>
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

    <!-- jQuery UI 1.11.4 -->
    <script src="/assets/adminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="/assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/assets/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/adminLTE/plugins/select2/js/select2.full.min.js"></script>
    <script src="/assets/adminLTE/dist/js/adminlte.js"></script>
    @stack('js')
</body>
</html>
