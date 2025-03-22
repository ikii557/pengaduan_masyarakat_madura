<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        
        <!-- Logo -->
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('assetss/img/cilacaplogo.png') }}" alt="Logo">
            <h1 class="sitename">Pemasma</h1>
        </a>

        <!-- Navbar -->
        <nav id="navmenu" class="navmenu">
            <ul>
                @auth
                    <li><a href="#home" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#dataperangkatdesa">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#buatpengaduan">Contact</a></li>

                    <!-- Tombol Logout -->
                    <li>
                        <a href="#" onclick="confirmLogout();" class="btn-logout">Logout</a>
                    </li>
                @else
                    <li><a href="#home" class="active">Home</a></li>
                    <li><a class="nav-link scrollto" href="/login">Register / Login</a></li>
                @endauth
            </ul>
        </nav>

        <!-- Toggle Menu Mobile -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list" onclick="toggleMenu();"></i>
    </div>
</header>

<!-- Form Logout -->
<form id="logout-form" action="/logout" method="POST" style="display: none;">
    @csrf
</form>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmLogout() {
    Swal.fire({
        title: 'Apakah Anda yakin ingin logout?',
        text: 'Anda harus login kembali jika logout.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
}


    function toggleMenu() {
    document.getElementById('navmenu').classList.toggle('active');
}

</script>

<style>
    /* Navigasi */
    /* Navbar utama */
.navmenu {
    background-color: rgba(0, 0, 0, 0.9); /* Warna hitam transparan untuk kontras */
    border-radius: 10px;
    padding: 15px;
}

/* Daftar menu */
.navmenu ul {
    display: flex;
    align-items: center;
    gap: 20px;
    list-style: none;
    margin: 0;
    padding: 0;
}

/* Link menu */
.navmenu ul li a {
    text-decoration: none;
    color: white; /* Ubah warna teks menjadi putih agar terlihat */
    font-weight: 500;
    transition: color 0.3s;
    padding: 10px;
}

/* Efek hover */
.navmenu ul li a:hover {
    color: #ffcc00; /* Warna kuning saat hover */
}

/* Tombol Logout */
.btn-logout {
    background: linear-gradient(135deg, #ff4b4b, #ff0000);
    color: white;
    padding: 8px 15px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: bold;
    display: inline-block;
    text-align: center;
    transition: all 0.3s ease;
    width: 100%;
}

/* Hover logout */
.btn-logout:hover {
    background: linear-gradient(135deg, #ff0000, #ff4b4b);
    transform: translateY(-2px);
}

/* Tombol Toggle Menu (Mobile) */
.mobile-nav-toggle {
    font-size: 24px;
    cursor: pointer;
    display: none;
    color: white;
}

/* Tampilan Mobile */
@media (max-width: 768px) {
    .navmenu {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 60px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.95);
        width: 220px;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    .navmenu.active {
        display: flex;
    }

    .navmenu ul {
        flex-direction: column;
        gap: 15px;
    }

    .mobile-nav-toggle {
        display: block;
        position: absolute;
        top: 15px;
        right: 15px;
    }
}

</style>
