<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bukuid' => mt_rand(1,10),
            'userid' => mt_rand(1,10),
            'tanggal_peminjaman' => $this->faker->date(),
            'tanggal_pengembalian' => $this->faker->date()
        ];
    }
}
