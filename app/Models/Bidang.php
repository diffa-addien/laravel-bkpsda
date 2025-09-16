<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'bidangs';

    protected $fillable = [
        'judul',
        'slug',
        'sub_halaman_1_judul',
        'sub_halaman_1_url',
        'sub_halaman_1_deskripsi',
        'sub_halaman_2_judul',
        'sub_halaman_2_url',
        'sub_halaman_2_deskripsi',
        'sub_halaman_3_judul',
        'sub_halaman_3_url',
        'sub_halaman_3_deskripsi',
        'user_id',
        'is_published',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}