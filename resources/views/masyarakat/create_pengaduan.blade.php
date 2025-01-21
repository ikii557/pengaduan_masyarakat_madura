@extends('layoutsmasyarakat.data')
@section('main')



  <main class="main">

  <section id="call-to-action" class="call-to-action section dark-background">

<img src="assetss/img/cta-bg.jpg" alt="">

<div class="container">
  <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
    <div class="col-xl-10">
      <div class="text-center">
        <h3>Laporan Pengaduan</h3>
        <p>Laporkan Pengaduan/Keluhan Anda dan harap adukan dengan masuk akal dan bisa di pahami dalam logika dan anda bisa mengisi data data dalam kolom pengisian agar kami lebih mudah memahami nya dan juga ajukan pendapat anda dengan bijak.</p>
        <a class="cta-btn" href="#">Buat Pengaduan</a>
      </div>
    </div>
  </div>
</div>

</section><!-- /Call To Action Section -->
  <section id="create_pengaduan" class="create_pengaduan section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Buat Pengaduan</h2>
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
          <form action="store/datapengaduan" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
                <!-- Nama -->
                <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Masukkan Nama" required>
                </div>

                <!-- NIK -->
                <div class="col-md-6">
                <input type="number" class="form-control" name="nik" placeholder="Masukkan NIK" required>
                </div>

                <!-- Kategori -->
                <div class="col-12">
                <select class="form-control" name="kategori" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="keamanan">Pengaduan Keamanan</option>
                    <option value="kebersihan">Pengaduan Kebersihan</option>
                    <option value="kelistrikan">Pengaduan Kelistrikan</option>
                    <option value="lingkungan">Pengaduan Lingkungan</option>
                </select>
                </div>

                <!-- Alamat -->
                <div class="col-12">
                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required>
                </div>

                <!-- Deskripsi Pengaduan -->
                <div class="col-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Deskripsi Pengaduan Anda" required></textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="col-12 text-center">
                <div class="loading" style="display: none;">Loading...</div>
                <div class="error-message" style="display: none; color: red;">Terjadi kesalahan saat mengirimkan formulir.</div>
                <div class="sent-message" style="display: none; color: green;">Pengaduan Anda berhasil dikirim. Terima kasih!</div>
                <button type="submit">Kirim Pengaduan</button>
                </div>
            </div>
            </form>

          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->


  </main>

@endsection
