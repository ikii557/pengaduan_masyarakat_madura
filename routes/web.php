<?php

use App\Http\Controllers\NavbarController;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\MasyarakatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth routes
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/store/register', [AuthController::class, 'storeregister']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/store/login', [AuthController::class, 'storelogin']);
});


Route::middleware(['auth', 'role:petugas,admin,masyarakat'])->group(function () {

    // Dashboard and general views
    Route::get('/index', function () {
        return view('admin.dasboard');
    });

    Route::get('/profile', function () {
        return view('admin.profile.masyarakat');
    });

    Route::get('/laporan', function () {
        return view('admin.laporan.laporan_keamanan');
    });

    // Admin routes
    Route::get('/admin', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/tambah_admin', [AdminController::class, 'create']);
    Route::post('/store/admin', [AdminController::class, 'store']);
    Route::get('/edit_admin/{id}', [AdminController::class, 'edit']);
    Route::post('/update/admin/{id}', [AdminController::class, 'update']);
    Route::delete('/destroy_admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Petugas routes
    Route::get('/petugas', [PetugasController::class, 'index']);
    Route::get('/tambah_petugas', [PetugasController::class, 'create']);
    Route::post('/store/petugas', [PetugasController::class, 'store']);
    Route::get('/edit_petugas/{id}', [PetugasController::class, 'edit']);
    Route::post('/update/petugas/{id}', [PetugasController::class, 'update']);
    Route::delete('/destroy_petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');

    //kategori
    Route::get('kategori',[KategoriController::class,'index']);
    Route::get('tambah_kategori',[KategoriController::class,'create']);
    Route::post('/store/kategori',[KategoriController::class,'store']);
    Route::get('/edit_kategori/{id}',[KategoriController::class,'edit']);
    Route::post('/update/kategori/{id}',[KategoriController::class,'update']);
    Route::delete('/destroy_kategori/{id}',[KategoriController::class,'destroy'])->name('kategori.destroy');

    // Masyarakat routes
    Route::get('daftar_pengaduan',[MasyarakatController::class,'data']);
    Route::get('/masyarakat', [MasyarakatController::class, 'index']);
    Route::get('dashboard_masyarakat',[MasyarakatController::class,'dashboard']);
    Route::get('/masyarakat/tambah_masyarakat', [MasyarakatController::class, 'create']);
    Route::post('/store/masyarakat', [MasyarakatController::class, 'store']);
    Route::get('/edit_masyarakat/{id}', [MasyarakatController::class, 'edit']);
    Route::post('/update/masyarakat/{id}', [MasyarakatController::class, 'update']);
    Route::delete('/destroy_masyarakat/{id}', [MasyarakatController::class, 'destroy'])->name('masyarakat.destroy');

    //data pengaduan
    Route::get('data_pengaduan',[PengaduanController::class,'index']);
    Route::get('tambah_pengaduan',[PengaduanController::class,'create']);
    Route::post('/store/pengaduan', [PengaduanController::class, 'store']);
    Route::get('/edit_pengaduan/{id}',[PengaduanController::class,'edit']);
    Route::post('/update/data_pengaduan/{id}',[PengaduanController::class,'update']);
    Route::delete('/destroy_pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('destroy_pengaduan');



    //data tanggapan
    Route::get('data_tanggapan', [PengaduanController::class, 'tanggapan'])->name('tanggapan.index');
    Route::get('/tambah_tanggapan/{id}', [PengaduanController::class, 'createtanggapan']);
    Route::post('/update_tanggapan/{id}', [PengaduanController::class, 'updateTanggapan']);
    Route::delete('/delete_tanggapan/{id}', [PengaduanController::class, 'destroy']);
    Route::get('/edit_tanggapan/{id}', [PengaduanController::class, 'edit']);
    Route::delete('/destroy_tanggapan/{id}',[PengaduanController::class,'destroy'])->name('tanggapan.destroy');

    //generate laporan
    Route::get('/generate_laporan', [PengaduanController::class, 'report'])->name('pengaduan.laporan');
    Route::get('/export-laporan-pengaduan', [PengaduanController::class, 'exportLaporan'])->name('pengaduan.export');
    Route::get('/formulir_laporan/{id}',[PengaduanController::class,'formulir']);

    //profie
    Route::get('/detail_profile/{id}',[AdminController::class,'detailprofile']);
    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
