@extends('layoutsadmin.app')

@section('content')

<div class="container mt-5" id="print-section">
    <div class="card">
        <!-- Header Laporan -->
        <div class="card-header text-center d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/kaiadmin/cilacaplogo.png') }}" alt="Cilacap Logo" class="img-fluid me-3" style="height: 50px;" />
            <h3 class="mb-0">Laporan Pengaduan Masyarakat Madura</h3>
        </div>

        <div class="card-body">
            <!-- Header Section -->
            @forelse($pengaduans as $pengaduan)
            <div class="mb-4">
                <p>Kepada Yth: <strong>{{ $pengaduan->petugas->nama_lengkap ?? 'Tidak Ada Data Petugas' }}</strong></p>
                <p>Instansi Terkait: <strong>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data Kategori' }}</strong></p>
                <p>Di Tempat</p>
            </div>
            @empty
            <div class="alert alert-warning text-center">Tidak ada data pengaduan.</div>
            @endforelse

            <p>Dengan hormat,</p>
            <p>Bersama surat ini kami laporkan data pengaduan masyarakat berdasarkan sistem yang telah diterima sebagai berikut:</p>

            <!-- Data Table -->
            <div class="table-responsive mt-3">
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
                <button class="btn btn-success" onclick="printCard()">
                    <i class="fas fa-print"></i> Print Laporan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Print Script -->
<script>
    function printCard() {
        const printContents = document.getElementById('print-section').innerHTML;
        const originalContents = document.body.innerHTML;

        // Replace body content with the card for print
        document.body.innerHTML = printContents;

        window.print();

        // Restore original content after printing
        document.body.innerHTML = originalContents;
        window.location.reload(); // Ensure the page layout is restored
    }
</script>

<!-- Print and Layout Styles -->
<style>
    @media print {
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        font-size: 12pt;
        line-height: 1.5;
    }

    #print-section {
        width: 100%;
        margin: 0;
        padding: 20px;
        page-break-inside: avoid;
    }

    .card {
        page-break-inside: avoid;
    }

    /* Atur agar tabel dan konten laporan memenuhi halaman cetak */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    /* Hapus margin default halaman cetak */
    @page {
        size: A4;
        margin: 10mm;
    }

    /* Sembunyikan semua elemen non-cetak */
    body *:not(#print-section) {
        display: none;
    }
}

@media only screen and (max-width: 200px) {
    table {
        font-size: 12px;
    }

    .card-header img {
        max-width: 30px;
        height: auto;
    }
}

</style>

@endsection
