@extends('layoutsadmin.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Pengaduan</h4>
    </div>
    <div class="card-body">
        <form action="/update/data_pengaduan/{{ $pengaduan->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gy-4">
                <!-- Nama Masyarakat -->
                <div class="col-md-6">
                    <label for="masyarakat_id" class="form-label">Nama Masyarakat</label>
                    <select name="masyarakat_id" class="form-control" required>
                        <option value="" disabled>Pilih Masyarakat</option>
                        @foreach ($masyarakats as $masyarakat)
                            <option value="{{ $masyarakat->id }}" {{ $pengaduan->masyarakat_id == $masyarakat->id ? 'selected' : '' }}>
                                {{ $masyarakat->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                    @error('masyarakat_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="col-md-6">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-control" name="kategori_id" required>
                        <option value="" disabled>Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $pengaduan->kategori_id == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Pengaduan -->
                <div class="col-md-6">
                    <label for="tanggal_pengaduan" class="form-label">Tanggal Pengaduan</label>
                    <input type="date" class="form-control" name="tanggal_pengaduan" value="{{ $pengaduan->tanggal_pengaduan }}" required>
                    @error('tanggal_pengaduan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Foto -->
                <div class="col-md-6">
                    <label for="foto" class="form-label">Foto (Optional)</label>
                    @if ($pengaduan->foto)
                        <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan" class="img-thumbnail mb-2" width="100">
                    @endif
                    <input type="file" class="form-control" name="foto">
                    @error('foto')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi Pengaduan -->
                <div class="col-12">
                    <label for="isi_pengaduan" class="form-label">Deskripsi Pengaduan</label>
                    <textarea class="form-control" name="isi_pengaduan" rows="6" required>{{ $pengaduan->isi_pengaduan }}</textarea>
                    @error('isi_pengaduan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status Pengaduan -->
                <div class="col-12">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status" required>
                        <option value="pending" {{ $pengaduan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>

                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Perbarui Pengaduan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
