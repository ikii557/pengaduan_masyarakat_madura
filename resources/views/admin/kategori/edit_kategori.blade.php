@extends('layoutsadmin.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Card Edit Kategori -->
        <div class="col-md-12">
            <div class="card p-4">
                <h3 class="mb-4 text-center">Edit Kategori</h3>
                <form action="{{ url('update/kategori/' . $kategori->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control form-control-lg" value="{{ $kategori->nama_kategori }}" placeholder="Masukkan nama kategori" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control form-control-lg" placeholder="Masukkan Deskripsi" required>{{ $kategori->deskripsi }}</textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-lg mt-3 w-100">Update</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
@endsection
