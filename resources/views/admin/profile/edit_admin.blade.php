@extends('layoutsadmin.app')
@section('content')
<div class="row">
    <!-- Card Edit Petugas -->
    <div class="col-md-12">
        <div class="card p-4">
            <h3 class="mb-4 text-center">Edit Petugas</h3>
            <form action="/update/admin/{{ $admin->id }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_petugas" class="form-label">Nama Petugas</label>
                        <input
                            type="text"
                            name="nama_petugas"
                            id="nama_petugas"
                            class="form-control form-control-lg"
                            placeholder="Masukkan Nama Petugas"
                            value="{{ $admin->nama_petugas }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input
                            type="text"
                            name="username"
                            id="username"
                            class="form-control form-control-lg"
                            placeholder="Masukkan Username"
                            value="{{ $admin->username }}"
                            required>
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
                        <label for="no_hp" class="form-label">No HP</label>
                        <input
                            type="text"
                            name="no_hp"
                            id="no_hp"
                            class="form-control form-control-lg"
                            placeholder="Masukkan No HP"
                            value="{{ $admin->no_hp }}"
                            required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-control form-control-lg" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ $admin->role === 'admin' ? 'selected' : '' }}>admin</option>
                        <option value="masyarakat" {{ $admin->role === 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                        <option value="petugas" {{ $admin->role === 'petugas' ? 'selected' : '' }}>Petugas</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
