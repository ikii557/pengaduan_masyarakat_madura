@extends('layoutsadmin.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Card Tambah Masyarakat -->
        <div class="col-md-12">
            <div class="card p-4">
                <h3 class="mb-4 text-center">Tambah Masyarakat</h3>
                <form action="/store/pegaduan" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="masyarakat_id" class="form-label fw-semibold">Nama Masyarakat</label>
                            <input type="text" value="{{ Auth::user()->nama_lengkap }}" name="masyarakat_id" id="masyarakat_id" class="form-control form-control-lg" placeholder="Masukkan masyarakat_id" required>
                            @error('masyarakat_id')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="kategori_id" class="form-label fw-semibold">Masukan Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">

                        <div class="col-md-6">
                            <label for="tanggal_pengaduan" class="form-label fw-semibold">Tanggal Pengaduan</label>
                            <input type="date" value="{{ old('tanggal_pengaduan') }}" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control form-control-lg" placeholder="Masukkan tanggal_pengaduan" required>
                            @error('tanggal_pengaduan')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="foto">Upload Foto (Opsional)</label>
                            <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png,image/jpg">
                            @error('foto')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                    </div>


                    <div class="row mb-4">
                    <div class="col-12 mb-3">
                            <label for="isi_pengaduan">Isi Pengaduan</label>
                            <textarea name="isi_pengaduan" class="form-control" rows="6" placeholder="Deskripsi Pengaduan Anda" required>{{ old('isi_pengaduan') }}</textarea>
                            @error('isi_pengaduan')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                    </div>



                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Simpan Data Laporan</button>
                    </div>
                </form>

            </div>
        </div>

        <!-- Card Tambah Petugas -->

    </div>
</div>
@endsection
