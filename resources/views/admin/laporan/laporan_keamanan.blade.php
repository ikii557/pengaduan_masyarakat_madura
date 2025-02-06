@extends('layoutsadmin.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 3000); // Hide the success alert after 3 seconds
    </script>
@endif

<div class="container mt-4">
    <div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Pengaduan</h3>
            <a href="tambah_pengaduan" class="btn btn-light btn-round">Tambah pengaduan</a>
        </div>
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
                        <th>Opsi</th>
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
                                <a href="/tambah_tanggapan/{{$pengaduan->id}}"><span class="badge
                                    @if($pengaduan->status == 'pending') bg-warning
                                    @elseif($pengaduan->status == 'proses') bg-info
                                    @else bg-success
                                    @endif">
                                    {{ ucfirst($pengaduan->status) }}
                                </span></a>
                            </td>
                            <td>


                                <a href="/edit_pengaduan/{{$pengaduan->id}}"class="btn btn-sm btn-info mt-1">E</a>
                                <!-- Link Penghapusan -->
                                <form action="{{ route('destroy_pengaduan', $pengaduan->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">
                                        H
                                    </button>
                                </form>



                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
