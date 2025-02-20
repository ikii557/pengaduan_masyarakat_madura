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
                        <a href="formulir_laporan" target="_blank" class="btn btn-light">
                            <i class="fas fa-print"></i>
                        </a>
                        <a href="{{route('pengaduan.export')}}" target="_blank" class="btn btn-light">
                            <i class="fas fa-print"></i>
                        </a>
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
                                <td>{{ $pengaduan->masyarakat->nama_lengkap }}</td>
                                <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                                <td>{{ $pengaduan->kategori->nama_kategori }}</td>
                                <td>{{ $pengaduan->isi_pengaduan }}</td>
                                <td><a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                    <span class="badge
                                        @if($pengaduan->status == '0') bg-warning
                                        @elseif($pengaduan->status == 'diproses') bg-info
                                        @elseif($pengaduan->status == 'selesai') bg-success
                                        @elseif($pengaduan->status == 'ditolak') bg-danger
                                        @else bg-secondary
                                        @endif">
                                        {{ ucfirst($pengaduan->status) }}
                                    </span>
                                </a></td>
                                <td>

                                    <!-- Print Button -->

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
