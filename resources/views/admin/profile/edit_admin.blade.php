@extends('layoutsadmin.app')
@section('content')
    <!-- Card Edit Petugas -->
    <div class="col-md-12">
        <div class="card p-4">
            <h3 class="mb-4 text-center">Edit Admin</h3>
            <form action="/update/admin/{{ $admins->id }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input
                            type="text"
                            name="nik"
                            id="nik"
                            class="form-control form-control-lg"
                            placeholder="Masukkan NIK"
                            value="{{ $admins->nik }}"
                            required maxlength="16">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input
                            type="text"
                            name="nama_lengkap"
                            id="nama_lengkap"
                            class="form-control form-control-lg"
                            placeholder="Masukkan Nama Lengkap"
                            value="{{ $admins->nama_lengkap }}"
                            required maxlength="255">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-lg" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="laki-laki" {{ $admins->jenis_kelamin === 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="perempuan" {{ $admins->jenis_kelamin === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input
                            type="text"
                            name="username"
                            id="username"
                            class="form-control form-control-lg"
                            placeholder="Masukkan Username"
                            value="{{ $admins->username }}"
                            required maxlength="255">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control form-control-lg"
                            placeholder="Masukkan Password">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_telepon" class="form-label">No Telepon</label>
                        <input
                            type="text"
                            name="no_telepon"
                            id="no_telepon"
                            class="form-control form-control-lg"
                            placeholder="Masukkan No Telepon"
                            value="{{ $admins->no_telepon }}"
                            required maxlength="15" pattern="[0-9]+">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input
                        type="text"
                        name="alamat"
                        id="alamat"
                        class="form-control form-control-lg"
                        placeholder="Masukkan Alamat"
                        value="{{ $admins->alamat }}"
                        required maxlength="255">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-control form-control-lg" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ $admins->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="petugas" {{ $admins->role === 'petugas' ? 'selected' : '' }}>Petugas</option>
                        <option value="masyarakat" {{ $admins->role === 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
