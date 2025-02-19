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
<div>
    <h3 class="fw-bold mb-3"><a href="" class="btn btn-label-info">kembali</a></h3>
    <h3 class="fw-bold mb-3">data admin</h3>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Admin</h3>
            @unless(auth()->user()->role == 'petugas')

            <a href="tambah_admin" class="btn btn-light btn-round">Tambah Admin</a>
            @endunless
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Role</th>
                        <th>foto</th>
                        @unless(auth()->user()->role == 'petugas')
                        <th>Opsi</th>
                        @endunless
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($admins as $admin)
                        @if ($admin->role === 'admin')
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $admin->nama_lengkap }}</td>
                                <td>{{ $admin->username }}</td>
                                <td>{{ $admin->no_telepon }}</td>
                                <td>{{ $admin->alamat}}</td>
                                <td>{{ $admin->role }}</td>
                                <td> <img id="preview"
                                    src="{{ $adminPhoto ?? 'https://via.placeholder.com/150' }}"
                                    class="rounded-circle"
                                    style="width: 50px; height: 50px; object-fit: cover; border: 2px solid #ddd; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);"
                                    alt="Profile Photo">
                                </td>
                                @unless(auth()->user()->role == 'petugas')

                                <td>
                                    <a href="/edit_admin/{{$admin->id}}" class="btn btn-info btn-sm">edit</a>
                                    <a href="javascript:void(0);"
                                    class="btn btn-danger btn-sm"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Hapus"
                                    onclick="confirmDeletion({{ $admin->id }});">
                                    <i class="fa fa-close color-danger">Hapus</i>
                                </a>

                                </td>
                                @endunless
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
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
            fetch(`/destroy_admin/${id}`, {
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
