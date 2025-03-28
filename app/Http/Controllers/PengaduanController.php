<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::paginate(3); // Pagination for petugas
        $pengaduans = Pengaduan::with('masyarakat', 'kategori')->latest()->paginate(10); // Pagination for pengaduans

        return view('admin.laporan.laporan_keamanan', compact('petugas', 'pengaduans'));
    }


    /**
     * Show the form for creating a new resource.
     */


     public function create()
     {

        $masyarakats = Petugas::all();
         $kategoris = Kategori::all(); // Pastikan Kategori memiliki data
         return view('masyarakat.create_pengaduan',compact('masyarakats','kategoris'));
     }


    /**
     * Store a newly created resource in storage.
     */


     public function store(Request $request)
     {
         // Validasi input
         $request->validate([
             'masyarakat_id' => 'nullable|exists:users,id',
             'kategori_id' => 'required|exists:kategoris,id',
             'tanggal_pengaduan' => 'nullable|date',
             'isi_pengaduan' => 'required|string',
             'foto' => 'nullable|mimes:jpeg,png,jpg|max:2048',
             'status' => 'nullable|in:ditolak,0,proses,selesai',
         ], [
             'kategori_id.required' => 'Kategori harus diisi.',
             'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
             'isi_pengaduan.required' => 'Isi pengaduan harus diisi.',
             'foto.mimes' => 'Foto harus dalam format jpeg, png, atau jpg.',
             'foto.max' => 'Ukuran foto maksimal 2MB.',
         ]);

         $data = $request->except('foto');

         // Jika ada file foto, upload dan simpan path-nya
         if ($request->hasFile('foto')) {
             $foto = $request->file('foto');
             $path = $foto->storeAs(
                 'public/foto_pengaduan',
                 now()->format('Y-m-d_H-i-s') . '.' . $foto->getClientOriginalExtension()
             );
             $data['foto'] = $path;
         }

         // Simpan data pengaduan
         $pengaduan = new Pengaduan();
         $pengaduan->masyarakat_id = auth()->user()->id; // Ambil ID user yang login
         $pengaduan->kategori_id = $request->kategori_id;
         $pengaduan->tanggal_pengaduan = $request->tanggal_pengaduan ?? now(); // Set waktu sekarang jika kosong
         $pengaduan->isi_pengaduan = $request->isi_pengaduan;
         $pengaduan->foto = $data['foto'] ?? null;
         $pengaduan->status = '0';
         $pengaduan->save();

         return redirect('daftar_pengaduan')->with('success', 'Data Berhasil Dibuat');
     }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan , $id)
    {
        $masyarakats = Petugas::all();
        $kategoris = Kategori::all();
        $pengaduan = Pengaduan::findOrFail($id);

        return view('admin.laporan.edit_laporan', compact('pengaduan', 'masyarakats', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */


     public function update(Request $request, $id)
     {
         $pengaduan = Pengaduan::findOrFail($id);
         $validatedData = $request->validate([
             'masyarakat_id' => 'required',
             'kategori_id' => 'required',
             'tanggal_pengaduan' => 'required|date',
             'isi_pengaduan' => 'required',
             'status' => 'nullable|in:ditolak,0,proses,selesai',

         ]);

         if ($request->hasFile('foto')) {
             $validatedData['foto'] = $request->file('foto')->store('pengaduan_images');
         }

         $pengaduan->update($validatedData);

         return redirect('data_pengaduan')->with('success', 'Pengaduan berhasil diperbarui!');
     }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        // Hanya bisa menghapus jika status bukan selesai atau ditolak
        if (!in_array($pengaduan->status, ['selesai', 'ditolak'])) {
            $pengaduan->delete();
            return redirect()->route('data_pengaduan')->with('success', 'Pengaduan berhasil dihapus.');
        } else {
            return redirect()->route('data_pengaduan')->with('error', 'Pengaduan tidak bisa dihapus.');
        }
    }




    public function hapus($id)
    {
        // Cari tanggapan berdasarkan ID
        $tanggapan = Tanggapan::findOrFail($id);

        // Hapus foto jika ada (jika ada foto terkait)
        if ($tanggapan->foto) {
            Storage::delete($tanggapan->foto);
        }

        // Hapus tanggapan
        $tanggapan->delete();

        // Redirect ke halaman daftar tanggapan dengan pesan sukses
        return redirect('data_tanggapan')->with('success', 'Tanggapan berhasil dihapus');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load('masyarakat', 'kategori', 'tanggapans');
        return view('pengaduan.show', compact('pengaduan'));
    }


        // Method for displaying filtered 'formulir_laporan'
        public function formulir(Request $request)
        {
            $query = Pengaduan::with(['petugas', 'kategori']);

            // Filter by month (start_date is the month value)
            if ($request->filled('start_date')) {
                $query->whereMonth('tanggal_pengaduan', $request->start_date);
            }

            // Filter by status (end_date is the status value)
            if ($request->filled('end_date')) {
                $query->where('status', $request->end_date);
            }

            $pengaduans = $query->latest()->get();
            $petugas = Petugas::all();

            return view('admin.generate.formulir_laporan', compact('pengaduans', 'petugas'));
        }

        // Method for generating the report with filters
        public function report(Request $request)
        {
            $query = Pengaduan::with(['petugas', 'kategori']);

            // Filter by month (start_date is the month value)
            if ($request->filled('start_date')) {
                $query->whereMonth('tanggal_pengaduan', $request->start_date);
            }

            // Filter by status (end_date is the status value)
            if ($request->filled('end_date')) {
                $query->where('status', $request->end_date);
            }

            $pengaduans = $query->latest()->get();

            return view('admin.generate.generate_laporan', compact('pengaduans'));
        }





        public function exportLaporan(Request $request)
        {
            $query = Pengaduan::with(['petugas', 'kategori', 'tanggapans.petugas']);

            // Filter berdasarkan bulan (jika ada)
            if ($request->filled('start_date')) {
                $month = $request->start_date;
                $query->whereMonth('tanggal_pengaduan', $month);
            }

            // Filter berdasarkan status (jika ada)
            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            // Urutkan berdasarkan tanggal terbaru
            $pengaduans = $query->latest()->get();

            // Load PDF view
            $pdf = Pdf::loadView('admin.generate.laporan_pdf', compact('pengaduans'))
                      ->setPaper('A4', 'portrait');

            return $pdf->stream('laporan_pengaduan.pdf');
        }














//data tanggapan

public function tanggapan()
{
    // Mengurutkan tanggapan berdasarkan tanggal terbaru
    $tanggapans = Tanggapan::orderBy('tanggal_tanggapan', 'desc')->paginate(4);
    return view('admin.tanggapan.data_tanggapan', compact('tanggapans'));
}




    public function createtanggapan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('admin.tanggapan.tambah_tanggapan', compact('pengaduan'));
    }



    public function updateTanggapan(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'isi_tanggapan' => 'required|string',
            'status' => 'required|in:ditolak,0,diproses,selesai',
        ]);

        // Cari pengaduan berdasarkan ID
        $pengaduan = Pengaduan::findOrFail($id);

        // Tambahkan atau perbarui tanggapan
        $tanggapan = Tanggapan::updateOrCreate(
            ['pengaduan_id' => $pengaduan->id],
            [
                'tanggal_tanggapan' => now(),
                'tanggapan' => $request->isi_tanggapan,
                'petugas_id' => auth()->user()->id,
            ]
        );

        // Perbarui status pengaduan
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect('data_tanggapan')->with('success', 'Tanggapan dan status pengaduan berhasil diperbarui.');
    }


    public function editing($id){
        $tanggapans = Tanggapan::findOrFail($id);
        $pengaduans = Pengaduan::findOrFail($id);
        return view('admin.tanggapan.edit_tanggapan' , compact('tanggapans','pengaduans'));
    }





}
