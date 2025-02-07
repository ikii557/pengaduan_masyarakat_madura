<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    // Menampilkan daftar masyarakat
    public function index()
    {
        // Mengambil semua data masyarakat dan menggunakan paginasi 10 data per halaman
        $masyarakats = Petugas::paginate(10);
        return view('admin.masyarakat.masyarakat', compact('masyarakats'));
    }

    // Tambahkan fungsi-fungsi lain untuk edit, delete, dll.

    public function dashboard()
{
    // Check if the user is authenticated
    if (!Auth::check()) {
        return redirect('/login')->withErrors('Silakan login terlebih dahulu.');
    }

    // Retrieve categories and return the view if authenticated
    $kategoris = Kategori::all();
    return view('masyarakat.masyarakat', compact('kategoris'));
}

    // Menampilkan halaman tambah data masyarakat
    public function create()
    {
        return view('admin.masyarakat.tambahmasyarakat'); // Sesuaikan dengan nama view
    }

    // Menyimpan data masyarakat baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|string|min:8',
            'no_telepon' => 'required|max:15',
            'alamat' => 'required|string',
        ], [
            'nik.required' => 'NIK harus diisi',
            'nik.unique' => 'NIK sudah terdaftar, silakan gunakan NIK lain',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah terdaftar, silakan pilih username lain',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'no_telepon.required' => 'Nomor telepon harus diisi',
            'alamat.required' => 'Alamat harus diisi',
        ]);

        // Create a new Masyarakat record
        Petugas::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ]);

        // Flash success message
        session()->flash('success', 'Masyarakat berhasil ditambahkan!');


        return redirect('masyarakat')->with('success', 'Data masyarakat berhasil ditambahkan.');
    }

    // Menampilkan halaman edit data masyarakat
    public function edit($id)
    {
        $masyarakat = Petugas::findOrFail($id);
        return view('admin.masyarakat.edit_masyarakat', compact('masyarakat')); // Sesuaikan dengan nama view
    }

    // Memperbarui data masyarakat
    public function update(Request $request, $id)
    {
        $masyarakat = Petugas::findOrFail($id);

        $request->validate([
            'nik' => 'required|max:16|unique:masyarakats,nik,' . $id,
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username' => 'required|max:255|unique:masyarakats,username,' . $id,
            'password' => 'nullable|string|min:8',
            'no_telepon' => 'required|max:15',
            'alamat' => 'required|string',
        ]);

        $masyarakat->update([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $masyarakat->password,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect('masyarakat')->with('success', 'Data masyarakat berhasil diperbarui.');
    }

    // Menghapus data masyarakat
    public function destroy($id)
    {
        $masyarakat = Petugas::findOrFail($id);
        $masyarakat->delete();

        return response()->json(['success' => true, 'message' => 'Data masyarakat berhasil dihapus.']);
    }

    //tambah pengaduan
    public function storepengaduan(Request $request)
{
    $validatedData = $request->validate([
        'masyarakat_id' => 'required|exists:masyarakats,id',
        'kategori_id' => 'required|exists:kategoris,id',
        'tanggal_pengaduan' => 'required|date',
        'isi_pengaduan' => 'required|string|max:500',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'status' => 'required|string|in:pending,proses,selesai',
    ]);

    if ($request->hasFile('foto')) {
        $validatedData['foto'] = $request->file('foto')->store('pengaduan_images', 'public');
    }

    Pengaduan::create($validatedData);

    return redirect('masyarakat_table')->with('success', 'Pengaduan berhasil ditambahkan.');
}

public function data()
{
    // Ambil hanya pengaduan milik user masyarakat yang sedang login
    $pengaduans = Pengaduan::where('masyarakat_id', Auth::id())->get();
    return view('masyarakat.daftar_pengaduan', compact('pengaduans'));
}


}
