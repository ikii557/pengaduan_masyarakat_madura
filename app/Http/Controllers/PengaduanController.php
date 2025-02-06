<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
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
        // Validasi input
        $request->validate([
            'masyarakat_id' => 'nullable|exists:users,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'tanggal_pengaduan' => 'required|date',
            'isi_pengaduan' => 'required|string',
            'foto' => 'nullable|mimes:jpeg,png,jpg|max:2048', // Tidak wajib, hanya jika ada input file
            'status' => 'nullable|in:pending,proses,selesai',
        ], [
            'masyarakat_id.exists' => 'Nama masyarakat harus ada di tabel user.',
            'kategori_id.required' => 'Kategori harus diisi.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            'tanggal_pengaduan.required' => 'Tanggal pengaduan harus diisi.',
            'tanggal_pengaduan.date' => 'Tanggal pengaduan harus berupa format tanggal yang valid.',
            'isi_pengaduan.required' => 'Isi pengaduan harus diisi.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Foto harus dalam format jpeg, png, atau jpg.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
            'status.in' => 'Status harus salah satu dari pending, proses, atau selesai.',
        ]);


        $data = $request->except('foto');

        // Jika ada file foto, upload dan simpan path-nya
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->storeAs(
                'public/foto_pengaduan', // Folder dalam public
                now()->format('Y-m-d_H-i-s') . '.' . $foto->getClientOriginalExtension() // Nama file
            );
            $data['foto'] = $path;
        }

        // Simpan data pengaduan
        $pengaduan = new Pengaduan();
        $pengaduan->masyarakat_id = auth()->user()->id; // Ambil ID user yang login
        $pengaduan->kategori_id = $request->kategori_id;
        $pengaduan->tanggal_pengaduan = $request->tanggal_pengaduan;
        $pengaduan->isi_pengaduan = $request->isi_pengaduan;
        $pengaduan->foto = $data['foto'] ?? null; // Pastikan foto tersimpan dengan benar
        $pengaduan->status = '0'; // Status default
        $pengaduan->save();

        return redirect('daftar_pengaduan')->with('success', 'Data Berhasil Dibuat');

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
    public function destroy($id)
    {
        // Mencari pengaduan berdasarkan ID
        $pengaduan = Pengaduan::findOrFail($id);

        // Hapus foto jika ada
        if ($pengaduan->foto) {
            // Menghapus file foto dari storage
            Storage::delete($pengaduan->foto);
        }

        // Hapus pengaduan
        $pengaduan->delete();

        // Redirect ke halaman daftar pengaduan dengan pesan sukses
        return redirect('data_pengaduan')->with('success', 'Pengaduan berhasil dihapus');
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
        $petugas    =Petugas::all();

        return view('admin.generate.formulir_laporan',compact('pengaduans','petugas'));
    }




//data tanggapan

    public function tanggapan(){
        $tanggapans = Tanggapan::all();
        return view('admin.tanggapan.data_tanggapan',compact('tanggapans'));
    }



    public function createtanggapan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('admin.tanggapan.tambah_tanggapan', compact('pengaduan'));
    }



    public function updateTanggapan(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'isi_tanggapan' => 'required|string',
        'status' => 'required|in:0,proses,selesai',
    ]);

    // Cari pengaduan berdasarkan ID
    $pengaduan = Pengaduan::findOrFail($id);

    // Tambahkan atau perbarui tanggapan
    $tanggapan = Tanggapan::updateOrCreate(
        ['pengaduan_id' => $pengaduan->id],
        [
            'tanggal_tanggapan' => now(),
            'tanggapan' => $request->isi_tanggapan,
            'petugas_id' => auth()->user()->id,
        ]
    );

    // Perbarui status pengaduan
    $pengaduan->status = $request->status;
    $pengaduan->save();

    return redirect()->route('data_pengaduan')->with('success', 'Tanggapan dan status pengaduan berhasil diperbarui.');
}






}
