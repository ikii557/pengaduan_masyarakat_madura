@extends('layoutsadmin.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Card Tambah Masyarakat -->
        <div class="col-md-12">
            <div class="card p-4">
                <h3 class="mb-4 text-center">Tambah Masyarakat</h3>
                <form action="/masyarakat/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nik_masyarakat" class="form-label">NIK</label>
                            <input type="text" name="nik" id="nik_masyarakat" class="form-control form-control-lg" placeholder="Masukkan NIK" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_masyarakat" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama_masyarakat" class="form-control form-control-lg" placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin_masyarakat" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin_masyarakat" class="form-control form-control-lg" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="username_masyarakat" class="form-label">Username</label>
                            <input type="text" name="username" id="username_masyarakat" class="form-control form-control-lg" placeholder="Masukkan Username" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password_masyarakat" class="form-label">Password</label>
                            <input type="password" name="password" id="password_masyarakat" class="form-control form-control-lg" placeholder="Masukkan Password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_telepon_masyarakat" class="form-label">No Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon_masyarakat" class="form-control form-control-lg" placeholder="Masukkan No Telepon">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_masyarakat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat_masyarakat" class="form-control form-control-lg" rows="4" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="role" value="masyarakat">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Card Tambah Petugas -->

    </div>
</div>
@endsection
