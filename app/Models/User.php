<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'UserID';
    protected $guarded = ['UserID'];
    protected $table = 'users';

    protected $fillable = [
        'Username',
        'Email',
        'Password',
        'NamaLengkap',
        'Alamat',
        'Role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    public function koleksi_pribadis(): BelongsTo
    {
        return $this->belongsTo(KoleksiPribadi::class);
    }

    public function peminjamans(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'peminjamanid');
    }

    public function ulasan_bukus(): HasMany
    {
        return $this->hasMany(UlasanBuku::class, 'ulasanid');
    }

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'BukuID');
    }

    
}
