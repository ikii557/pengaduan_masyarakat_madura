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
        <h2>buat Pengaduan</h2>
        <div><span>Butuh Bantuan?</span> <span class="description-title">Contact Kami</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="card-body">

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
    @foreach ($pengaduans as $index => $pengaduan)
    <tr>
        <td>{{ $index + 1 }}</td>
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
            <span class="badge
                @if($pengaduan->status == 'pending') bg-warning
                @elseif($pengaduan->status == 'proses') bg-info
                @else bg-success
                @endif">
                {{ ucfirst($pengaduan->status) }}
            </span>
        </td>

        @if(auth()->user()->role !== 'masyarakat')
            <td>
                <a href="{{ route('admin.tanggapan.create', ['id' => $pengaduan->id]) }}" class="btn btn-warning btn-sm">c</a>
                <a href="/edit_pengaduan/{{$pengaduan->id}}"class="btn btn-sm btn-info mt-1">E</a>
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

    </section><!-- /Contact Section -->


  </main>

@endsection
