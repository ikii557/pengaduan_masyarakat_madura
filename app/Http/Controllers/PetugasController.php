<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User; // Menggunakan model User sesuai tabel users
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller {

    // Display a listing of the petugas
    public function index() {
        $petugass = User::whereIn('role', ['admin', 'petugas'])->get();
        return view('admin.data_petugas.petugas_index', compact('petugass'));
    }

    // Show the form for creating a new petugas
    public function create() {
        return view('admin.data_petugas.tambah_petugas');
    }

    // Store a newly created petugas in the database
    public function store(Request $request) {
        // Validasi data input
        $request->validate([
            'nik' => 'required|string|max:16|unique:users,nik',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
            'no_telepon' => 'required|string|max:15|regex:/^[0-9]+$/',
            'alamat' => 'required|string',
            'role' => 'required|in:admin,petugas',
        ]);

        // Simpan data ke tabel users
        Petugas::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'password' => bcrypt($request->password), // Hash password
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);

        return redirect('petugas')->with('success', 'Petugas berhasil ditambahkan!');
    }

    // Show the form for editing the specified petugas
    public function edit($id) {
        $petugas = User::findOrFail($id);
        return view('admin.data_petugas.edit_petugas', compact('petugas'));
    }

    // Update the specified petugas in the database
    public function update(Request $request, $id) {
        $petugas = User::findOrFail($id);

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
        $petugas->nik = $request->nik;
        $petugas->nama_lengkap = $request->nama_lengkap;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->username = $request->username;

        // Hash password only if provided
        if ($request->filled('password')) {
            $petugas->password = bcrypt($request->password);
        }

        $petugas->no_telepon = $request->no_telepon;
        $petugas->alamat = $request->alamat;
        $petugas->role = $request->role;

        $petugas->save();

        return redirect('petugas')->with('success', 'Petugas berhasil diperbarui!');
    }


    // Remove the specified petugas from the database
    public function destroy($id) {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return response()->json(['success' => true, 'message' => 'Petugas berhasil dihapus.']);
    }
}
