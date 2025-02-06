@extends('layoutsadmin.app')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div>
            <h3 class="p-2 text-center">Laporan Pengaduan Masyarakat</h3>
        </div>
        <div class="card-body">
            <!-- Header Section -->
            @forelse($pengaduans as $pengaduan)
            <div class="mb-4">
                <p>Kepada Yth, <strong>{{ $pengaduan->petugas->nama_lengkap ?? 'Tidak Ada Data Petugas' }}</strong></p>
                <p>Instansi Terkait <strong>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data Kategori' }}</strong></p>
                <p>Di Tempat</p>
            </div>

            @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pengaduan</td>
                        </tr>
            @endforelse
            <p>Dengan hormat,</p>
            <p>Bersama surat ini kami laporkan data pengaduan masyarakat berdasarkan sistem yang telah diterima sebagai berikut:</p>

            <!-- Data Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Kategori</th>
                        <th>Isi Pengaduan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengaduans as $pengaduan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengaduan->petugass->nama_lengkap }}</td>
                            <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                            <td>{{ $pengaduan->kategori->nama_kategori }}</td>
                            <td>{{ $pengaduan->isi_pengaduan }}</td>
                            <td>{{ $pengaduan->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pengaduan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Conclusion -->
            <p class="mt-4">Demikian laporan ini kami sampaikan. Mohon tindak lanjut dan perhatian Bapak/Ibu. Terima kasih atas perhatiannya.</p>

            <!-- Signature Section -->
            <div class="text-end mt-5">
                <p>Hormat Kami,</p>
                <p>{{ auth()->user()->nama }}</p>
                <p>{{ now()->format('d F Y') }}</p>
            </div>

            <!-- Print Button -->
            <div class="text-end mt-3">
                <a href="{{ route('pengaduan.export') }}" class="btn btn-success">
                    <i class="fas fa-print"></i> Print Laporan
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
