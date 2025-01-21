@extends('layoutsadmin.app')

@section('content')


<div class="col-md-12">
            <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
    <h3 class="card-title mb-0">Daftar Petugas</h3>
    <a href="tambah_petugas" class="btn btn-light btn-round">Tambah Petugas</a>
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
                                <th>Role</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($petugas as $key => $petugas)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $petugas->nik }}</td>
                                    <td>{{ $petugas->nama }}</td>
                                    <td>{{ ucfirst($petugas->jenis_kelamin) }}</td>
                                    <td>{{ $petugas->username }}</td>
                                    <td>{{ $petugas->no_telepon ?? '-' }}</td>
                                    <td>{{ $petugas->alamat ?? '-' }}</td>
                                    <td>{{ $petugas->role ?? '_' }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>




@endsection
