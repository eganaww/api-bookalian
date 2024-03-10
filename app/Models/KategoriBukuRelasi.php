<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KategoriBukuRelasi extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'KategoriBukuID';
    protected $guarded = ['KategoriBukuID'];
    protected $table = 'kategori_buku_relasis';

    protected $fillable = [
        'BukuID',
        'KategoriID',
    ];

    public function bukus(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'BukuID');
    }
    public function kategori_bukus(): BelongsTo
    {
        return $this->belongsTo(KategoriBuku::class, 'KategoriID');
    }
}
