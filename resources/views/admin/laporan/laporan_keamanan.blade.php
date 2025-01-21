@extends('layoutsadmin.app')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Daftar Pengaduan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID Masyarakat</th>
                        <th>ID Kategori</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($pengaduans->count())
                        @foreach($pengaduans as $key => $pengaduan)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pengaduan->masyarakat->nama ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                            <td>{{ $pengaduan->isi_pengaduan }}</td>
                            <td>
                                @if($pengaduan->foto)
                                <img src="{{ asset('assets/img/kaiadmin/cilacaplogo.png/'.$pengaduan->foto) }}" alt="Foto" width="100">
                                @else
                                <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>
                                @if($pengaduan->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($pengaduan->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                                @else
                                <span class="badge bg-secondary">Diproses</span>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada data pengaduan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
