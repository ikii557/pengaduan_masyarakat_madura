<div class="sidebar" data-background-color="dark">
<div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="index.html" class="logo">
        <img
          src="assets/img/kaiadmin/cilacaplogo.png"
          alt="navbar brand"
          class="navbar-brand"
          height="20"
        />
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
    <!-- End Logo Header -->
</div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <!-- Menu Dashboard -->
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
          <a href="/">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
            <p class="nav-item container mt-4" style="color: #bbb; font-weight: bold; padding-left: 20px;">Data</p>

        <!-- Data Pengaduan Section -->
        <li class="nav-item {{ Request::is('components/*') ? 'active' : '' }}">
          <a data-bs-toggle="collapse" href="#base"
             aria-expanded="{{ Request::is('keamanan') || Request::is('components/*') ? 'true' : 'false' }}"
             data-parent="#sidebar-menu">
            <i class="fas fa-layer-group"></i>
            <p>Data Pengaduan</p>
            <span class="caret"></span>
          </a>
          <div class="collapse {{ Request::is('keamanan') || Request::is('components/*') ? 'show' : '' }}" id="base">
            <ul class="nav nav-collapse">
              <li class="{{ Request::is('keamanan') ? 'active' : '' }}">
                <a href="{{ url('laporan') }}">
                  <span class="sub-item">Pengaduan Keamanan</span>
                </a>
              </li>
              <li class="{{ Request::is('kebersihan') ? 'active' : '' }}">
                <a href="{{ url('kebersihan') }}">
                  <span class="sub-item">Pengaduan Kebersihan</span>
                </a>
              </li>
              <li class="{{ Request::is('kelistrikan') ? 'active' : '' }}">
                <a href="{{ url('kelistrikan') }}">
                  <span class="sub-item">Pengaduan Kelistrikan</span>
                </a>
              </li>
              <li class="{{ Request::is('lingkungan') ? 'active' : '' }}">
                <a href="{{ url('lingkungan') }}">
                  <span class="sub-item">Pengaduan Lingkungan</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <!-- Data Petugas Section -->
        <!-- <li class="nav-item {{ Request::is('petugas_*') ? 'active' : '' }}">
          <a data-bs-toggle="collapse" href="#sidebarLayouts"
             aria-expanded="{{ Request::is('petugas_*') ? 'true' : 'false' }}"
             data-parent="#sidebar-menu">
            <i class="fas fa-th-list"></i>
            <p>Data Petugas</p>
            <span class="caret"></span>
          </a>
          <div class="collapse {{ Request::is('petugas_*') ? 'show' : '' }}" id="sidebarLayouts">
            <ul class="nav nav-collapse">
              <li class="{{ Request::is('petugas_keamanan') ? 'active' : '' }}">
                <a href="petugas_keamanan">
                  <span class="sub-item">Petugas Keamanan</span>
                </a>
              </li>
              <li class="{{ Request::is('petugas_pln') ? 'active' : '' }}">
                <a href="petugas_pln">
                  <span class="sub-item">Petugas PLN</span>
                </a>
              </li>
              <li class="{{ Request::is('petugas_kebersihan') ? 'active' : '' }}">
                <a href="petugas_kebersihan">
                  <span class="sub-item">Petugas Kebersihan</span>
                </a>
              </li>
              <li class="{{ Request::is('petugas_lingkungan') ? 'active' : '' }}">
                <a href="petugas_lingkungan">
                  <span class="sub-item">Petugas Lingkungan</span>
                </a>
              </li>
            </ul>
          </div>
        </li> -->
            <p class="nav-item container" style="color: #bbb; font-weight: bold; padding-left: 20px;">Profile</p>

        <!-- Profile Section -->
        <li class="nav-item {{ Request::is('forms/*') || Request::is('profile') ? 'active' : '' }}">
  <a data-bs-toggle="collapse" href="#forms"
     aria-expanded="{{ Request::is('forms/*') || Request::is('profile') ? 'true' : 'false' }}"
     data-parent="#sidebar-menu">
    <i class="fas fa-pen-square"></i>
    <p>Profile</p>
    <span class="caret"></span>
  </a>
  <div class="collapse {{ Request::is('forms/*') || Request::is('profile') ? 'show' : '' }}" id="forms">
    <ul class="nav nav-collapse">
      <li class="{{ Request::is('forms/admin') ? 'active' : '' }}">
        <a href="admin">
          <span class="sub-item">Admin</span>
        </a>
      </li>
      <li class="{{ Request::is('forms/petugas') ? 'active' : '' }}">
        <a href="petugas">
          <span class="sub-item">Petugas</span>
        </a>
      </li>
      <li class="{{ Request::is('profile') ? 'active' : '' }}">
        <a href="/profile">
          <span class="sub-item">Masyarakat</span>
        </a>
      </li>
    </ul>
  </div>
</li>


      </ul>
    </div>
  </div>
</div>
