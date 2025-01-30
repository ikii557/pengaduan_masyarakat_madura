@extends('layoutsadmin.app')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Daftar Pengaduan</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
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
                                    <img src="{{ asset('img/profile.jpg' . $pengaduan->foto) }}" alt="Foto Pengaduan" width="100">
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
                            <td>
                                <a href="/edit_pengaduan/{{$pengaduan->id}}"class="btn btn-sm btn-info">Edit</a>
                                <form action="" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">Hapus</button>
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
