@extends('layoutsmasyarakat.data')
@section('main')



  <main class="main">

  <section id="call-to-action" class="call-to-action section dark-background">

<img src="{{asset('assetss/img/hero-carousel/depan.jpeg')}}" alt="">

<div class="container">
  <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
    <div class="col-xl-10">
      <div class="text-center">
        <h3>Laporan Pengaduan</h3>
        <p>Laporkan Pengaduan/Keluhan Anda dan harap adukan dengan masuk akal dan bisa di pahami dalam logika dan anda bisa mengisi data data dalam kolom pengisian agar kami lebih mudah memahami nya dan juga ajukan pendapat anda dengan bijak.</p>
        <a class="cta-btn" href="/dashboard_masyarakat">tambah Pengaduan</a>
      </div>
    </div>
  </div>
</div>

</section><!-- /Call To Action Section -->

<section id="create_pengaduan" class="create_pengaduan section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Daftar Pengaduan</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="card-body">
            <div class="table-responsive">

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" id="success-alert">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" id="error-alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <script>
                    // Sembunyikan notifikasi otomatis setelah 5 detik (5000 ms)
                    setTimeout(function() {
                        document.getElementById('success-alert')?.classList.add('d-none');
                        document.getElementById('error-alert')?.classList.add('d-none');
                    }, 5000);
                </script>

                <style>
                    /* Container untuk memusatkan notifikasi di tengah */
                    .alert {
                        position: fixed;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        z-index: 9999; /* Di atas konten lain */
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                        padding: 20px 40px; /* Tambahan padding agar terlihat lebih baik */
                        border-radius: 12px; /* Membuat sudut melengkung */
                        max-width: 80%; /* Batas lebar agar responsif */
                        text-align: center; /* Teks rata tengah */
                        animation: fadeIn 0.5s ease;
                    }

                    /* Animasi fade-in untuk efek muncul halus */
                    @keyframes fadeIn {
                        from {
                            opacity: 0;
                            transform: translate(-50%, -60%);
                        }
                        to {
                            opacity: 1;
                            transform: translate(-50%, -50%);
                        }
                    }
                </style>


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
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tanggapan->pengaduan->masyarakat->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                    <td>{{ $tanggapan->tanggal_tanggapan }}</td>
                    <td>{{ $tanggapan->tanggapan }}</td>
                    <td>{{ $tanggapan->petugas->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                    <td class="{{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">
                        <a href="/edit_tanggapan/{{ $tanggapan->id }}" class="btn btn-sm btn-info">E</a>
                        <form action="/destroy_tanggapan/{{ $tanggapan->id }}" method="POST" style="display: inline-block;">
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
</section>


<!-- /Contact Section -->


  </main>

@endsection


