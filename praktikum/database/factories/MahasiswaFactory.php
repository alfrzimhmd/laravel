<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // NIM angka acak unik 8 digit
            'nim' => fake()->unique()->numerify('########'),

            // Nama lengkap acak
            'nama' => fake()->name(),

            // Default program studi
            'program_studi' => 'Teknologi Informasi',

            // Status acak
            'status' => fake()->randomElement([
                'Aktif',
                'Cuti',
                'Lulus'
            ]),

            // Alamat acak
            'alamat' => fake()->address(),
        ];
    }
}
