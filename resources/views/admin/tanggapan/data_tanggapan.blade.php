@extends('layoutsadmin.app')

@section('content')



<div class="p-2  mt-4 me-3">
    <div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar tanggapan</h3>
            <a href="data_pengaduan" class="btn btn-light btn-round">Tambah tanggapan</a>
        </div>
        <div class="card-body">

        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Pengaduan id</th>
                    <th>Tanggal Tanggapan</th>
                    <th>Tanggapan</th>
                    <th>Nama Petugas</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach ($tanggapans as $index => $tanggapan)
                <tr>
                    <td>{{ $tanggapans->firstItem() + $index }}</td>
                    <td>{{ $tanggapan->pengaduan->masyarakat->nama_lengkap ?? 'Tidak Ada Data' }}</td> <!-- Nama pengaduan -->
                    <td>{{ $tanggapan->tanggal_tanggapan }}</td>
                    <td>{{ $tanggapan->tanggapan }}</td>
                    <td>{{ $tanggapan->petugas->nama_lengkap ?? 'Tidak Ada Data' }}</td> <!-- Nama petugas -->
                    <td>
                        <a href="/edit_tanggapan/{{ $tanggapan->id }}" class="btn btn-sm btn-info">E</a>
                        <form id="delete-tanggapan-form-{{ $tanggapan->id }}" action="/destroy_tanggapan/{{ $tanggapan->id }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion({{ $tanggapan->id }})">
        H
    </button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Konfirmasi penghapusan dengan SweetAlert2
    function confirmDeletion(tanggapanId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Tanggapan ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-tanggapan-form-' + tanggapanId).submit();
            }
        });
    }

    // Notifikasi sukses jika ada session
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false,
            position: 'center'
        });
    @endif
</script>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        </div>
        <div class="d-flex justify-content-center">
            {{ $tanggapans->links() }}
        </div>
    </div>
</div>
@endsection
