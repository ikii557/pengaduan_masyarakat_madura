@extends('layoutsadmin.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 3000); // Hide the success alert after 3 seconds
    </script>
@endif

<div class="container mt-4">
    <div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Admin</h3>
            <a href="tambah_tanggapan" class="btn btn-light btn-round">Tambah tanggapan</a>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>No Pengaduan</th>
                        <th>Tanggal Tanggapan </th>
                        <th>Tanggapan</th>
                        <th>nama petugas</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tanggapans as $index => $tanggapan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tanggapan->pengaduan->nama_kategori ?? 'Tidak Ada Data' }}</td>
                            <td>{{ $tanggapan->tanggal_tanggapan }}</td>
                            <td>{{ $tanggapan->tanggapan }}</td>

                            <td>{{ $tanggapan->petugas->nama_lengkap ?? 'Tidak Ada Data' }}</td>

                            <td>
                                <a href="/tanggapan" class="btn btn-warning btn-sm" style="height"> C</a>
                                <a href="/edit_tanggapan/{{$tanggapan->id}}"class="btn btn-sm btn-info">E</a>
                                <form action="" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus tanggapan ini?')">H</button>
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
