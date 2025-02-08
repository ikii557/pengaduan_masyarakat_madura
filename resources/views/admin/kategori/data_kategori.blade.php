@extends('layoutsadmin.app')

@section('content')

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            toast: false,
            position: 'center'
        });
    });
</script>
@endif

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 3000,
            toast: false,
            position: 'center'
        });
    });
</script>
@endif

<div class="row">
    <!-- Form Tambah Kategori -->
    <div class="col-md-4">
        <div class="card p-4">
            <h3 class="mb-4 text-center">Tambah Kategori</h3>
            <form action="/store/kategori" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Masukkan nama kategori" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-3 w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Data Kategori -->
    <div class="col-md-8">
        <div class="card" style="height: 600px; width: 800px;">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Data Kategori</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($kategoris as $kategori)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td>{{ $kategori->deskripsi }}</td>
                            <td>
                                <a href="/edit_kategori/{{$kategori->id}}" class="btn btn-info btn-sm">Edit</a>
                                <a href="javascript:void(0);" class="btn btn-danger"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Hapus"
                                    onclick="confirmDeletion({{ $kategori->id }});">
                                    <i class="fa fa-close color-danger">Hapus</i>
                                    </a>

                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        function confirmDeletion(id) {
                                            Swal.fire({
                                                title: 'Yakin ingin menghapus data ini?',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#d33',
                                                cancelButtonColor: '#3085d6',
                                                confirmButtonText: 'Ya, hapus!',
                                                cancelButtonText: 'Batal'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    // Buat form secara dinamis untuk method DELETE
                                                    const form = document.createElement('form');
                                                    form.action = `/destroy_kategori/${id}`;
                                                    form.method = 'POST';

                                                    const csrfField = document.createElement('input');
                                                    csrfField.type = 'hidden';
                                                    csrfField.name = '_token';
                                                    csrfField.value = '{{ csrf_token() }}';
                                                    form.appendChild(csrfField);

                                                    const methodField = document.createElement('input');
                                                    methodField.type = 'hidden';
                                                    methodField.name = '_method';
                                                    methodField.value = 'DELETE';
                                                    form.appendChild(methodField);

                                                    document.body.appendChild(form);
                                                    form.submit();
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
            <div class="d-flex justify-content-center">
                {{ $kategoris->links() }}
            </div>
        </div>
    </div>
</div>



@endsection
