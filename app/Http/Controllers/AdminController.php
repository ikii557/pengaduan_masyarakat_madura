<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of all Petugas.
     */
    public function show()
{
    $admins = Petugas::all();

    return view('admin.profile.admin', compact('admins'));
}


    /**
     * Show the form for creating a new Petugas.
     */
    public function create()
    {
        $admins = Petugas::all();
        return view('admin.profile.tambah_admin',compact('admins'));
    }

    /**
     * Store a newly created Petugas in storage.
     */
    /**
 * Store a newly created Petugas in storage.
 */
    public function store(Request $request)
    {
        $request->validate([
            'nik'           => 'required|string|unique:users,nik', // Menambahkan regex untuk validasi NIK (hanya angka, 16 karakter)
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username'      => 'required|string|unique:users,username',
            'password'      => 'required|string|min:8',
            'no_telepon'    => 'required|string|max:15|regex:/^\+?[\d\s\-]+$/', // Regex untuk validasi nomor telepon (opsional format negara)
            'alamat'        => 'required|string',
            'role'          => 'required|in:admin,petugas,masyarakat',
        ], [
            'nik.required'           => 'NIK harus diisi.',
            'nik.unique'             => 'NIK ini sudah terdaftar.',
            'nik.max'                => 'NIK tidak boleh lebih dari 16 karakter.',
            'nama_lengkap.required'  => 'Nama lengkap harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'username.required'      => 'Username harus diisi.',
            'username.unique'        => 'Username ini sudah terdaftar.',
            'password.required'      => 'Password harus diisi.',
            'password.min'           => 'Password minimal 8 karakter.',
            'no_telepon.required'    => 'Nomor telepon harus diisi.',
            'no_telepon.regex'       => 'Nomor telepon hanya boleh berisi angka, spasi, atau tanda minus.',
            'alamat.required'        => 'Alamat harus diisi.',
            'role.required'          => 'Role harus dipilih.',
        ]);


        Petugas::create([
            'nik'           => $request->nik,
            'nama_petugas'  => $request->nama_petugas,
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username'      => $request->username,
            'password'      => bcrypt($request->password),
            'no_telepon'    => $request->no_telepon,
            'alamat'        => $request->alamat,
            'role'          => $request->role,
        ]);

        return redirect('admin')->with('success', 'Admin berhasil ditambahkan.');
    }

/**
 * Update the specified Petugas in storage.
 */


    /**
     * Show the form for editing the specified Petugas.
     */
    public function edit($id)
    {
        $admins = Petugas::findOrFail($id);
        return view('admin.profile.edit_admin', compact('admins'));
    }

    /**
     * Update the specified Petugas in storage.
     */
    public function update(Request $request, $id) {
        $admins = User::findOrFail($id);

        // Validation rules
        $request->validate([
            'nik' => 'required|string|max:16|unique:users,nik,' . $id,
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8',
            'no_telepon' => 'required|string|max:15|regex:/^[0-9]+$/',
            'alamat' => 'required|string|max:255',
            'role' => 'required|in:admin,petugas,masyarakat',
        ]);

        // Update the petugas data
        $admins->nik = $request->nik;
        $admins->nama_lengkap = $request->nama_lengkap;
        $admins->jenis_kelamin = $request->jenis_kelamin;
        $admins->username = $request->username;

        // Hash password only if provided
        if ($request->filled('password')) {
            $admins->password = bcrypt($request->password);
        }

        $admins->no_telepon = $request->no_telepon;
        $admins->alamat = $request->alamat;
        $admins->role = $request->role;

        $admins->save();

        return redirect('admin')->with('success', 'admin berhasil diperbarui!');
    }

    public function detailprofile($id){
        $admins = Petugas::findOrFail($id);
        return view('admin.profile.detail_profile',compact('admins'));
    }


    /**
     * Remove the specified Petugas from storage.
     */
    public function destroy($id)
    {
        $admin = Petugas::findOrFail($id);
        $admin->delete();

        return redirect('admin')->with('success', 'Admin berhasil dihapus.');
    }
}
