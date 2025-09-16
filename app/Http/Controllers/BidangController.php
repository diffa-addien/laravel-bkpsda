<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function show(Bidang $bidang)
    {
        if (!$bidang->is_published) {
            abort(404);
        }

        return view('bidang.show', compact('bidang'));
    }
}