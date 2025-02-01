@extends('layoutsadmin.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Card Tambah Admin -->
        <div class="col-md-10">
            <div class="card p-5 shadow-lg rounded-4">
                <h3 class="mb-4 text-center fw-bold">Tambah Admin</h3>
                <hr>
                <form action="/store/admin" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="nik" class="form-label fw-semibold">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control form-control-lg" placeholder="Masukkan NIK" required>
                            @error('nik')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-lg" placeholder="Masukkan Nama Lengkap" required>
                            @error('nama_lengkap')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-lg" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Masukkan Username" required>
                            @error('username')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Masukkan Password" required>
                            @error('password')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="no_hp" class="form-label fw-semibold">No HP</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control form-control-lg" placeholder="Masukkan No HP" required>
                            @error('no_hp')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="alamat" class="form-label fw-semibold fs-5">Alamat</label> <!-- Menambahkan kelas fs-5 untuk ukuran font lebih besar -->
                            <input type="text" name="alamat" id="alamat" class="form-control form-control-lg" placeholder="Masukkan Alamat" required>
                            @error('alamat')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="role" class="form-label fw-semibold">Role</label>
                            <select name="role" id="role" class="form-control form-control-lg" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                                <option value="masyarakat">Masyarakat</option>
                            </select>
                            @error('role')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Simpan Data Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
