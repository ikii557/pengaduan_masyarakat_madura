<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of all petugas.
     */
    public function index()
    {
        $admins = Petugas::all(); // Retrieve all petugas records
        return view('admin.profile.admin', compact('admins'));
    }

    /**
     * Show the form for creating a new petugas.
     */
    public function create()
    {
        return view('admin.profile.tambah_admin');
    }

    /**
     * Store a newly created petugas in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'no_hp' => 'required|string|max:15|regex:/^[0-9]+$/',
            'role' => 'required|string|in:admin,petugas,masyarakat', // Tambahkan role jika ada
        ], [
            'nama_petugas.required' => 'Nama admin harus diisi.',
            'nama_petugas.string' => 'Nama admin harus berupa teks.',
            'nama_petugas.max' => 'Nama admin tidak boleh lebih dari 255 karakter.',

            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'username.unique' => 'Username ini sudah terdaftar.',

            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus memiliki minimal 6 karakter.',
            'password.confirmed' => 'Password konfirmasi tidak sesuai.',

            'no_hp.required' => 'Nomor HP harus diisi.',
            'no_hp.string' => 'Nomor HP harus berupa teks.',
            'no_hp.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',
            'no_hp.regex' => 'Nomor HP hanya boleh berisi angka.',

            'role.required' => 'Role harus dipilih.',
            'role.string' => 'Role harus berupa teks.',
            'role.in' => 'Role yang dipilih tidak valid. Pilih admin, petugas, atau masyarakat.',
        ]);


        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'role' => $request->role,
        ]);

        return redirect('admin')->with('success', 'Petugas berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified petugas.
     */
    public function edit($id)
    {
        $admin = Petugas::findOrFail($id); // Find the petugas by ID
        return view('admin.profile.edit_admin', compact('admin'));
    }

    /**
     * Update the specified petugas in storage.
     */
    public function update(Request $request, $id)
    {
        $admin = Petugas::findOrFail($id);

        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'no_hp' => 'required|string|max:15',
            'role' => 'required|string|in:admin,petugas',
        ]);

        $data = $request->only(['nama_petugas', 'username', 'no_hp', 'role']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect('admin')->with('success', 'admin berhasil diperbarui.');
    }

    /**
     * Remove the specified petugas from storage.
     */


    public function destroy($id)
    {
        try {
            $petugas = Petugas::findOrFail($id);
            $petugas->delete();

            return response()->json([
                'success' => true,
                'message' => 'Petugas berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            Log::error("Error deleting petugas: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus petugas.'
            ]);
        }
    }



}
