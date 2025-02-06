<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class  AuthController extends Controller
{
    // Show the register form
    public function register()
    {
        return view('auth.register');
    }

    // Handle the register process



public function storeregister(Request $request)
{
    $request->validate([
        'nik'           => 'required|string|unique:users,nik',
        'nama_lengkap'  => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        'username'      => 'required|string|unique:users,username',
        'password'      => 'required|string|min:8',
        'no_telepon'    => 'required|string|max:15',
        'alamat'        => 'required|string',
        'role'          => 'required|in:admin,petugas,masyarakat',
    ]);

    // Membuat user baru
    Petugas::create([
        'nik'           => $request->nik,
        'nama_lengkap'  => $request->nama_lengkap,
        'jenis_kelamin' => $request->jenis_kelamin,
        'username'      => $request->username,
        'password'      => bcrypt($request->password),
        'no_telepon'    => $request->no_telepon,
        'alamat'        => $request->alamat,
        'role'          => $request->role,
    ]);

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

        // Proses autentikasi menggunakan Auth::attempt
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect('/index');
                case 'petugas':
                    return redirect('/index');
                default:
                    return redirect('/dashboard_masyarakat');
            }
        }


        // Jika login gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username'));
    }







    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }

}
