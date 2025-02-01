@extends('layoutsadmin.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-4">
            <h3 class="mb-4 text-center">Tambah Admin</h3>
            <form action="/update/admin/{{$admin->id}}" method="POST">
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
                            value="{{ old('nama_petugas', $admin->nama_petugas) }}"  <!-- Corrected -->
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
                            value="{{ old('username', $admin->username) }}"  <!-- Corrected -->
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
                            placeholder="Masukkan Password"
                            value="{{ old('password') }}" <!-- Corrected: allow for blank password -->
                            minlength="8"  <!-- Corrected -->
                            >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input
                            type="text"
                            name="no_hp"
                            id="no_hp"
                            class="form-control form-control-lg"
                            placeholder="Masukkan No HP"
                            value="{{ old('no_hp', $admin->no_hp) }}"  <!-- Corrected -->
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-lg" required>
                            <option value="laki-laki" {{ old('jenis_kelamin', $admin->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{ old('jenis_kelamin', $admin->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-control form-control-lg" required>
                            <option value="admin" {{ old('role', $admin->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ old('role', $admin->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="masyarakat" {{ old('role', $admin->role) == 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Update Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
