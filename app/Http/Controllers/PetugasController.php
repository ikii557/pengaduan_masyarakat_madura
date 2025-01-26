<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller {

    // Display a listing of the petugass
    public function index(){
        $petugass = Petugas::all();
        return view('admin.data_petugas.petugas_index', compact('petugass'));
    }

    // Show the form for creating a new petugas
    public function create(){
        return view('admin.data_petugas.tambah_petugas');
    }

    // Store a newly created petugas in the database
    public function store(Request $request){
        // Validate the request data
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:petugass',
            'password' => 'required|string|min:8',
            'no_hp' => 'required|string|max:15',
            'role' => 'required|string|in:admin,superadmin,petugas',
        ]);

        // Create a new Petugas instance and save the data
        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => bcrypt($request->password), // Hash the password
            'no_hp' => $request->no_hp,
            'role' => $request->role,
        ]);

        // Redirect to the petugas index with a success message
        return redirect('petugas')->with('success', 'Petugas berhasil ditambahkan!');
    }

    // Show the form for editing the specified petugas
    public function edit($id)
{
    $petugas = Petugas::findOrFail($id);
    return view('admin.data_petugas.edit_petugas', compact('petugas'));
}


    // Update the specified petugas in the database
    public function update(Request $request, $id){
        // Validate the request data
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:petugass,username,' . $id,
            'password' => 'nullable|string|min:8',
            'no_hp' => 'required|string|max:15',
            'role' => 'required|string|in:admin,superadmin,petugas',
        ]);

        $petugas = Petugas::findOrFail($id);

        // Update the petugas data
        $petugas->update([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $petugas->password,
            'no_hp' => $request->no_hp,
            'role' => $request->role,
        ]);

        // Redirect back to petugas index with a success message
        return redirect('petugas')->with('success', 'Petugas berhasil diperbarui!');
    }

    // Remove the specified petugas from the database
    public function destroy($id){
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus!');
    }
}
