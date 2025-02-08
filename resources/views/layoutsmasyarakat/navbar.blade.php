<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{asset('assetss/img/cilacaplogo.png')}}" alt="">
        <h1 class="sitename">Pengaduan Masyarakat Madura</h1>
      </a>

      <nav id="navmenu" class="navmenu">
  <ul>
    <li><a href="#hero" class="active">Home</a></li>
    <li><a href="#about">Info</a></li>
    <li><a href="#services">services</a></li>
    <li><a href="#portfolio">Portfolio</a></li>
    <li><a href="#team">Team</a></li>
    <li><a href="tambah_pengaduan">create pengaduan</a></li>
    <li>
    <div id="auth-section">
    <a href="#" id="auth-btn" class="btn btn-danger btn-sm rounded-pill shadow-sm px-3 py-2 text-white fw-bold">
        Logout
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Simulasi status login (true jika sudah login, false jika belum login)
    let isLoggedIn = false;

    function updateAuthButton() {
        const authButton = document.getElementById('auth-btn');
        if (isLoggedIn) {
            authButton.textContent = 'Logout';
            authButton.classList.remove('btn-danger');
            authButton.classList.add('btn-danger');
            authButton.onclick = confirmLogout;
        } else {
            authButton.textContent = 'Login';
            authButton.classList.remove('btn-danger');
            authButton.classList.add('btn-primary');
            authButton.onclick = handleLogin;
        }
    }

    function confirmLogout() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                isLoggedIn = false;
                updateAuthButton();
                Swal.fire('Logout Berhasil!', 'Anda telah logout.', 'success');
            }
        });
    }

    function handleLogin() {
        Swal.fire({
            title: 'Selamat Datang!',
            text: 'Login berhasil.',
            icon: 'success',
            confirmButtonText: 'OK',
        }).then(() => {
            isLoggedIn = true;
            updateAuthButton();
        });
    }

    // Inisialisasi tampilan tombol berdasarkan status login
    updateAuthButton();
</script>


    </li>
  </ul>
  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>


    </div>
  </header>
