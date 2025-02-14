<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{asset('assetss/img/cilacaplogo.png')}}" alt="">
        <h1 class="sitename">Pengaduan Masyarakat Madura</h1>
      </a>

      <nav id="navmenu" class="navmenu">
      <ul>
        @auth
            <!-- Jika sudah login, tampilkan semua menu -->
            <li><a href="/dashboard_masyarakat" class="active">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#dataperangkatdesa">Portfolio</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#buatpengaduan">Contact</a></li>
            <li>
                <img src="" alt="">
                <a href="#" onclick="confirmLogout();" class="dropdown-item text-danger">Logout</a>
            </li>
        @else
            <!-- Jika belum login, hanya tampilkan Home dan Login/Register -->
            <li><a href="/dashboard_masyarakat" class="active">Home</a></li>
            <li>
                <a class="nav-link scrollto" href="/login">Register / Login</a>
            </li>
        @endauth
    </ul>

<script>
    function confirmLogout() {
        if (confirm("Apakah Anda yakin ingin logout?")) {
            window.location.href = "{{ route('logout') }}";
        }
    }
</script>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>


    </div>
  </header>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                    function confirmLogout() {
                        Swal.fire({
                        title: 'Apakah Anda yakin ingin logout? jika anda logout anda harus login kembali ',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Logout',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logout-form').submit();
                        }
                        });
                    }
                    </script>

                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                    </form>
