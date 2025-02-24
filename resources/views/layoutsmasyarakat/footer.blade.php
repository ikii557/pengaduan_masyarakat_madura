<footer id="footer" class="footer dark-background">

<div class="container footer-top">
  <div class="row gy-4">
    <div class="col-lg-4 col-md-6 footer-about">
      <a href="index.html" class="logo d-flex align-items-center">
      <img src="{{asset('assetss/img/cilacaplogo.png')}}" alt="">
        <span class="sitename">Desa Madura</span>
      </a>
      <div class="footer-contact pt-3">
        <p>admin desa madura </p>
        <p>Kode Pos 53265</p>
        <p class="mt-3"><strong>Phone:</strong> <span>+62 831 3400 0194</span></p>
        <p><strong>Email:</strong> <span>rifkihadidanwar@gmail.com</span></p>
      </div>
      <div class="social-links d-flex mt-4">
        <a href="https://www.youtube.com/watch?v=0xehYklW26c" class="glightbox "><i class="bi bi-youtube"></i></a>
        <a href="" class="glightbox "><i class="bi bi-facebook"></i></a>
        <a href="" class="glightbox "><i class="bi bi-instagram"></i></a>
        <a href="" class="glightbox "><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4>Useful Links</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">bantuan</a></li>
        <li><a href="#">layanan</a></li>
        <li><a href="#">Persyaratan layanan</a></li>
        <li><a href="#">kebijakan Privasi</a></li>
      </ul>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4>layanan keluar</h4>
      <ul>
        <li><a href="#">lingkungan  desa</a></li>
        <li><a href="#">layanan dusun</a></li>
        <li><a href="#">layanan  daerah</a></li>
        <li><a href="#">Marketing</a></li>
        <li><a href="#">kemananan lingkungan</a></li>
      </ul>
    </div>

    <div class="col-lg-4 col-md-12 footer-newsletter">
      <h4>New news</h4>
      <p>
        Berlangganan buletin kami dan terima berita terbaru tentang produk dan layanan kami!!</p>
        <form action="forms/like_service.php" method="post" class="php-email-form">
            <div class="newsletter-form">
                <label for="email">Sukai Layanan Kami:</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                <input type="submit" value="Suka">
            </div>

            <!-- Notifikasi Status -->
            <div class="loading" style="display:none;">Memproses...</div>
            <div class="error-message" style="display:none;">Terjadi kesalahan. Coba lagi!</div>
            <div class="sent-message" style="display:none;">Terima kasih! Anda menyukai layanan kami.</div>
        </form>

    </div>

  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>Copyright</span> <strong class="px-1 sitename">Desa Madura</strong> <span>Layanan kami akan selalu di tepati</span></p>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you've purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
    Designed by <a href="https://bootstrapmade.com/">madura </a>
  </div>
</div>

</footer>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assetss/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assetss/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assetss/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assetss/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('assetss/js/main.js')}}"></script>
  <script>
  document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll(".navmenu ul li a");
    const sections = document.querySelectorAll("section");

    // Fungsi untuk mengatur link aktif
    const setActiveLink = (id) => {
      navLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href") === `#${id}`) {
          link.classList.add("active");
        }
      });
    };

    // IntersectionObserver untuk memantau bagian yang terlihat
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const id = entry.target.getAttribute("id");
            setActiveLink(id);
          }
        });
      },
      { threshold: 0.7 } // Aktif saat 70% elemen terlihat
    );

    // Observe setiap section
    sections.forEach((section) => {
      observer.observe(section);
    });

    // Event listener untuk klik navigasi
    navLinks.forEach((link) => {
      link.addEventListener("click", (e) => {
        const href = link.getAttribute("href");
        if (href.startsWith("#")) {
          e.preventDefault();
          const targetSection = document.querySelector(href);
          if (targetSection) {
            targetSection.scrollIntoView({ behavior: "smooth" });
            setActiveLink(href.substring(1));
          }
        }
      });
    });
  });
</script>

