<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', [ArtikelController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [ArtikelController::class, 'show'])->name('blog.show');

Route::prefix('admin')->group(function () {
    Route::get('/artikel', [ArtikelController::class, 'adminIndex'])->name('admin.artikel.index');
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('admin.artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('admin.artikel.store');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('admin.artikel.edit');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
    Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');
});

Route::post('/artikel/{artikelId}/comment', [CommentController::class, 'store'])->name('comment.store');