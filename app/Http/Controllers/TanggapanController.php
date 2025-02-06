<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    //
        public function index()
    {
        $pengaduan =Pengaduan::all();
        $tanggapans =Tanggapan::all();
        return view('admin.tanggapan.data_tanggapan', compact('tanggapans', 'pengaduan'));
    }


    public function create($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.tanggapan.tambah_tanggapan', compact('pengaduan'));
    }

    public function updateTanggapan(Request $request, $id)
    {
        $request->validate([
            'isi_tanggapan' => 'required|string|max:255',
            'status' => 'required|in:pending,proses,selesai',
        ]);

        // Temukan pengaduan terkait
        $pengaduan = Pengaduan::findOrFail($id);

        // Simpan tanggapan baru
        $pengaduan->tanggapan()->create([
            'pengaduan_id' => $pengaduan->id,
            'tanggal_tanggapan' => now(),
            'tanggapan' => $request->isi_tanggapan,
            'petugas_id' => auth()->user()->id,
        ]);

        // Update status pengaduan
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect('/admin/tanggapan')->with('success', 'Tanggapan berhasil diperbarui dan status pengaduan diperbarui!');
    }

}



