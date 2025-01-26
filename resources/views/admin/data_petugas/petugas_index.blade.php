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
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>No Telepon</th>
                        <th>Role</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugass as $index => $petugas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $petugas->nama_petugas }}</td>
                            <td>{{ $petugas->username }}</td>
                            <td>{{ $petugas->no_hp }}</td>
                            <td>{{ $petugas->role }}</td>
                            <td>
                            <a href="/edit_petugas/{{$petugas->id}}" class="btn btn-info btn-sm">Edit</a>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus petugas ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
