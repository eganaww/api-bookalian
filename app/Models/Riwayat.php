<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Riwayat extends Model
{
    use HasFactory;
    protected $primaryKey = 'RiwayatID';
    protected $guarded = ['RiwayatID'];
    protected $table = 'riwayats';

    protected $fillable = [
        'PeminjamanID',
    ];

    public function peminjamans(): BelongsTo
    {
        return $this->belongsTo(Peminjaman::class, 'PeminjamanID');
    }
}
