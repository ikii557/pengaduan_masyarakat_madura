<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
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
            'password' => 'required|string|min:6|confirmed',
            'no_hp' => 'required|string|max:15',
            'role' => 'required|string|in:admin,petugas', // Assuming these are the roles
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'role' => $request->role,
        ]);

        return redirect('admin.profile.admin')->with('success', 'Petugas berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified petugas.
     */
    public function edit($id)
    {
        $admins = Petugas::findOrFail($id); // Find the petugas by ID
        return view('admin.profile.edit_admin', compact('admins'));
    }

    /**
     * Update the specified petugas in storage.
     */
    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);

        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:petugass,username,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'no_hp' => 'required|string|max:15',
            'role' => 'required|string|in:admin,petugas',
        ]);

        $data = $request->only(['nama_petugas', 'username', 'no_hp', 'role']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);

        return redirect()->route('admin.index')->with('success', 'Petugas berhasil diperbarui.');
    }

    /**
     * Remove the specified petugas from storage.
     */
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect('admin')->with('success', 'Petugas berhasil dihapus.');
    }

}
