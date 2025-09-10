<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pengumuman;
use App\Models\Berita; // <-- Tambahkan ini
use App\Http\Controllers\BeritaController; // <-- Tambahkan ini

// Halaman Beranda
Route::get('/', function () {
    $beritas = Berita::where('is_published', true)->latest('published_at')->take(4)->get();
    return view('beranda', ['beritas' => $beritas]);
});

// Halaman List dan Detail Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');