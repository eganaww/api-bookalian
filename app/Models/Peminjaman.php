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
        return $this->belongsTo(Buku::class,'BukuID');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'UserID');
    }

    public function riwayats(): HasMany
    {
        return $this->hasMany(Riwayat::class, 'RiwayatID');
    }
}
