@extends('layoutsadmin.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Petugas</h3>
            <a href="tambah_petugas" class="btn btn-light btn-round">Tambah Petugas</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>No Telepon</th>
                        <th>Role</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugass as $index => $petugas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $petugas->nama_petugas }}</td>
                            <td>{{ $petugas->username }}</td>
                            <td>{{ $petugas->no_hp }}</td>
                            <td>{{ $petugas->role }}</td>
                            <td>
                            <a href="/edit_petugas/{{$petugas->id}}" class="btn btn-info btn-sm">Edit</a>
                            <a href="javascript:void(0);" class="btn btn-danger"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Hapus"
                                onclick="confirmDeletion({{ $petugas->id }});">
                                <i class="fa fa-close color-danger">Hapus</i>
                            </a>

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
                                            // Kirim request DELETE
                                            fetch(`/destroy_petugas/${id}`, {
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
                                                        location.reload(); // Refresh halaman tabel petugas
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


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
