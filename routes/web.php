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

Route::middleware(['guest'])->group(function(){
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/store/register', [AuthController::class, 'storeregister']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/store/login', [AuthController::class, 'storelogin']);

});






// sesudah login
Route::middleware(['auth'])->group(function(){
    Route::middleware(['role:petugas,admin'])->group(function(){

        Route::get('/index', function () {
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
    });
    Route::middleware('auth:petugas')->group(function () {

    });

    Route::middleware(['role:masyarakat'])->group(function () {


    });
    Route::post('/logout', [AuthController::class, 'logout']);
});
