<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index(){
        $kategoris=Kategori::all();
        return view('admin.kategori.data_kategori',compact('kategoris'));
    }

    public function create(){
        $kategoris = Kategori::all();
        return view('admin.kategori.tambah_kategori',compact('kategoris'));
    }
}
