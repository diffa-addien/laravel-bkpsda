<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pengumuman;
use App\Models\Berita; // <-- Tambahkan ini
use App\Http\Controllers\BeritaController; // <-- Tambahkan ini

// Halaman Beranda
Route::get('/', function () {
    // Ambil data untuk marquee pengumuman
    $pengumumans = Pengumuman::where('is_active', true)->latest()->pluck('judul');

    // Ambil 4 berita terbaru yang sudah dipublikasikan untuk homepage
    $beritas = Berita::where('is_published', true)->latest('published_at')->take(4)->get();
    
    return view('beranda', [
        'pengumumans' => $pengumumans,
        'beritas' => $beritas, // Kirim data berita ke view
    ]);
});

// Halaman List dan Detail Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');