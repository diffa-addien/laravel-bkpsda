<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    /**
     * Menampilkan halaman list semua dokumen dengan pencarian dan paginasi.
     */
    public function index(Request $request)
    {
        // Ambil kata kunci pencarian dari request
        $search = $request->input('search');

        // Query dasar untuk dokumen yang sudah dipublikasikan
        $dokumenQuery = Dokumen::where('is_published', true);

        // Jika ada kata kunci pencarian, filter berdasarkan judul
        if ($search) {
            $dokumenQuery->where('judul', 'like', '%' . $search . '%');
        }

        // Ambil data dengan paginasi dan urutkan berdasarkan yang terbaru
        $dokumens = $dokumenQuery->latest()->paginate(12); // 12 dokumen per halaman

        return view('dokumen.index', compact('dokumens'));
    }
}