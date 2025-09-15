<?php

namespace App\Http\Controllers;

use App\Models\Profil; // <-- Pastikan model dipanggil
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function show(Profil $profil)
    {
        // Jika halaman yang diakses tidak di-publish, tampilkan halaman 404 Not Found
        if (!$profil->is_published) {
            abort(404);
        }

        return view('profil.show', compact('profil'));
    }
}