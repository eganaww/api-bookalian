<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    use HasFactory;
    protected $primaryKey = 'BukuID';
    protected $guarded = ['BukuID'];
    protected $table = 'bukus';

    protected $fillable = [
        "Judul",
        "Penulis",
        "Penerbit",
        "TahunTerbit",
        "Cover"
    ];

    public function koleksi_pribadis(): HasMany
    {
        return $this->hasMany(KoleksiPribadi::class);
    }

    public function peminjamans(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function kategori_bukus(): HasMany
    {
        return $this->hasMany(KategoriBuku::class);
    }

    public function ulasan_bukus(): HasMany
    {
        return $this->hasMany(UlasanBuku::class, 'UlasanID');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'UserID');
    }
}
