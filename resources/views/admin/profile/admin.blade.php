@extends('layoutsadmin.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar admin</h3>
            <a href="tambah_admin" class="btn btn-light btn-round">Tambah admin</a>
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
                    @foreach ($admins as $index => $admin)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $admin->nama_petugas }}</td>
                            <td>{{ $admin->username }}</td>
                            <td>{{ $admin->no_hp }}</td>
                            <td>{{ $admin->role }}</td>
                            <td>
                                <a href="/edit_admin/{{$admin->id}}" class="btn btn-info btn-sm">Edit</a>
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="hapusAdmin({{ $admin->id }})">Hapus</a>

                                    <script>

                                        function hapusAdmin(id) {
                                            if (confirm('Yakin ingin menghapus petugas ini?')) {
                                                fetch(`/destroy_admin/${id}`, {
                                                    method: 'DELETE',
                                                    headers: {
                                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                    }
                                                })
                                                .then(response => {
                                                    if (response.ok) {
                                                        alert('Petugas berhasil dihapus.');
                                                        location.reload(); // Refresh halaman setelah penghapusan
                                                    } else {
                                                        alert('Gagal menghapus petugas.');
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Terjadi kesalahan:', error);
                                                    alert('Terjadi kesalahan saat menghapus petugas.');
                                                });
                                            }
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
