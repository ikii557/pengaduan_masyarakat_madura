@extends('layoutsadmin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Hasil Pencarian untuk: <span class="text-primary">"{{ $query }}"</span></h3>

    <div class="row">
        {{-- Masyarakat & Pengaduannya --}}
        <div class="col-md-12">
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-info text-white">Masyarakat & Pengaduan</div>
                <div class="card-body">
                    @foreach ($masyarakat as $m)
                        <div class="mb-3">
                            <h5 class="text-dark">{{ $m->nama }} <span class="text-muted">({{ $m->nik }})</span></h5>
                            <p><strong>Jumlah Pengaduan:</strong> {{ $m->pengaduans->count() }}</p>


                            @if($m->pengaduans->count() > 0)
                                <ul class="list-group">
                                    @foreach ($m->pengaduans as $p)
                                    <li class="list-group-item">
                                    <li class="list-group-item">
                                        <div><strong>Isi Pengaduan:</strong> {{ $p->isi_pengaduan }}</div><br>
                                        <div><strong>Kategori:</strong> {{ $p->kategori->nama_kategori ?? 'Tidak Ada' }}</div>
                                        <div><strong>Status:</strong>
                                            @if ($p->tanggapan)
                                                <span class="text-success">Sudah Ditanggapi</span>
                                                <div><strong>Oleh:</strong> {{ optional($p->tanggapan->first())->pengaduan->petugas->nama_lengkap ?? 'Tidak Diketahui' }}</div>
                                            @else
                                                <span class="text-danger">Belum Ditanggapi</span>
                                            @endif
                                        </div>
                                    </li>

                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">Tidak ada pengaduan.</p>
                            @endif
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
