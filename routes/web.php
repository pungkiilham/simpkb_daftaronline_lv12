<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home2');
})->name('home2');
// Route::get('/status', function () {
//     return view('status');
// })->name('status');

// Route::get('/daftar', function () {
//     return view('daftar');
// })->name('daftar');

Route::get('/login', function () {
    return view('login');
})->name('login');




// Form daftar
Route::get('/baru', function () {
    return view('formdaftar.baru');
})->name('baru');

Route::get('/berkala', function () {
    return view('formdaftar.berkala');
})->name('berkala');

Route::get('/hilangrusak', function () {
    return view('formdaftar.hilangrusak');
})->name('hilangrusak');

Route::get('/mutasikeluar', function () {
    return view('formdaftar.mutasikeluar');
})->name('mutasikeluar');

Route::get('/mutasimasuk', function () {
    return view('formdaftar.mutasimasuk');
})->name('mutasimasuk');

Route::get('/numpangkeluar', function () {
    return view('formdaftar.numpangkeluar');
})->name('numpangkeluar');

Route::get('/numpangmasuk', function () {
    return view('formdaftar.numpangmasuk');
})->name('numpangmasuk');

Route::get('/ubah', function () {
    return view('formdaftar.ubah');
})->name('ubah');


// Admin -> Auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
