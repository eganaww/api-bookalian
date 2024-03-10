<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peminjaman extends Model
{
    use HasFactory;
    protected $primaryKey = 'PeminjamanID';
    protected $guarded = ['PeminjamanID'];
    protected $table = 'peminjamans';

    protected $fillable = [
        'BukuID',
        'UserID',
        'TanggalPeminjaman',
        'TanggalPengembalian',
        'StatusPeminjaman'
    ];

    public function bukus(): BelongsTo
    {
        return $this->belongsTo(Buku::class,'bukuid');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'userid');
    }

    public function riwayats(): HasMany
    {
        return $this->hasMany(Riwayat::class, 'riwayatid');
    }
}
