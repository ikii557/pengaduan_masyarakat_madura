<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index(){
        $kategoris=Kategori::paginate(5);
        return view('admin.kategori.data_kategori',compact('kategoris'));
    }

    public function create(){
        $kategoris = Kategori::all();
        return view('admin.kategori.data_kategori',compact('kategoris'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_kategori'  => 'required',
            'deskripsi'      => 'required',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect('kategori')->with('success','kategori berhasil di tambahkan');

    }

    public function edit($id){
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit_kategori',compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori'  => 'required',
            'deskripsi'      => 'required',
        ]);

        // Cari kategori berdasarkan id
        $kategori = Kategori::findOrFail($id);

        // Update data kategori
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect('kategori')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('kategori')->with('success', 'Kategori berhasil dihapus');
    }


}
