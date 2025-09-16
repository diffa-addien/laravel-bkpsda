<?php

namespace App\Http\Controllers;

use App\Models\LamanBidang;
use Illuminate\Http\Request;

class LamanBidangController extends Controller
{
    public function show(LamanBidang $lamanBidang)
    {
        if (!$lamanBidang->is_published) {
            abort(404);
        }
        return view('bidang.laman-bidang.show', ['laman' => $lamanBidang]);
    }
}