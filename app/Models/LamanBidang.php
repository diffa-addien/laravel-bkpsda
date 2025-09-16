<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LamanBidang extends Model
{
    use HasFactory;

    protected $table = 'laman_bidangs';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'user_id',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}