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
                <table>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Username</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($masyarakats as $key => $masyarakat)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $masyarakat->nik }}</td>
                                <td>{{ $masyarakat->nama_lengkap }}</td>
                                <td>{{ $masyarakat->jenis_kelamin }}</td>
                                <td>{{ $masyarakat->username }}</td>
                                <td>{{ $masyarakat->no_telepon }}</td>
                                <td>{{ $masyarakat->alamat }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
