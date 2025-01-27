<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the register form
    public function register()
    {
        return view('auth.register');
    }

    // Handle the register process
    public function storeregister(Request $request)
    {
        // Validasi request
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'no_hp' => 'required|string|max:15',
            'role' => 'required|string|in:admin,petugas,masyarakat',
        ], [
            // Pesan error untuk 'nama_petugas'
            'nama_petugas.required' => 'Nama petugas harus diisi.',
            'nama_petugas.string' => 'Nama petugas harus berupa teks.',
            'nama_petugas.max' => 'Nama petugas maksimal 255 karakter.',

            // Pesan error untuk 'username'
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username maksimal 255 karakter.',
            'username.unique' => 'Username sudah digunakan, pilih username lain.',

            // Pesan error untuk 'password'
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',

            // Pesan error untuk 'no_hp'
            'no_hp.required' => 'Nomor HP harus diisi.',
            'no_hp.string' => 'Nomor HP harus berupa teks.',
            'no_hp.max' => 'Nomor HP maksimal 15 karakter.',

            // Pesan error untuk 'role'
            'role.required' => 'Role harus diisi.',
            'role.string' => 'Role harus berupa teks.',
            'role.in' => 'Role harus salah satu dari admin, petugas, atau masyarakat.',
        ]);

        // Membuat data baru di tabel Petugas
        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'no_hp' => $request->no_hp,
            'role' => $request->role,
        ]);

        // Redirect setelah registrasi berhasil
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Show the login form
    public function login()
    {
        return view('auth.login');
    }



    public function storelogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        // Coba login menggunakan Auth::attempt
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Regenerate session
            $request->session()->regenerate();

            // Redirect ke halaman sesuai role
            return redirect('/index');
        }

        // Jika login gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }






    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
