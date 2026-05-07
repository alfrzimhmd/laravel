<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;

Route::redirect('/', '/beranda');

// RUTE BERANDA
Route::get('/beranda', function () {
    return view('beranda');
});

// Rute untuk menampilkan halaman daftar mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

// Rute untuk menampilkan halaman form tambah data mahasiswa
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);

// Rute untuk memproses data dari form tambah mahasiswa (POST)
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);

Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);


// Rute untuk menampilkan halaman daftar dosen 
Route::get('/dosen', [DosenController::class, 'index']);

// Rute untuk menampilkan halaman form tambah data dosen
Route::get('/dosen/create', [DosenController::class, 'create']);

// Rute untuk memproses data dari form tambah dosen (POST)
Route::post('/dosen', [DosenController::class, 'store']);

Route::get('/dosen/{id}/edit', [DosenController::class, 'edit']);
Route::put('/dosen/{id}', [DosenController::class, 'update']);
Route::delete('/dosen/{id}', [DosenController::class, 'destroy']);

