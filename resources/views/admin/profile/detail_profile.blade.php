@extends('layoutsadmin.app')
@section('content')
    <!-- Card Edit Petugas -->
    <div class="col-md-12">
        <div class="card p-4">
            <h3 class="mb-4 text-center">Edit Profile</h3>
            <form action="/update/admin/{{ $admins->id }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6 mb-3 text-center">
                    <label for="foto" class="form-label">Foto</label>

                    <!-- Container Foto Profil -->
                    <div class="position-relative" style="display: inline-block;">
                        <img id="preview"
                             src="{{ $admins->foto ? asset('storage/' . $admins->foto) : 'https://via.placeholder.com/150' }}"
                             class="rounded-circle"
                             style="width: 150px; height: 150px; object-fit: cover; border: 2px solid #ddd; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);"
                             alt="Preview Foto">
                    </div>

                    <!-- Input File -->
                    <div class="mt-2">
                        <input type="file" name="foto" id="foto" class="form-control form-control-lg"
                               accept="image/*" onchange="previewImage()">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input
                            type="text"
                            name="nik"
                            id="nik"
                            class="form-control form-control-lg"
                            placeholder="Masukkan NIK"
                            value="{{ old('nik', $admins->nik) }}"
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
                            value="{{ old('nama_lengkap', $admins->nama_lengkap) }}"
                            required maxlength="255">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-lg" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="laki-laki" {{ old('jenis_kelamin', $admins->jenis_kelamin) === 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="perempuan" {{ old('jenis_kelamin', $admins->jenis_kelamin) === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                            value="{{ old('username', $admins->username) }}"
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
                            value="{{ old('no_telepon', $admins->no_telepon) }}"
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
                        value="{{ old('alamat', $admins->alamat) }}"
                        required maxlength="255">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-control form-control-lg" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role', $admins->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="petugas" {{ old('role', $admins->role) === 'petugas' ? 'selected' : '' }}>Petugas</option>
                        <option value="masyarakat" {{ old('role', $admins->role) === 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage() {
            const fileInput = document.getElementById('foto');
            const preview = document.getElementById('preview');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
@endsection
