<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/assets/images/logo.png" alt="laravel Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light font-weight-bold">SMPN 6</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="{{ asset('img/icons') }}/codeigniter4.png" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                {{-- <a href="#" class="d-block">{{ auth()->user()->name }}</a> --}}
                {{-- <a href="#" class="d-block">Nama</a> --}}
                <p class="d-block mb-0">{{ auth()->user()->nama }}</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    {{-- <a href="{{ route('admin.index') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}"> --}}
                    <a href="/admin" class="nav-link {{ Request::is('admin') ? "active" : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MANAGE DATA</li>
                <li class="nav-item">
                    <a href="/admin/linagar" class="nav-link {{ Request::is('admin/linagar*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Linagar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/kefo" class="nav-link {{ Request::is('admin/kefo*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Rubrik Kefo
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/list-kategori" class="nav-link {{ Request::is('admin/list-kategori') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            List Kategori Rubrik
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/siswa" class="nav-link {{ Request::is('admin/siswa*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Siswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/guru" class="nav-link {{ Request::is('admin/guru*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Guru
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/staff" class="nav-link {{ Request::is('admin/staff*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-portrait"></i>
                        <p>
                            TAS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/slide" class="nav-link {{ Request::is('admin/slide*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Slider Image
                        </p>
                    </a>
                </li>
                @can('admin')
                <li class="nav-header">ADMINISTRATOR</li>
                <li class="nav-item">
                    <a href="/admin/kategori" class="nav-link {{ request::is('admin/kategori*') ? "active" : "" }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Kategori Rubrik (Admin)
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/user" class="nav-link {{ request::is('admin/user*') ? "active" : "" }}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            User Admin
                        </p>
                    </a>
                </li>
                @endcan
                <li class="nav-header">PENGATURAN</li>
                <li class="nav-item">
                    <a href="/admin/ubah-password" class="nav-link {{ Request::is('admin/ubah-password*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-unlock-alt"></i>
                        <p>
                            Ubah Password
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
