<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan madura</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Header Styles */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h3 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 16px;
            color: #555;
            margin: 0;
        }

        .letterhead-line {
            border-top: 2px solid #000;
            margin: 15px 0;
        }

        /* Body Styles */
        p {
            font-size: 14px;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        table th {
            background-color: #f7f7f7;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Badge Styles */
        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            color: #fff;
        }

        .bg-primary {
            background-color: #007bff;
        }

        .bg-danger {
            background-color: #dc3545;
        }

        .bg-warning {
            background-color: #ffc107;
        }

        .bg-success {
            background-color: #28a745;
        }

        /* Footer Styles */
        .footer {
            text-align: right;
            margin-top: 30px;
            font-size: 14px;
        }

        .footer p {
            margin: 5px 0;
        }

        /* Print Styles */
        @media print {
            .btn {
                display: none;
            }

            .container {
                box-shadow: none;
                max-width: 100%;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container" id="report-section">
        <div class="header">
            <h3>Laporan Pengaduan Masyarakat Madura</h3>
            <p>Aplikasi: <strong>PeMasMA</strong></p>
            <div class="letterhead-line"></div>
        </div>

        <p>Berikut laporan pengaduan masyarakat:</p>

        <table>
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
                    <td>{{ $pengaduan->created_at->format('d F Y') }}</td>
                    <td>
                        @if ($pengaduan->tanggapans && $pengaduan->tanggapans->isNotEmpty())
                        @foreach ($pengaduan->tanggapans as $tanggapan)
                        <p><strong>{{ $tanggapan->petugas->nama_lengkap ?? 'Petugas Tidak Tersedia' }}:</strong> {{ $tanggapan->tanggapan }}</p>
                        @endforeach
                        @else
                        <span>Belum Ada Tanggapan</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="mt-4">Demikian laporan ini kami sampaikan. Terima kasih.</p>

        <div class="footer">
            <p>Hormat Kami,</p>
            <p>{{ auth()->user()->name }}</p>
            <p>{{ now()->format('d F Y') }}</p>
        </div>
    </div>
</body>

</html>
