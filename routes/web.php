<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pengumuman;
use App\Models\Berita; // <-- Tambahkan ini
use App\Http\Controllers\BeritaController; // <-- Tambahkan ini
use App\Models\Slider;
use App\Http\Controllers\DokumenController; // <-- Pastikan ini ada di atas
use App\Http\Controllers\GaleriController; // <-- Pastikan ini ada di atas



// Halaman Beranda
Route::get('/', function () {
    $beritas = Berita::where('is_published', true)->latest('published_at')->take(4)->get();$sliders = Slider::where('is_active', true) // 1. Ambil slider yang statusnya aktif
                     ->orderBy('sort_order')   // 2. Urutkan berdasarkan urutan
                     ->get();                   // 3. Eksekusi query
    
    return view('beranda', [
        'beritas' => $beritas,
        'sliders' => $sliders,
    ]);
});

// Halaman List dan Detail Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/unduhan', [DokumenController::class, 'index'])->name('dokumen.index');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
