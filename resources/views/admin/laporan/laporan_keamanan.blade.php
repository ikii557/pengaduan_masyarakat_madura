@extends('layoutsadmin.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 3000); // Hide the success alert after 3 seconds
    </script>
@endif

<div class="container mt-4">
    <div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Pengaduan</h3>
            @unless(auth()->user()->role == 'petugas')
                <a href="tambah_pengaduan" class="btn btn-light btn-round">Tambah Pengaduan</a>
            @endunless


        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Masyarakat</th>
                        <th>Kategori Pengaduan</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        @unless(auth()->user()->role == 'petugas')

                        <th>Opsi</th>
                        @endunless
                    </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                    @foreach ($pengaduans as $index => $pengaduan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pengaduan->masyarakat->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                            <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data' }}</td>
                            <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                            <td>{{ $pengaduan->isi_pengaduan }}</td>
                            <td>
                                @if ($pengaduan->foto)
                                    <img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" width="100">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>

                            <td>
                            @if(in_array($pengaduan->status, ['selesai', 'ditolak']))
                                @if($pengaduan->status == 'ditolak' && auth()->user()->role == 'admin')
                                    <a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                        <span class="badge bg-danger">
                                            {{ ucfirst($pengaduan->status) }}
                                        </span>
                                    </a>
                                @else
                                    <span class="badge {{ $pengaduan->status == 'selesai' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($pengaduan->status) }}
                                    </span>
                                @endif
                            @elseif($pengaduan->status == 'diproses' && auth()->user()->role == 'admin')
                                <a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                    <span class="badge bg-info">
                                        {{ ucfirst($pengaduan->status) }}
                                    </span>
                                </a>
                            @else
                                {{-- Default status tanpa respons --}}
                                <span class="badge bg-warning">
                                    Belum Ada Respon
                                </span>
                            @endif





                            </td>
                            @unless(auth()->user()->role == 'petugas')

                            <td >


                                <a href="/edit_pengaduan/{{$pengaduan->id}}"class="btn btn-sm btn-info mt-1">E</a>
                                <!-- Link Penghapusan -->
                                <form action="{{ route('destroy_pengaduan', $pengaduan->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">
                                        H
                                    </button>
                                </form>



                            </td>
                            @endunless
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $pengaduans->links() }}
        </div>

    </div>
</div>
@endsection
