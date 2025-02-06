@extends('layoutsadmin.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Card Tambah Petugas -->
        <div class="col-md-12">
            <div class="card p-4">
                <h3 class="mb-4 text-center">Tambah Petugas</h3>
                <form action="/store/petugas" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control form-control-lg" placeholder="Masukkan NIK" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-lg" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Masukkan Username" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Masukkan Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="no_telepon" class="form-label">No HP</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-control form-control-lg" placeholder="Masukkan No HP" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-lg" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control form-control-lg" placeholder="Masukkan Alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-control form-control-lg" required>
                            <option value="petugas">petugas</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
