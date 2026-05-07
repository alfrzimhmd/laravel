<?php

namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // NIDN angka acak unik 10 digit
            'nidn' => fake()->unique()->numerify('##########'),

            // Nama lengkap acak
            'nama_lengkap' => fake()->name(),

            // Keahlian dipilih secara acak
            'keahlian' => fake()->randomElement([
                'Pemrograman Web',
                'Jaringan Komputer',
                'Kecerdasan Buatan',
                'Basis Data'
            ]),

            // Nomor telepon lokal
            'no_telepon' => fake()->numerify('08##########'),
        ];
    }
}
