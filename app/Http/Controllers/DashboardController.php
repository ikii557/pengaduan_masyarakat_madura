<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $admins = Petugas::all();
        // Menghitung jumlah seluruh pengaduan
        $pengaduans = Pengaduan::selectRaw('DATE(created_at) as tanggal_pengaduan, COUNT(*) as jumlah')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal_pengaduan', 'asc')
            ->get();

        // Menghitung jumlah tanggapan yang sudah ditanggapi
        $tanggapanSelesai = Tanggapan::whereNotNull('tanggapan')->count();

        // Menghitung jumlah petugas dengan peran admin
        $totaladmin = Petugas::where('role', 'admin')->count();

        // Siapkan data untuk chart
        $labels = $pengaduans->pluck('tanggal_pengaduan')->toArray();
        $data = $pengaduans->pluck('jumlah')->toArray();
        $totalPengaduan = array_sum($data);



        return view('admin.dasboard', compact('admins','labels', 'data', 'pengaduans', 'tanggapanSelesai', 'totaladmin','totalPengaduan'));
    }


    public function halamandepan(){
        $adminss = Petugas::all();
        return view('masyarakat.masyarakat_daerah_desa_madura',compact('adminss'));
    }
}
