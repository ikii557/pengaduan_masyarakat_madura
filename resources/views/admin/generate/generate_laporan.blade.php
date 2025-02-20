@extends('layoutsadmin.app')
@section('content')


{{-- tambahkan controller dan route untuk yang sudah di kasih comentar  --}}
<div class="col-md-12" style="margin-top: 50px;">
    <div class="card">
        <div>
            <h3 class="p-2">Generate Laporan Pengaduan Masyarakat</h3>
        </div>
        <div class="card-body">
            <!-- Filter Form -->
            <div class="mt-4">
                <form method="GET" action="{{ route('pengaduan.laporan') }}">
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-3 ">
                                <label for="start_date">Pilih Bulan</label>
                                <select class="form-control" id="start_date" name="start_date">
                                    @php
                                        $months = [
                                            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
                                            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
                                            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                                        ];
                                        $selectedMonth = request('start_date') ?? date('m');
                                    @endphp
                                    @foreach($months as $key => $month)
                                        <option value="{{ $key }}" {{ $key == $selectedMonth ? 'selected' : '' }}>
                                            {{ $month }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="end_date">Pilih Data Status</label>
                                <select class="form-control" id="end_date" name="end_date">
                                    @php
                                        $statuses = ['diproses' => 'Diproses', 'ditolak' => 'Ditolak', 'selesai' => 'Selesai'];
                                        $selectedStatus = request('end_date');
                                    @endphp
                                    @foreach($statuses as $key => $status)
                                        <option value="{{ $key }}" {{ $key == $selectedStatus ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                {{-- <a href="formulir_laporan" target="_blank" class="btn btn-light">
                                    <i class="fas fa-print"></i>
                                </a> --}}
                                <a href="{{ route('pengaduan.export', ['start_date' => request('start_date'), 'status' => request('end_date')]) }}" target="_blank" class="btn btn-light">
                                    <i class="fas fa-print"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </form>

            </div>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengaduans as $pengaduan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengaduan->masyarakat->nama_lengkap }}</td>
                                <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                                <td>{{ $pengaduan->kategori->nama_kategori }}</td>
                                <td>{{ $pengaduan->isi_pengaduan }}</td>
                                <td>{{ $pengaduan->status }}</td>
                                <td>
                                    {{-- <!-- Print Button -->
                                    <a href="{{ route('pengaduan.laporan', ['id' => $pengaduan->id]) }}" target="_blank" class="btn btn-primary">
                                        <i class="fas fa-print"></i> Generate Laporan
                                    </a> --}}

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
