<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

// Route::get('/home', function () {
//     return view('home');
// })->name('home');

Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');
Route::get('/status', function () {
    return view('status');
})->name('status');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
