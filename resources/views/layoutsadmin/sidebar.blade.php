<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="index.html" class="logo">
        <img src="{{ asset('') }}assets/img/kaiadmin/cilacaplogo.png" alt="navbar brand" class="navbar-brand" height="20" />
        <span class="text-white p-1">MADURA BERCAHAYA</span>
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
  </div>

  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary active">

        <!-- Dashboard Section -->
        <li class="nav-item {{ request()->is('index') ? 'active' : '' }}">
            <a href="{{ url('index') }}" class="{{ request()->is('index') ? '' : 'collapsed' }}">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </li>

<!-- Pengaduan Section -->
        <li class="nav-item {{ request()->is('pengaduan','data_pengaduan') ? 'active' : '' }}">
            <a href="{{ url('data_pengaduan') }}">
                <i class="fas fa-comment-dots"></i>
                <p>Pengaduan</p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('data_tanggapan') ? 'active' : '' }}">
            <a href="data_tanggapan">
            <i class="fas fa-comments"></i>
                <p>Tanggapan</p>
            </a>
        </li>

        <li class="nav-item {{ request()->is('kategori', 'tambah_kategori', 'edit_kategori/*') ? 'active' : '' }}">
            <a href="{{ url('kategori') }}">
            <i class="bi bi-card-list"></i>
                <p>kategori</p>
            </a>
        </li>

        <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">data </h4>
              </li>

<!-- Admin Section -->
        <li class="nav-item {{ request()->is('admin') || request()->is('tambah_admin') || request()->is('edit_admin/*') ? 'active' : '' }}">

            <a href="{{ url('admin') }}">
                <i class="fas fa-user-shield"></i>
                <p>Admin</p>
            </a>
        </li>

<!-- Petugas Section -->
        <li class="nav-item {{ request()->is('petugas') || request()->is('tambah_petugas') || request()->is('petugas/*') ? 'active' : '' }}">

            <a href="{{ url('petugas') }}">
                <i class="fas fa-users-cog"></i>
                <p>Petugas</p>
            </a>
        </li>

<!-- Masyarakat Section -->
        <li class="nav-item {{ request()->is('masyarakat') ? 'active' : '' }}">
            <a href="{{ url('masyarakat') }}">
                <i class="fas fa-users"></i>
                <p>Masyarakat</p>
            </a>
        </li>

        <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">laporan </h4>
              </li>

        <li class="nav-item {{ request()->is('generate_laporan') ? 'active' : '' }}">
            <a href="{{ url('generate_laporan') }}">
            <i class="bi bi-journal-text"></i>
                <p>generate_laporan</p>
            </a>
        </li>


      </ul>
    </div>
  </div>
</div>
