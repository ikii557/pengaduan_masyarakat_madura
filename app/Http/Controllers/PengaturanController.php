<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index(Request $request)
    {
        // Cek mode tema dari session
        $theme = session('theme', 'light');

        return view('layoutsadmin.pengaturan', compact('theme'));

    }

    public function switchTheme(Request $request)
    {
        // Ubah tema berdasarkan input (dark atau light)
        $theme = $request->input('theme');
        session(['theme' => $theme]);

        return response()->json(['status' => 'success', 'theme' => $theme]);
    }
}
