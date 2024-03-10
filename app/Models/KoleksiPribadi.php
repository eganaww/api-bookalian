<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KoleksiPribadi extends Model
{
    use HasFactory;

    protected $primaryKey = 'KoleksiID';
    protected $guarded = ['KoleksiID'];
    protected $table = 'koleksi_pribadis';

    protected $fillable = [
        'UserID',
        'BukuID',
    ];

    public function bukus(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'BukuID');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(KoleksiPribadi::class, 'UserID');
    }
}
