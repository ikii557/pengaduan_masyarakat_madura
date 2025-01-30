<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Kategori;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduans = Pengaduan::with('masyarakat', 'kategori')->latest()->get();
        return view('admin.laporan.laporan_keamanan', compact('pengaduans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $masyarakats = Masyarakat::all();
        $kategoris = Kategori::all();
        return view('pengaduan.create', compact('masyarakats', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'masyarakat_id' => 'required|exists:masyarakats,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'tanggal_pengaduan' => 'required|date',
            'isi_pengaduan' => 'required|string|max:500',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|string|in:pending,proses,selesai',
        ]);

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('pengaduan_images', 'public');
        }

        Pengaduan::create($validatedData);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan , $id)
    {
        $masyarakats = Masyarakat::all();
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

         return redirect()->back()->with('success', 'Pengaduan berhasil diperbarui!');
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
}
