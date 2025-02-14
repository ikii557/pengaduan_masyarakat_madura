<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        // Pencarian Admin & Petugas (dari tabel users)
        $users = User::where('nama_lengkap', 'like', "%$query%")
                     ->orWhere('username', 'like', "%$query%")
                     ->orWhere('role', 'like', "%$query%")
                     ->get();

        // Pencarian Pengaduan (berdasarkan isi_pengaduan dan kategori)
        $pengaduan = Pengaduan::with(['kategori', 'tanggapan.petugas']) // Memuat kategori & tanggapan + petugas yang menanggapi
                              ->where('isi_pengaduan', 'like', "%$query%")
                              ->orWhereHas('kategori', function ($q) use ($query) {
                                  $q->where('nama_kategori', 'like', "%$query%");
                              })
                              ->get();

        // Pencarian Tanggapan (berdasarkan isi tanggapan)
        $tanggapan = Tanggapan::with('petugas') // Memuat petugas yang menanggapi
                              ->where('tanggapan', 'like', "%$query%")
                              ->get();

        // Pencarian Masyarakat dan Pengaduannya
        $masyarakat = Petugas::with(['pengaduans.tanggapan.petugas', 'pengaduans.kategori'])
                            ->where('nama_lengkap', 'like', "%$query%")
                            ->orWhere('nik', 'like', "%$query%")
                            ->get();

        // Pencarian Petugas (role 'petugas' dari tabel users)
        $petugas = Petugas::where('role', 'petugas')
                       ->where('nama_lengkap', 'like', "%$query%")
                       ->get();

        // Pencarian Kategori (berdasarkan nama_kategori)
        $kategori = Kategori::where('nama_kategori', 'like', "%$query%")->get();

        return view('admin.search', compact(
            'users', 'pengaduan', 'tanggapan', 'petugas', 'masyarakat', 'kategori', 'query'
        ));
    }
}
