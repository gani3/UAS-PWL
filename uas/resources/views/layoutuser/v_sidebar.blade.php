<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{asset('admin')}}/index3.html" class="brand-link">
    <img src="{{asset('admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/" class="nav-link {{ request()->is('/') ? 'active': ''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->is('peminjaman') ? 'active': '' || request()->is('peminjaman/tambah') ? 'active': ''}}">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Peminjaman
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/peminjaman" class="nav-link">
                <i class="far fa-list-alt nav-icon"></i>
                <p>Daftar Pinjaman</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/peminjaman/tambah" class="nav-link">
                <i class="far fa-plus-square nav-icon"></i>
                <p>Tambah Peminjaman</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->is('pengembalian') ? 'active': '' || request()->is('pengembalian/tambah') ? 'active': ''}}">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>
              Pengembalian
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/pengembalian" class="nav-link">
                <i class="far fa-list-alt nav-icon"></i>
                <p>Daftar Pengembalian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pengembalian/tambah" class="nav-link">
              <i class="far fa-plus-square nav-icon"></i>
                <p>Tambah Pengembalian</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->is('buku') ? 'active': '' || request()->is('buku/tambah') ? 'active': ''}}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Buku
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/buku" class="nav-link">
                <i class="far fa-list-alt nav-icon"></i>
                <p>Daftar Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/buku/tambah" class="nav-link">
              <i class="far fa-plus-square nav-icon"></i>
                <p>Tambah Buku</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->is('rakbuku') ? 'active': '' || request()->is('rakbuku/tambah') ? 'active': ''}}">
            <i class="nav-icon fas fa-border-all"></i>
            <p>
              Rak Buku
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/rakbuku" class="nav-link">
                <i class="far fa-list-alt nav-icon"></i>
                <p>Daftar Rak Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/rakbuku/tambah" class="nav-link">
                <i class="far fa-plus-square nav-icon"></i>
                <p>Tambah Rak Buku</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Menu Tambahan</li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->is('anggota') ? 'active': '' || request()->is('anggota/tambah') ? 'active': ''}}">
            <i class="nav-icon fas fa-address-book"></i>
            <p>
              Anggota
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/anggota" class="nav-link">
                <i class="far fa-list-alt nav-icon"></i>
                <p>Daftar Anggota</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/anggota/tambah" class="nav-link ">
                <i class="far fa-plus-square nav-icon"></i>
                <p>Tambah Anggota</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->is('pegawai') ? 'active': '' ||  request()->is('pegawai/tambah') ? 'active': ''}}">
            <i class="nav-icon fab fa-black-tie"></i>
            <p>
              Pegawai
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/pegawai" class="nav-link">
                <i class="far fa-list-alt nav-icon"></i>
                <p>Daftar Pegawai</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pegawai/tambah" class="nav-link">
                <i class="far fa-plus-square nav-icon "></i>
                <p>Tambah Pegawai</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">@yield('breadcrumb')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
