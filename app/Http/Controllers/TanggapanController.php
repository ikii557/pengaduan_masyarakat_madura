<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    //
    public function index($id){
        $tanggapans = Tanggapan::all();
        $pengaduans = Pengaduan::findOrFail($id);
        return view('admin.tanggapan.data_tanggapan',compact('tanggapans','pengaduans'));
    }

    public function create(){
        return view('admin.tanggapan.tambah_tanggapan');
    }
}
