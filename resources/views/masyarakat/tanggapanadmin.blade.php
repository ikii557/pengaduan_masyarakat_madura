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

<img src="{{asset('assetss/img/hero-carousel/depan.jpeg')}}" alt="">

<div class="container">
  <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
    <div class="col-xl-10">
      <div class="text-center">
        <h3>Laporan Pengaduan</h3>
        <p>Laporkan Pengaduan/Keluhan Anda dan harap adukan dengan masuk akal dan bisa di pahami dalam logika dan anda bisa mengisi data data dalam kolom pengisian agar kami lebih mudah memahami nya dan juga ajukan pendapat anda dengan bijak.</p>
        <a class="cta-btn" href="pengaduan">Daftar Pengaduan</a>
      </div>
    </div>
  </div>
</div>

</section><!-- /Call To Action Section -->
  <section id="create_pengaduan" class="create_pengaduan section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Daftar Tanggapan</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="card-body">
      <div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar tanggapan</h3>
        </div>
        <div class="card-body">

        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Pengaduan id</th>
                    <th>Tanggal Tanggapan</th>
                    <th>Tanggapan</th>
                    <th>Nama Petugas</th>
                    <th class="{{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">Opsi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tanggapans as $index => $tanggapan)
                    <tr>
                        <td>{{ is_numeric($index) ? $index + 1 : 1 }}</td>
                        <td>{{ $tanggapan->pengaduan->petugas->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                        <td>{{ $tanggapan->tanggal_tanggapan }}</td>
                        <td>{{ $tanggapan->tanggapan }}</td>
                        <td>{{ $tanggapan->petugas->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                        <td class="{{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">
                            <a href="/edit_tanggapan/{{ $tanggapan->id }}" class="btn btn-sm btn-info">E</a>
                            <form action="/destroy_tanggapan{{ $tanggapan->id }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus tanggapan ini?')">H</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        </div>
    </div>
</div>

      </div>

    </section><!-- /Contact Section -->


  </main>

@endsection
