<?php

use App\Http\Controllers\SiswaEkskulController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('siswa_ekskul.index');
});

Route::resource('siswa_ekskul', SiswaEkskulController::class);