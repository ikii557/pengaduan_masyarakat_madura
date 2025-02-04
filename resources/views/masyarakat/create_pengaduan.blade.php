@extends('layoutsmasyarakat.data')
@section('main')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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
          <form action="/store/pegaduan" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="masyarakat_id" class="form-label fw-semibold">Nama Masyarakat</label>
                            <input type="text" value="{{old('$masyarakat')}}" name="masyarakat_id" id="masyarakat_id" class="form-control form-control-lg" placeholder="Masukkan masyarakat_id" >
                            @error('masyarakat_id')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="kategori_id" class="form-label fw-semibold">Masukan Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
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

                        <div class="col-md-6">
                            <label for="tanggal_pengaduan" class="form-label fw-semibold">Tanggal Pengaduan</label>
                            <input type="date" value="{{ old('tanggal_pengaduan') }}" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control form-control-lg" placeholder="Masukkan tanggal_pengaduan" required>
                            @error('tanggal_pengaduan')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="foto">Upload Foto (Opsional)</label>
                            <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png,image/jpg">
                            @error('foto')
                                <p class="text-danger">{{$message}}</p>
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

    </section><!-- /Contact Section -->


  </main>

@endsection
