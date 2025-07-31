<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaruController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\verifikasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home2');
})->name('home2');

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');




// Form daftar
// Route::get('/baru', function () {
//     return view('pages.formdaftar.baru');
// })->name('baru');

Route::get('baru', [BaruController::class, 'baru_index'])->name('baru.index');
Route::post('baru', [BaruController::class, 'baru'])->name('daftar.baru');


Route::get('/berkala', function () {
    return view('pages.formdaftar.berkala');
})->name('berkala');

Route::get('/hilangrusak', function () {
    return view('pages.formdaftar.hilangrusak');
})->name('hilangrusak');

Route::get('/mutasikeluar', function () {
    return view('pages.formdaftar.mutasikeluar');
})->name('mutasikeluar');

Route::get('/mutasimasuk', function () {
    return view('pages.formdaftar.mutasimasuk');
})->name('mutasimasuk');

Route::get('/numpangkeluar', function () {
    return view('pages.formdaftar.numpangkeluar');
})->name('numpangkeluar');

Route::get('/numpangmasuk', function () {
    return view('pages.formdaftar.numpangmasuk');
})->name('numpangmasuk');

Route::get('/ubah', function () {
    return view('pages.formdaftar.ubah');
})->name('ubah');


// Admin -> Auth

Route::get('dashboard', [PendaftaranController::class, 'index'])->name('dashboard');

Route::get('verifikasi/{id}', [VerifikasiController::class, 'verifikasi_index'])->name('verifikasi.index');
Route::post('verifikasi/{id}', [VerifikasiController::class, 'verifikasi'])->name('verifikasi');



Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');

// Route::get('/pengaturan', function () {
//     return view('pages.admin.pengaturan');
// })->name('pengaturan');

Route::get('pengaturan', [SettingController::class, 'index'])->name('pengaturan');
Route::post('pengaturan', [SettingController::class, 'update'])->name('jml_max');


Route::post('pengaturan/user', [AuthController::class, 'store'])->name('user.store');
Route::get('pengaturan/user/{id}', [AuthController::class, 'delete'])->name('user.delete');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
