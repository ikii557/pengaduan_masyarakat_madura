<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas    = Petugas::all();
        $pengaduans = Pengaduan::with('masyarakat', 'kategori')->latest()->get();
        return view('admin.laporan.laporan_keamanan', compact('petugas','pengaduans'));
    }

    /**
     * Show the form for creating a new resource.
     */


     public function create()
     {

        $masyarakats = Petugas::all();
         $kategoris = Kategori::all(); // Pastikan Kategori memiliki data
         return view('masyarakat.create_pengaduan',compact('masyarakats','kategoris'));
     }


    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $request->validate([
             'masyarakat_id' => 'required|exists:users,id',
             'kategori_id' => 'required|exists:kategoris,id',
             'tanggal_pengaduan' => 'required|date',
             'isi_pengaduan' => 'required|string',

             'status' => 'nullable|in:pending,proses,selesai',
         ]);

         // Simpan pengaduan awal tanpa foto
         $pengaduanData = [
             'masyarakat_id'    => $request->masyarakat_id,
             'kategori_id'      => $request->kategori_id,
             'tanggal_pengaduan' => $request->tanggal_pengaduan,
             'isi_pengaduan'    => $request->isi_pengaduan,
             'status'           => $request->status,
         ];

         // Upload foto jika ada
         if ($request->hasFile('foto')) {
                $request->validate([
                    'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                ]);
             $file = $request->file('foto');
             $filename = time() . '.' . $file->getClientOriginalExtension();
             $file->move(public_path('uploads/foto_pengaduan'), $filename);

             // Tambahkan nama file ke dalam data pengaduan
             $pengaduanData['foto'] = $filename;
         }

         // Simpan data ke database
         Pengaduan::create($pengaduanData);

         return redirect('masyarakat')->with('success', 'Pengaduan berhasil dikirim.');
     }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan , $id)
    {
        $masyarakats = Petugas::all();
        $kategoris = Kategori::all();
        $pengaduan = Pengaduan::findOrFail($id);

        return view('admin.laporan.edit_laporan', compact('pengaduan', 'masyarakats', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */


     public function update(Request $request, $id)
     {
         $pengaduan = Pengaduan::findOrFail($id);
         $validatedData = $request->validate([
             'masyarakat_id' => 'required',
             'kategori_id' => 'required',
             'tanggal_pengaduan' => 'required|date',
             'isi_pengaduan' => 'required',
             'status' => 'required|string',

         ]);

         if ($request->hasFile('foto')) {
             $validatedData['foto'] = $request->file('foto')->store('pengaduan_images');
         }

         $pengaduan->update($validatedData);

         return redirect('data_pengaduan')->with('success', 'Pengaduan berhasil diperbarui!');
     }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->foto && Storage::exists('public/' . $pengaduan->foto)) {
            Storage::delete('public/' . $pengaduan->foto);
        }

        $pengaduan->delete();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load('masyarakat', 'kategori', 'tanggapans');
        return view('pengaduan.show', compact('pengaduan'));
    }

    public function report(Request $request)
{
    $query = Pengaduan::query();

    if ($request->start_date && $request->end_date) {
        $query->whereBetween('tanggal_pengaduan', [$request->start_date, $request->end_date]);
    }

    $pengaduans = $query->get();

    return view('admin.generate.generate_laporan', compact('pengaduans'));
}

public function exportLaporan()
{
    // Generate export logic (Excel or PDF)
}

    public function formulir($id){
        $pengaduans =Pengaduan::findOrFail($id);
        return view('admin.generate.formulir_laporan',compact('pengaduans'));
    }

}
