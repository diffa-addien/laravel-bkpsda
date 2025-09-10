<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan halaman list semua berita dengan paginasi.
     */
    public function index()
    {
        $beritas = Berita::where('is_published', true)
                         ->latest('published_at')
                         ->paginate(9); // 9 berita per halaman

        return view('berita.index', compact('beritas'));
    }

    /**
     * Menampilkan halaman detail satu berita.
     */
    public function show(Berita $berita)
    {
        // Pastikan berita yang diakses sudah di-publish (opsional, tapi disarankan)
        if (!$berita->is_published) {
            abort(404);
        }

        return view('berita.show', compact('berita'));
    }
}