@extends('layoutsadmin.app')
@section('content')
<div class="container mt-4">
    <div>
        <p>Data masyarakat yang sudah login</p>
    </div>

    <div class="row">
        <!-- Card untuk tombol -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body d-flex justify-content-end">
                    <a href="#" class="btn btn-label-info btn-round me-2">Laporan</a>
                    <a href="tambah_masyarakat" class="btn btn-primary btn-round">Tambah Masyarakat</a>

                </div>
            </div>
        </div>

        <!-- Card untuk tabel -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Daftar masyarakat</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Username</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users->count())
                                @foreach($users as $key => $masyarakat)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $masyarakat->nik }}</td>
                                    <td>{{ $masyarakat->nama }}</td>
                                    <td>{{ ucfirst($masyarakat->jenis_kelamin) }}</td>
                                    <td>{{ $masyarakat->username }}</td>
                                    <td>{{ $masyarakat->no_telepon ?? '-' }}</td>
                                    <td>{{ $masyarakat->alamat ?? '-' }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Tidak ada data masyarakat</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
