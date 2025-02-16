@extends('layoutsadmin.app')

@section('content')

<div class="container mt-5" id="print-section">
    <div class="card">
        <div class="card-header text-center">
            <img src="{{ asset('assets/img/kaiadmin/cilacaplogo.png') }}" alt="Cilacap Logo" style="height: 50px;" />
            <h3 class="mt-2">Laporan Pengaduan Masyarakat Madura</h3>
        </div>

        <div class="card-body">
            @forelse($pengaduans as $pengaduan)
            <div class="mb-4">
                <p>Kepada Yth: <strong>{{ $pengaduan->petugas->nama_lengkap ?? 'Tidak Ada Data Petugas' }}</strong></p>
                <p>Instansi: <strong>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data Kategori' }}</strong></p>
                <p>Di Tempat</p>
            </div>
            @empty
            <div class="alert alert-warning text-center">Tidak ada data pengaduan.</div>
            @endforelse

            <p>Dengan hormat,</p>
            <p>Berikut laporan pengaduan masyarakat:</p>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
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
                            <td>{{ $pengaduan->petugas->nama_lengkap ?? 'Belum Ditugaskan' }}</td>
                            <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                            <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Kategori' }}</td>
                            <td>{{ $pengaduan->isi_pengaduan }}</td>
                            <td>{{ ucfirst($pengaduan->status) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pengaduan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <p class="mt-4">Demikian laporan ini kami sampaikan. Terima kasih.</p>

            <div class="text-end mt-5">
                <p>Hormat Kami,</p>
                <p>{{ auth()->user()->nama }}</p>
                <p>{{ now()->format('d F Y') }}</p>
            </div>

            <div class="text-end mt-3">
                <button class="btn btn-success" onclick="window.print()">
                    <i class="fas fa-print"></i> Print Laporan
                </button>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    body {
        font-family: Arial, sans-serif;
        font-size: 12pt;
        margin: 0;
        padding: 20px;
    }

    #print-section {
        width: 100%;
        padding: 20px;
        page-break-inside: avoid;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        border: 1px solid black;
    }

    @page {
        size: A4;
        margin: 10mm;
    }

    .btn {
        display: none;
    }
}
</style>

@endsection
