<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriBuku extends Model
{
    use HasFactory;
    protected $primaryKey = 'KategoriID';
    protected $guarded = ['KategoriID'];
    protected $table = 'kategori_bukus';

    protected $fillable = [
        'NamaKategori',
    ];

    public function kategori_buku_relasis(): HasMany
    {
        return $this->hasMany(KategoriBukuRelasi::class, 'KategoriBukuID');
    }
}
