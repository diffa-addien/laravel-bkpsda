<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media; // <-- Panggil model Media dari Spatie

class GaleriController extends Controller
{
    public function index()
    {
        // Definisikan koleksi media mana saja yang ingin ditampilkan sebagai galeri
        $collections = [
            'berita_images', // Ingat, ini nama koleksi dari fitur Berita
            'sliders',       // Ini nama koleksi dari fitur Slider
        ];

        // Ambil semua media dari koleksi tersebut, urutkan dari yang terbaru
        $mediaItems = Media::whereIn('collection_name', $collections)
                            ->latest()
                            ->paginate(20); // Tampilkan 20 gambar per halaman

        return view('galeri.index', ['mediaItems' => $mediaItems]);
    }
}