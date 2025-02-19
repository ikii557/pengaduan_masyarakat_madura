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
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $pengaduans->links() }}
        </div>
    </div>
</section>


<!-- /Contact Section -->


  </main>

@endsection
