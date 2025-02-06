@extends('layoutsadmin.app')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div>
            <h3 class="p-2">Generate Laporan Pengaduan Masyarakat</h3>
        </div>
        <div class="card-body">
            <!-- Filter Form -->
            <form method="GET" action="{{ route('pengaduan.laporan') }}">
                <div class="row">
                    <div class="col-md-3">
                        <label for="start_date">Tanggal Awal</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="end_date">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            <!-- Laporan Table -->
            <div class="mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelapor</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Kategori</th>
                            <th>Deskripsi Pengaduan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengaduans as $pengaduan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengaduan->petugas->nama_lengkap }}</td>
                                <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                                <td>{{ $pengaduan->kategori->nama_kategori }}</td>
                                <td>{{ $pengaduan->isi_pengaduan }}</td>
                                <td>{{ $pengaduan->status }}</td>
                                <td>
                                    <!-- Print Button -->
                                    <a href="formulir_laporan/{{ $pengaduan->id}}" target="_blank" class="btn btn-light">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data pengaduan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
