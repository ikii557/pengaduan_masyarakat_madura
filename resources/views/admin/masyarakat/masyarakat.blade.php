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
    <div>
        <p>Data masyarakat yang sudah login</p>
    </div>

    <div class="row">
        <!-- Card untuk tabel -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between">
                    <h3 class="card-title">Daftar Masyarakat</h3>
                    <div>
                        <a href="#" class="btn btn-label-info btn-round me-2">Laporan</a>
                        <a href="/masyarakat/tambah_masyarakat" class="btn btn-primary btn-round">Tambah Masyarakat</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Username</th>
                                <th>No Telepon</th>
                                <th>role</th>
                                <th>Alamat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($masyarakats as $key => $masyarakat)
                            @if ($masyarakat->role === 'masyarakat')
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $masyarakat->nik }}</td>
                                    <td>{{ $masyarakat->nama_lengkap }}</td>
                                    <td>{{ $masyarakat->jenis_kelamin }}</td>
                                    <td>{{ $masyarakat->username }}</td>
                                    <td>{{ $masyarakat->no_telepon }}</td>
                                    <td>{{ $masyarakat->role}}</td>
                                    <td>{{ $masyarakat->alamat }}</td>
                                    <td>
                                        <a href="edit_masyarakat/{{ $masyarakat->id }}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm"
                                           data-toggle="tooltip" data-placement="top" title="Hapus"
                                           onclick="confirmDeletion({{ $masyarakat->id }});">
                                            <i class="fa fa-close color-danger">Hapus</i>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination (Jika data banyak) -->
                    {{ $masyarakats->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDeletion(id) {
        Swal.fire({
            title: "Data ini akan dihapus dan tidak bisa dikembalikan!",
            text: 'Apakah Anda yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/destroy_masyarakat/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        setTimeout(() => {
                            location.reload(); // Refresh halaman setelah penghapusan
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menghapus data.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan pada server.',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            }
        });
    }
</script>

@endsection
