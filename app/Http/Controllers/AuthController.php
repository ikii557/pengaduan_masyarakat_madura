<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle the register process
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:petugass',
            'password' => 'required|string|min:8|confirmed',
            'no_hp' => 'required|string|max:15',
            'role' => 'required|string|in:admin,petugas,masyarakat',
        ]);

        // Create a new user
        Petugas::create([
            'nama_petugas' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'role' => $request->role,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login process
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to login
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Redirect based on role
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($role === 'petugas') {
                return redirect('/petugas/dashboard');
            } else {
                return redirect('/masyarakat/dashboard');
            }
        }

        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
