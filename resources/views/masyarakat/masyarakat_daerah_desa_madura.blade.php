@extends('layoutsmasyarakat.data')
@section('main')



  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="{{asset('assetss/img/hero-carousel/masjid.jpeg')}}" alt="">
          <div class="carousel-container">
            <h2>Pengaduan Masyarakat Madura<br></h2>
            <p>Ajukan keluhan anda selama menjadi warga desa madura wanareja</p>
            <a href="daftar_pengaduan" class="btn-get-started">Buat Laporan</a>
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="{{asset('assetss/img/hero-carousel/desa.jpg')}}" alt="">
          <div class="carousel-container">
            <h2>Desa Madura </h2>
            <p>Lakukan kinerja anda selama menjadi masyarakat madura</p>
            <a href="daftar_pengaduan" class="btn-get-started">Buat Laporan</a>
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="{{asset('assetss/img/hero-carousel/depan.jpeg')}}" alt="">
          <div class="carousel-container">
            <h2>Pengaduan Masyarakat Madura </h2>
            <p>Pengaduan ini hanyalah di bagian tempat anda jika belum mendapatkan bantuan atau belum menerima perbaikan dari kami </p>
            <a href="daftar_pengaduan" class="btn-get-started">Buat Laporan</a>
          </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    {{-- <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-5 position-relative" data-aos="fade-up" data-aos-delay="200">
            <img src="{{asset('assetss/img/about.jpg" class="img-fluid')}}" alt="">
            <a href="https://www.youtube.com/watch?v=0xehYklW26c" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-7 content ps-lg-4" data-aos="fade-up" data-aos-delay="100">
            <h3>Sekilas Seputar Desa Madura</h3>
            <p>
            Madura adalah desa di kecamatan Wanareja, Cilacap, Jawa Tengah, Indonesia. Desa ini berjarak sekitar 5,5 Km dari pusat kecamatan Wanareja dan lebih dari 85 Km dari ibu kota Kabupaten Cilacap melalui Sidareja. Desa ini merupakan salah satu desa paling barat di Jawa Tengah yang berbatasan langsung dengan Jawa Barat. Namun demikian desa ini sangat strategis karena dilintasi Jalan Nasional Rute 3 yang merupakan jalur lalu lintas utama selatan pulau jawa.
            </p>
            <ul>
              <li>
                <i class="bi bi-diagram-3"></i>
                <div>
                  <h5>Desa Madura </h5>
                  <p>Manfaatkan layanan kinerja desa madura</p>
                </div>
              </li>
              <li>
                <i class="bi bi-fullscreen-exit"></i>
                <div>
                  <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                  <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
                </div>
              </li>
              <li>
                <i class="bi bi-broadcast"></i>
                <div>
                  <h5>Voluptatem et qui exercitationem</h5>
                  <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime veniam</p>
                </div>
              </li>
            </ul>
            <p>
              Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.
            </p>
          </div>

        </div>

      </div>

    </section><!-- /About Section --> --}}

    <!-- Stats Section -->
    {{-- <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
          <div class="stats-item">
    <i class="bi bi-emoji-smile"></i>
    <span
        data-purecounter-start="0"
        data-purecounter-end="11840"
        data-purecounter-duration="3"
        data-purecounter-separator="true"
        class="purecounter">
    </span> jiwa
    <p><strong>Seluruh Penduduk</strong> <span>Desa Madura</span></p>
</div>

          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section> --}}

    <!-- Services Section -->
    {{-- <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <div><span>Check Our</span> <span class="description-title">Services</span></div>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
            <div>
              <h4 class="title">Lorem Ipsum</h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
            <div>
              <h4 class="title">Dolor Sitema</h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
            <div>
              <h4 class="title">Sed ut perspiciatis</h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="icon flex-shrink-0"><i class="bi bi-binoculars"></i></div>
            <div>
              <h4 class="title">Magni Dolores</h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
            <div class="icon flex-shrink-0"><i class="bi bi-brightness-high"></i></div>
            <div>
              <h4 class="title">Nemo Enim</h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
            <div class="icon flex-shrink-0"><i class="bi bi-calendar4-week"></i></div>
            <div>
              <h4 class="title">Eiusmod Tempor</h4>
              <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section --> --}}

    <!-- Call To Action Section -->
    {{-- <section id="call-to-action" class="call-to-action section dark-background">

      <img src="assetss/img/cta-bg.jpg" alt="">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Call To Action</h3>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a class="cta-btn" href="daftar_pengaduan">Laporakan Pengaduan</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section --> --}}

    <!-- Portfolio Section -->

    <!-- Testimonials Section -->
    <section id="dataperangkatdesa" class="testimonials section">

      <!-- Section Title -->
      {{-- <div class="container section-title" data-aos="fade-up">
        <h2>data perangkat desa</h2>
        <div><span>daftar </span> <span class="description-title">perangkat desa</span></div>
      </div><!-- End Section Title --> --}}

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonial-item">
              <img src="assetss/img/testimonials/kades.jpg" class="testimonial-img" alt="">
              <h3>NURSIDIK,S.H</h3>
              <h4>kepala desa madura &amp; pengurus desa </h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Nursidik adalah kepala desa madura yang telah menjabat dari tahun 2019-2025 dan 2025-2027 mendapatkan perpanjangan waktu jabatan dan jika sudah ada yang mencalon kan maka nursidik akan pengsiun </span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          {{-- <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="testimonial-item">
              <img src="assetss/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item --> --}}

          {{-- <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="testimonial-item">
              <img src="assetss/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item --> --}}

          {{-- <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="testimonial-item">
              <img src="assetss/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item --> --}}

          {{-- <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
            <div class="testimonial-item">
              <img src="assetss/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item --> --}}

          {{-- <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
            <div class="testimonial-item">
              <img src="assetss/img/testimonials/testimonials-6.jpg" class="testimonial-img" alt="">
              <h3>Emily Harison</h3>
              <h4>Store Owner</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Eius ipsam praesentium dolor quaerat inventore rerum odio. Quos laudantium adipisci eius. Accusamus qui iste cupiditate sed temporibus est aspernatur. Sequi officiis ea et quia quidem.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item --> --}}

        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Team Section -->
    {{-- <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <div><span>Check Our</span> <span class="description-title">Team</span></div>
      </div><!-- End Section Title -->

      <div class="container">

      <div class="row gy-4">

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
        <img src="{{ Storage::url('foto_admin/3iQSVPKvGcLQ8Y3BA6kbbDqNagLfiBcffOh6FmyQ.jpg') }}" alt="Foto Pengaduan" width="250">
            <div class="member-info">
            <div class="member-info-content">
                <h4>rifki hadid anwar</h4>
                <span>Chief Executive Officer</span>
            </div>
            <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            </div>
        </div>
        </div><!-- End Team Member -->

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="member">
        <img src="{{ Storage::url('foto_admin/0c0a3VHOJqoQoMsznTW03s6rGGtlCa7bbwKI9sQk.jpg') }}" alt="Foto Pengaduan" width="300">
            <div class="member-info">
            <div class="member-info-content">
                <h4>shela meirani</h4>
                <span>Product Manager</span>
            </div>
            <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            </div>
        </div>
        </div><!-- End Team Member -->

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="member">
        <img src="{{ Storage::url('foto_admin/3iQSVPKvGcLQ8Y3BA6kbbDqNagLfiBcffOh6FmyQ.jpg') }}" alt="Foto Pengaduan" width="250">
            <div class="member-info">
            <div class="member-info-content">
                <h4>rifki hadid anwar</h4>
                <span>CTO</span>
            </div>
            <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            </div>
        </div>
        </div><!-- End Team Member -->

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="member">
        <img src="{{ Storage::url('foto_admin/0c0a3VHOJqoQoMsznTW03s6rGGtlCa7bbwKI9sQk.jpg') }}" alt="Foto Pengaduan" width="300">
            <div class="member-info">
            <div class="member-info-content">
                <h4>shela meirani</h4>
                <span>Accountant</span>
            </div>
            <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            </div>
        </div>
        </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Team Section --> --}}
    {{-- <section id="buatpengaduan" class="create_pengaduan section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>buat Pengaduan</h2>
        <div><span>Butuh Bantuan?</span> <span class="description-title">Contact Kami</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Lokasi</h3>
                  <p>Samping Masjid agung desa madura</p>
                  <p>madura 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Perangkat Desa </h3>
                  <p>+62 8787 3233 33</p>
                  <p>+62 5656 5665 66</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Kami</h3>
                  <p>madura@example.com</p>
                  <p>madurawanareja@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Buka Dari</h3>
                  <p>Senin - Jumat</p>
                  <p>9:00AM - 15:30AM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
          <form action="/store/pengaduan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">

                        <input type="hidden" value="{{ auth()->user()->id }}" name="masyarakat_id" id="masyarakat_id">


                        </div>
                        <div class="col-md-12">
                            <label for="kategori_id" class="form-label fw-semibold">Masukan Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="{{old('kategori_id')}}">-- Pilih Kategori --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">

                        <div class="col-md-12">
                            <label for="tanggal_pengaduan" class="form-label fw-semibold">Tanggal Pengaduan</label>
                            <input type="datetime-local" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control form-control-lg" required>
                            @error('tanggal_pengaduan')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <script>
                            // Set tanggal dan waktu saat ini di input
                            document.addEventListener('DOMContentLoaded', function() {
                                const now = new Date();
                                const year = now.getFullYear();
                                const month = String(now.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
                                const day = String(now.getDate()).padStart(2, '0');
                                const hours = String(now.getHours()).padStart(2, '0');
                                const minutes = String(now.getMinutes()).padStart(2, '0');

                                const currentDatetime = `${year}-${month}-${day}T${hours}:${minutes}`;
                                document.getElementById('tanggal_pengaduan').value = currentDatetime;
                            });
                        </script>



                        <div class="col-12 mb-3">
                            <label for="foto">Upload Foto (Opsional)</label>
                            <input type="file" id="foto" name="foto" class="form-control" accept="image/png, image/jpeg, image/jpg">
                            @error('foto')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>




                    </div>


                    <div class="row mb-4">
                    <div class="col-12 mb-3">
                            <label for="isi_pengaduan">Isi Pengaduan</label>
                            <textarea name="isi_pengaduan" class="form-control" rows="6" placeholder="Deskripsi Pengaduan Anda" >{{ old('isi_pengaduan') }}</textarea>
                            @error('isi_pengaduan')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                    </div>



                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Simpan Data Laporan</button>
                    </div>
                </form>

          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section --> --}}
    {{-- <section id="create_pengaduan" class="create_pengaduan section"> --}}
    <!-- Section Title -->
    {{-- <div class="container section-title" data-aos="fade-up">
        <h2>Daftar Pengaduan</h2>
    </div><!-- End Section Title --> --}}

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="card-body">
            <div class="table-responsive">
                {{-- <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Masyarakat</th>
                            <th>Kategori Pengaduan</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th class="{{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                    @foreach ($pengaduans as $index => $pengaduan)
                        <tr>
                            <td>{{ $pengaduans->firstItem() + $index }}</td>
                            <td>{{ $pengaduan->masyarakat->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                            <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data' }}</td>
                            <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                            <td>{{ $pengaduan->isi_pengaduan }}</td>
                            <td>
                                @if ($pengaduan->foto)
                                    <img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" width="100">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td>
                                @if(in_array($pengaduan->status, ['diproses', 'selesai', 'ditolak']))
                                    <a href="/tanggapandariadmin/{{$pengaduan->id}}">
                                        <span class="badge
                                            @if($pengaduan->status == 'diproses') bg-info
                                            @elseif($pengaduan->status == 'selesai') bg-success
                                            @elseif($pengaduan->status == 'ditolak') bg-danger
                                            @endif">
                                            {{ ucfirst($pengaduan->status) }}
                                        </span>
                                    </a>
                                @else
                                    <span class="badge bg-warning">
                                        Belum Ada Respon
                                    </span>
                                @endif
                            </td>

                            @if(auth()->user()->role !== 'masyarakat')
                                <td>
                                    <a href="{{ route('admin.tanggapan.create', ['id' => $pengaduan->id]) }}" class="btn btn-warning btn-sm">c</a>
                                    <a href="/edit_pengaduan/{{$pengaduan->id}}" class="btn btn-sm btn-info mt-1">E</a>
                                    <form action="" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">H</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table> --}}
            </div>
        </div>
        {{-- <div class="d-flex justify-content-center">
            {{ $pengaduans->links() }}
        </div> --}}
    </div>
</section>


    <!-- Contact Section -->


  </main>

@endsection
