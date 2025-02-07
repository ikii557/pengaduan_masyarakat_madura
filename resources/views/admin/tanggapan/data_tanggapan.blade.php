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
            <h3 class="card-title mb-0">Daftar tanggapan</h3>
            <a href="tambah_tanggapan" class="btn btn-light btn-round">Tambah tanggapan</a>
        </div>
        <div class="card-body">

        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Pengaduan id</th>
                    <th>Tanggal Tanggapan</th>
                    <th>Tanggapan</th>
                    <th>Nama Petugas</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tanggapans as $index => $tanggapan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tanggapan->pengaduan->petugas->nama_lengkap ?? 'Tidak Ada Data' }}</td> <!-- No pengaduan -->
                        <td>{{ $tanggapan->tanggal_tanggapan }}</td>
                        <td>{{ $tanggapan->tanggapan }}</td>
                        <td>{{ $tanggapan->petugas->nama_lengkap ?? 'Tidak Ada Data' }}</td> <!-- Nama petugas -->
                        <td>


                            <a href="/edit_tanggapan/{{ $tanggapan->id }}" class="btn btn-sm btn-info">E</a>
                            <form action="/destroy_tanggapan{{ $tanggapan->id }}" method="POST" style="display: inline-block;">
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
