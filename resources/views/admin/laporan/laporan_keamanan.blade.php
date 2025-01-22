@extends('layoutsadmin.app')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Daftar Pengaduan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID Masyarakat</th>
                        <th>ID Kategori</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <!--  -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
