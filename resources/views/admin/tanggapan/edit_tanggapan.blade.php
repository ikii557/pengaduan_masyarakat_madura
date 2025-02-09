@extends('layoutsadmin.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Tanggapan Pengaduan</h4>
    </div>
    <div class="card-body">
        <form action="/update/tanggapan/{{ $pengaduans->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gy-4">
                <!-- Nama Masyarakat -->
                <div class="col-md-6">
                    <label for="masyarakat_id" class="form-label">Nama Masyarakat</label>
                    <input type="text" class="form-control" value="{{ $pengaduans->masyarakat->nama_lengkap }}" readonly>
                </div>

                <!-- Kategori -->
                <div class="col-md-6">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <input type="text" class="form-control" value="{{ $pengaduans->kategori->nama_kategori }}" readonly>
                </div>

                <!-- Tanggal Pengaduan -->
                <div class="col-md-6">
                    <label for="tanggal_pengaduan" class="form-label">Tanggal Pengaduan</label>
                    <input type="text" class="form-control" value="{{ $pengaduans->tanggal_pengaduan }}" readonly>
                </div>

                <!-- Foto -->
                <div class="col-md-6">
                    <label for="foto" class="form-label">Foto</label>
                    @if ($pengaduans->foto)
                        <img src="{{ asset('storage/' . $pengaduans->foto) }}" alt="Foto Pengaduan" class="img-thumbnail mb-2" width="100">
                    @else
                        <p class="text-muted">Tidak ada foto tersedia</p>
                    @endif
                </div>

                <!-- Isi Pengaduan -->
                <div class="col-12">
                    <label for="isi_pengaduan" class="form-label">Isi Pengaduan</label>
                    <textarea class="form-control" rows="4" readonly>{{ $pengaduans->isi_pengaduan }}</textarea>
                </div>

                <!-- Tanggapan -->
                <div class="col-12">
                    <label for="tanggapan" class="form-label">Tanggapan</label>
                    <textarea class="form-control" name="tanggapan" rows="4" placeholder="Masukkan tanggapan baru">
                        {{ $pengaduans->tanggapan ? $pengaduans->tanggapan->tanggapan : '' }}
                    </textarea>
                    @error('tanggapan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Status Pengaduan -->
                <div class="col-12">
                    <label for="status" class="form-label">Status Pengaduan</label>
                    <select class="form-control" name="status" required>
                        <option value="ditolak" {{ $pengaduans->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="0" {{ $pengaduans->status == '0' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ $pengaduans->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ $pengaduans->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Perbarui Tanggapan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
