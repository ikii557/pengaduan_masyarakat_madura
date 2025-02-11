@extends('layoutsadmin.app')

@section('content')

@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
    </script>
@endif


<div class="p-2 mt-4 me-4">
    <div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Pengaduan</h3>



        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover" id="example1">
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
                                <a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                    <span class="badge bg-warning">
                                        belum ada respon
                                    </span>
                                </a>

                            @endif





                            </td>
                            @unless(auth()->user()->role == 'petugas')

                            <td >


                                <a href="/edit_pengaduan/{{$pengaduan->id}}"class="btn btn-sm btn-info mt-1">E</a>
                                <!-- Link Penghapusan -->
                                <form id="delete-form-{{ $pengaduan->id }}" action="{{ route('destroy_pengaduan', $pengaduan->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion({{ $pengaduan->id }})">
                                        H
                                    </button>
                                </form>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            function confirmDeletion(pengaduanId) {
                                Swal.fire({
                                    title: 'Apakah Anda yakin?',
                                    text: "Data pengaduan ini akan dihapus secara permanen!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Ya, hapus!',
                                    cancelButtonText: 'Batal'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.getElementById('delete-form-' + pengaduanId).submit();
                                    }
                                });
                            }

                            @if(session('success'))
                                // Show success notification at the center
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: "{{ session('success') }}",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    position: 'center' // Alert positioned at the center
                                });
                            @endif
                        </script>





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
