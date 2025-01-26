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


// auth


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/store/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/store/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');





// dasar
Route::get('/', function () {
    return view('admin.dasboard');
});
Route::get('profile', function () {
    return view('admin.profile.masyarakat');
});
Route::get('laporan', function () {
    return view('admin.laporan.laporan_keamanan');
});

Route::get('admin', [AdminController::class,'index']);
Route::get('tambah_admin',[AdminController::class,'create']);
Route::post('/store/admin',[AdminController::class,'store']);
Route::get('edit_admin',[AdminController::class,'edit']);
Route::post('/update/admin',[AdminController::class,'update']);

Route::get('petugas', [PetugasController::class,'index']);
Route::get('tambah_petugas',[PetugasController::class,'create']);
Route::post('/store/petugas',[PetugasController::class,'store']);
Route::get('edit_petugas/{id}', [PetugasController::class, 'edit']);
Route::post('/update/petugas/{id}', [PetugasController::class, 'update']);




Route::get('masyarakat', function () {
    return view('masyarakat.masyarakat');
});
