<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UlasanBuku extends Model
{
    use HasFactory;
    use HasFactory;
    protected $primaryKey = 'UlasanID';
    protected $guarded = ['UlasanID'];
    protected $table = 'ulasan_bukus';

    protected $fillable = [
        'UserID',
        'BukuID',
        'Ulasan',
        'Rating'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function bukus(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'BukuID');
    }
}

