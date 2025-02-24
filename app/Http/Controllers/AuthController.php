<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Petugas;
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
    $allowedPrefixes = ['330115']; // Kode kecamatan valid
    $allowedVillages = ['Cukang Awi', 'Purwasari', 'Dusun Madura', 'Desa Madura'];

    $request->validate([
        'nik' => ['required', 'string', 'unique:users,nik', function ($attribute, $value, $fail) use ($allowedPrefixes) {
            $value = (string) $value;
            $nikPrefix = substr($value, 0, 6);

            // Validasi kecamatan dari NIK
            if (!in_array($nikPrefix, $allowedPrefixes)) {
                $fail('NIK bukan berasal dari Kecamatan Wanareja, Madura.');
                return;
            }

                            /// Ambil tanggal lahir dari NIK (6 digit dari indeks ke-6)
                $waktulahir = substr($value, 6, 6);
                $tahun = substr($waktulahir, 0, 2);
                $bulan = substr($waktulahir, 2, 2);
                $hari = substr($waktulahir, 4, 2);

                // Jika gender perempuan, angka hari lebih dari 40
                if ((int)$hari > 40) {
                    $hari -= 40;
                }

                // Tentukan tahun lahir dengan logika yang benar
                $saatinitahun = (int) date('Y');
                $abadsaatini = (int) substr($saatinitahun, 0, 2) * 100;
                $twoDigittahun = (int) $tahun;

                // Koreksi tahun lahir
                if ($twoDigittahun >= 0 && $twoDigittahun <= (int) date('y')) {
                    $fulltahun = $abadsaatini + $twoDigittahun; // Tahun 2000-an
                } else {
                    $fulltahun = ($abadsaatini - 100) + $twoDigittahun; // Tahun 1900-an
                }

                // Periksa apakah tanggal lahir valid
                if (!checkdate((int) $bulan, (int) $hari, (int) $fulltahun)) {
                    $fail('Format tanggal lahir dalam NIK tidak valid.');
                    return;
                }

                // Hitung usia berdasarkan tanggal lahir
                $birthDate = new DateTime("$fulltahun-$bulan-$hari");
                $tohari = new DateTime();
                $age = $tohari->diff($birthDate)->y;

                

        }],
        'nama_lengkap' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        'email' => 'required|string|email|unique:users,email',
        'username' => 'required|string|unique:users,username',
        'password' => 'required|string|min:8',
        'no_telepon' => 'required|string|max:15',
        'alamat' => ['required', 'string', function ($attribute, $value, $fail) use ($allowedVillages, $request) {
            $nikPrefix = substr((string) $request->nik, 0, 6);
            if (in_array($nikPrefix, ['330115'])) {
                $valid = false;
                foreach ($allowedVillages as $village) {
                    if (stripos($value, $village) !== false) {
                        $valid = true;
                        break;
                    }
                }
                if (!$valid) {
                    $fail('Alamat tidak sesuai! Gunakan alamat di wilayah Madura.');
                }
            }
        }],
        'role' => 'required|in:admin,petugas,masyarakat',
    ], [
        'nik.unique' => 'NIK sudah terdaftar',
        'email.unique' => 'Email sudah terdaftar, gunakan email lain.',
        'username.unique' => 'Username sudah digunakan, silakan pilih username lain.',
        'password.min' => 'Password minimal 8 karakter.',
    ]);

    // Simpan data ke database
    $user = Petugas::create([
        'nik' => $request->nik,
        'nama_lengkap' => $request->nama_lengkap,
        'jenis_kelamin' => $request->jenis_kelamin,
        'email' => $request->email,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'no_telepon' => $request->no_telepon,
        'alamat' => $request->alamat,
        'role' => $request->role,
    ]);

    // **Login otomatis setelah registrasi**
    Auth::attempt(['email' => $request->email, 'password' => $request->password]);

    // **Redirect berdasarkan peran (role)**
    if ($user->role === 'admin') {
        return redirect('/index')->with('success', 'Registrasi berhasil! Anda masuk sebagai Admin.');
    } elseif ($user->role === 'petugas') {
        return redirect('/index')->with('success', 'Registrasi berhasil! Anda masuk sebagai Petugas.');
    } else {
        return redirect('/dashboard_masyarakat')->with('success', 'Registrasi berhasil! Anda masuk sebagai Masyarakat.');
    }
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
        'email'    => 'required|email',  // Email harus berupa format email yang valid
        'password' => 'required|string|min:8',
    ], [
        'email.required' => 'Email harus diisi.',
        'email.email' => 'Email harus dalam format yang valid.',
        'password.required' => 'Password harus diisi.',
        'password.string' => 'Password harus berupa teks.',
        'password.min' => 'Password minimal 8 karakter.',
    ]);

    // Proses autentikasi menggunakan email
    if (Auth::attempt([
        'email' => $request->email,  // Gunakan email untuk login
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
        'email' => 'Email atau password salah.',
    ])->withInput($request->only('email'));
}








    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/masyarakat_daerah_desa_madura')->with('message', 'Logout berhasil!');
    }


}
