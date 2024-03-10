<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\KategoriBukuRelasi;
use App\Models\KoleksiPribadi;
use App\Models\Peminjaman;
use App\Models\Riwayat;
use App\Models\UlasanBuku;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Buku::factory(10)->create();
        KategoriBuku::factory(10)->create();
        KategoriBukuRelasi::factory(10)->create();
        KoleksiPribadi::factory(10)->create();
        Peminjaman::factory(10)->create();
        Riwayat::factory(10)->create();
        UlasanBuku::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
