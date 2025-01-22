<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasyarakatController;
use Illuminate\Support\Facades\Route;

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

Route::get('petugas', function () {
    return view('admin.data_petugas.petugas_index');
});



Route::get('masyarakat', function () {
    return view('masyarakat.masyarakat');
});
