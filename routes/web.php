<?php

use App\Models\Pengaduan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
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

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin,petugas'])->group(function () {
        // index untuk admin dan petugas
        Route::get('/index', [DashboardController::class, 'index']);

        // Petugas Routes
        Route::get('/petugas', [PetugasController::class, 'index']);

        // Kategori Routes
        Route::get('kategori', [KategoriController::class, 'index']);

        // pengaduan untuk petugas
        Route::get('data_pengaduan', [PengaduanController::class, 'index']);

        // tanggapan
        Route::get('data_tanggapan', [PengaduanController::class, 'tanggapan'])->name('tanggapan.index');

        // profile
        Route::get('/detail_profile/{id}', [AdminController::class, 'detailprofile']);
    });
    Route::middleware(['role:admin'])->group(function () {
        // index untuk admin
        Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
        Route::get('/tambah_admin', [AdminController::class, 'create']);
        Route::post('/store/admin', [AdminController::class, 'store']);
        Route::get('/edit_admin/{id}', [AdminController::class, 'edit']);
        Route::post('/update/admin/{id}', [AdminController::class, 'update']);
        Route::delete('/destroy_admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

        //route petugas
        Route::get('/tambah_petugas', [PetugasController::class, 'create']);
        Route::post('/store/petugas', [PetugasController::class, 'store']);
        Route::get('/edit_petugas/{id}', [PetugasController::class, 'edit']);
        Route::post('/update/petugas/{id}', [PetugasController::class, 'update']);
        Route::delete('/destroy_petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');

        // kategori

        Route::get('tambah_kategori', [KategoriController::class, 'create']);
        Route::post('/store/kategori', [KategoriController::class, 'store']);
        Route::get('/edit_kategori/{id}', [KategoriController::class, 'edit']);
        Route::post('/update/kategori/{id}', [KategoriController::class, 'update']);
        Route::delete('/destroy_kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

        // Pengaduan and Tanggapan Management
        Route::get('/tambah_pengaduan', [PengaduanController::class, 'create']);
        Route::post('/store/pengaduan', [PengaduanController::class, 'store']);
        Route::get('/edit_pengaduan/{id}', [PengaduanController::class, 'edit']);
        Route::post('/update/data_pengaduan/{id}', [PengaduanController::class, 'update']);
        Route::delete('/destroy_pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('destroy_pengaduan');

        // tanggapan untuk admin
        Route::get('/tambah_tanggapan/{id}', [PengaduanController::class, 'createtanggapan']);
        Route::post('/update_tanggapan/{id}', [PengaduanController::class, 'updateTanggapan']);
        Route::get('/edit_tanggapan/{id}', [PengaduanController::class, 'editing']);
        Route::delete('/destroy_tanggapan/{id}', [PengaduanController::class, 'destroy'])->name('tanggapan.destroy');

        // Generate Reports
        Route::get('/generate_laporan', [PengaduanController::class, 'report'])->name('pengaduan.laporan');
        Route::get('/export-laporan-pengaduan', [PengaduanController::class, 'exportLaporan'])->name('pengaduan.export');
        Route::get('/formulir_laporan/{id}', [PengaduanController::class, 'formulir']);

        Route::get('/profile', function () {
            return view('admin.profile.masyarakat');
        });

        Route::get('/laporan', function () {
            return view('admin.laporan.laporan_keamanan');
        });

    });
    Route::middleware(['role:masyarakat'])->group(function () {
        Route::get('daftar_pengaduan', [MasyarakatController::class, 'data']);
        Route::get('tanggapandariadmin/{id}', [MasyarakatController::class, 'data_tanggapan']);
        Route::get('/masyarakat', [MasyarakatController::class, 'index']);
        Route::get('dashboard_masyarakat', [MasyarakatController::class, 'dashboard']);

    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

