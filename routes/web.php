<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
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

// Routes accessible after login
Route::middleware(['auth'])->group(function () {
    // Routes accessible for all roles: admin, petugas, masyarakat
    Route::middleware(['role:petugas,admin,masyarakat'])->group(function () {

        // Dashboard and general views
        Route::get('/index', function () {
            return view('admin.dasboard');
        });
        Route::get('profile', function () {
            return view('admin.profile.masyarakat');
        });
        Route::get('laporan', function () {
            return view('admin.laporan.laporan_keamanan');
        });

        // Admin routes
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'index']);
            Route::get('/create', [AdminController::class, 'create']);
            Route::post('/store', [AdminController::class, 'store']);
            Route::get('/edit/{id}', [AdminController::class, 'edit']);
            Route::post('/update/{id}', [AdminController::class, 'update']);
            Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
        });

        // Petugas routes
        Route::prefix('petugas')->group(function () {
            Route::get('/', [PetugasController::class, 'index']);
            Route::get('/create', [PetugasController::class, 'create']);
            Route::post('/store', [PetugasController::class, 'store']);
            Route::get('/edit/{id}', [PetugasController::class, 'edit']);
            Route::post('/update/{id}', [PetugasController::class, 'update']);
            Route::delete('/destroy/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
        });

        // Masyarakat routes
        Route::prefix('masyarakat')->group(function () {
            Route::get('/', [MasyarakatController::class, 'index']);
            Route::get('/create', [MasyarakatController::class, 'create']);
            Route::post('/store', [MasyarakatController::class, 'store']);
            Route::get('/edit/{id}', [MasyarakatController::class, 'edit']);
            Route::post('/update/{id}', [MasyarakatController::class, 'update']);
            Route::delete('/destroy/{id}', [MasyarakatController::class, 'destroy']);
        });

        // Logout route
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    // Additional role-based routes
    Route::middleware(['role:petugas'])->group(function () {
        // Tambahkan route khusus petugas di sini jika ada
    });

    Route::middleware(['role:masyarakat'])->group(function () {
        // Tambahkan route khusus masyarakat di sini jika ada
    });
});
