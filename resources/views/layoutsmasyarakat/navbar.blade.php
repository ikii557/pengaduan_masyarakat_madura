<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{asset('assetss/img/cilacaplogo.png')}}" alt="">
        <h1 class="sitename">Pengaduan Masyarakat Madura</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul style="display: flex; align-items: center; gap: 5px; list-style: none; margin: 0; padding: 0;">
            @auth
                <!-- Jika sudah login, tampilkan semua menu -->
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#dataperangkatdesa">Portfolio</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#buatpengaduan">Contact</a></li>

                <!-- Tombol Logout dengan Tampilan Menarik -->
                <li>
                    <a href="#" onclick="confirmLogout();" class="btn-logout">Logout</a>
                </li>
            @else
                <!-- Jika belum login, tampilkan Home dan Register/Login -->
                <li><a href="#home" class="active">Home</a></li>
                <li><a class="nav-link scrollto" href="/login">Register / Login</a></li>
            @endauth
        </ul>

        <!-- Toggle untuk Menu di Mobile -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <script>
        // Konfirmasi Logout
        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin logout?")) {
                window.location.href = "{{ route('logout') }}";
            }
        }
    </script>

    <style>
        /* Membuat Menu Sejajar */
        #navmenu ul {
            display: flex;
            align-items: center;
            gap: 20px; /* Jarak antar menu */
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /* Style untuk Link Menu */
        #navmenu ul li a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: color 0.3s;
        }

        /* Tombol Logout dengan Tampilan Menarik */
        .btn-logout {
    background: linear-gradient(50deg, #ff4b4b, #ff0000);
    color: white;
    padding: 2px 2px; /* Ukuran padding yang proporsional */
    border-radius: 20px; /* Sudut yang lebih halus */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Shadow lebih lembut */
    text-decoration: none; /* Hilangkan garis bawah */
    font-size: 14px; /* Ukuran teks yang sesuai */
    font-weight: 500; /* Ketebalan teks sedang */
    display: inline-block; /* Pastikan tombol sesuai konten */
    transition: all 0.3s ease;
}

/* Efek hover agar tombol lebih interaktif */
.btn-logout:hover {
    background: linear-gradient(135deg, #ff0000, #ff4b4b);
    transform: translateY(-2px);
}


        /* Efek Hover pada Tombol Logout */
        .btn-logout:hover {
            background: linear-gradient(135deg, #ff0000, #ff4b4b);
            transform: translateY(-2px); /* Tombol naik sedikit saat hover */
        }

        /* Gaya untuk Icon Toggle di Mobile */
        .mobile-nav-toggle {
            font-size: 24px;
            cursor: pointer;
        }
    </style>


    
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
