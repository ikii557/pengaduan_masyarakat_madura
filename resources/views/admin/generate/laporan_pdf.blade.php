@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan Masyarakat Madura</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .card-header h3 {
            font-size: 22px;
            font-weight: bold;
        }
        .letterhead-line {
            border-top: 2px solid #000;
            margin-top: 10px;
        }
        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
        }
        .bg-primary { background-color: #007bff; color: white; }
        .bg-danger { background-color: #dc3545; color: white; }
        .bg-warning { background-color: #ffc107; color: white; }
        .bg-success { background-color: #28a745; color: white; }
        .footer {
            text-align: right;
            margin-top: 30px;
            font-size: 14px;
        }
        @media print {
            .btn { display: none; }
        }
    </style>
</head>

<body>
    <div class="container" id="report-section">
        <div class="card">
            <div class="card-header">
                <h3>Laporan Pengaduan Masyarakat Madura</h3>
                <p>Aplikasi: <strong>MASMADU</strong></p>
                <div class="letterhead-line"></div>
            </div>

            <div class="card-body">
                <p>Berikut laporan pengaduan masyarakat:</p>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengadu</th>
                                <th>Kategori</th>
                                <th>Status Pengaduan</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Tanggapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($pengaduans as $pengaduan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pengaduan->masyarakat->nama_lengkap ?? 'Tidak Tersedia' }}</td>
                                    <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Tersedia' }}</td>
                                    <td>
                                        @if ($pengaduan->status == '0')
                                            <span class="badge bg-primary">Baru</span>
                                        @elseif ($pengaduan->status == 'ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @elseif ($pengaduan->status == 'diproses')
                                            <span class="badge bg-warning">Proses</span>
                                        @elseif ($pengaduan->status == 'selesai')
                                            <span class="badge bg-success">Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $pengaduan->tanggal_pengaduan ? \Carbon\Carbon::parse($pengaduan->tanggal_pengaduan)->format('d F Y') : 'Tanggal Tidak Tersedia' }}
                                    </td>



                                    <td>
                                        @if (optional($pengaduan->tanggapans)->isNotEmpty())
                                            @foreach ($pengaduan->tanggapans as $tanggapan)
                                                <p>
                                                    <strong>{{ $tanggapan->petugas->nama_lengkap ?? 'Petugas' }}:</strong>
                                                    {{ $tanggapan->tanggapan }}
                                                    @if ($tanggapan->tanggal_tanggapan)
                                                        <br>
                                                        <a href="{{ Storage::url($tanggapan->tanggal_tanggapan) }}" target="_blank">Lihat Bukti</a>
                                                    @endif
                                                </p>
                                            @endforeach
                                        @else
                                            <span>Belum Ada Tanggapan</span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="mt-4">Demikian laporan ini kami sampaikan. Terima kasih.</p>

                <div class="footer">
                    <p>Hormat Kami,</p>
                    <p>{{ auth()->user()->name }}</p>
                    <p>{{ now()->format('d F Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
