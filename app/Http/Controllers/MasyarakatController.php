<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakats = Masyarakat::all(); // Mengambil semua data masyarakat
        return view('masyarakats.masyarakat', compact('masyarakats'));
    }
}
