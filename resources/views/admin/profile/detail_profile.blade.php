@extends('layoutsadmin.app')
@section('content')
    <!-- Card Edit Petugas -->
    <div class="row">
    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="mb-4 text-center">Edit Profile</h3>
            <form action="/update/admin/{{ $adminss->id }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6 mb-3 text-center">
                    <label for="foto" class="form-label">Foto</label>

                    <!-- Container Foto Profil -->
                    <div class="position-relative" style="display: inline-block;">
                        <img id="preview"
                             src="{{ $adminss->foto ? asset('storage/' . $adminss->foto) : 'https://via.placeholder.com/150' }}"
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
                            value="{{ old('nik', $adminss->nik) }}"
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
                            value="{{ old('nama_lengkap', $adminss->nama_lengkap) }}"
                            required maxlength="255">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-lg" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="laki-laki" {{ old('jenis_kelamin', $adminss->jenis_kelamin) === 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="perempuan" {{ old('jenis_kelamin', $adminss->jenis_kelamin) === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                            value="{{ old('username', $adminss->username) }}"
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
                            value="{{ old('no_telepon', $adminss->no_telepon) }}"
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
                        value="{{ old('alamat', $adminss->alamat) }}"
                        required maxlength="255">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-control form-control-lg" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role', $adminss->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="petugas" {{ old('role', $adminss->role) === 'petugas' ? 'selected' : '' }}>Petugas</option>
                        <option value="masyarakat" {{ old('role', $adminss->role) === 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="mb-4 text-center"> Profile</h3>
                    <div class="container">
                        <div class="text-center">
                        <div id="profile-container" style="text-align: center; padding: 20px; height: 300px; width: 500px; border-radius: 20px;">
                            <img id="preview"
                                src="{{ $adminss->foto ? asset('storage/' . $adminss->foto) : 'https://via.placeholder.com/150' }}"
                                style="width: 250px; height: 250px; object-fit: cover; border-radius: 100%; border: 10px solid #ddd;"
                                alt="Preview Foto">
                        </div>

<script>
    // Tambahkan background dan bayangan dengan JS
    const profileContainer = document.getElementById('profile-container');

    profileContainer.style.background = 'linear-gradient(135deg, #f5f7fa 0%,rgb(0, 197, 247) 100%)';
    profileContainer.style.boxShadow = '0 10px 15px rgba(0, 0, 0, 0.1)';
    profileContainer.style.display = 'inline-block';
</script>


                            <hr>
                            <div>
                                <p>
                                    <strong>NAMA</strong> :
                                    <span>{{auth()->user()->nama_lengkap}}</span> |
                                    <strong>NIK</strong>:
                                    <span>{{auth()->user()->nik}}</span><br>
                                    <strong>JENIS KELAMIN</strong>:
                                    <span>{{auth()->user()->jenis_kelamin}}</span> |
                                    <strong>USERNAME</strong>:
                                    <span>{{auth()->user()->username}}</span><br>
                                    <strong>NOMOR TELEPON</strong>:
                                    <span>{{auth()->user()->no_telepon}}</span><br>
                                    <strong>JABATAN</strong>:
                                    <span>{{auth()->user()->role}}</span><br>
                                    <strong>ALAMAT</strong>:
                                    <span>{{auth()->user()->alamat}}</span><br>
                                </p>

                            </div>
                        </div>
                    </div>

        </div>
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
