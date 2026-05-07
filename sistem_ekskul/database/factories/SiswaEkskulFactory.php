<?php

namespace Database\Factories;

use App\Models\SiswaEkskul;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaEkskulFactory extends Factory
{
    protected $model = SiswaEkskul::class;

    public function definition(): array
    {
        $ekskul = ['Pramuka', 'Kesenian', 'Olahraga'];
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $kelas = ['1A', '1B', '2A', '2B', '3A', '3B', '4A', '4B', '5A', '5B', '6A', '6B'];

        return [
            'nama_siswa' => $this->faker->name(),
            'kelas' => $this->faker->randomElement($kelas),
            'pilihan_ekskul' => $this->faker->randomElement($ekskul),
            'hari_latihan' => $this->faker->randomElement($hari),
            'status_keaktifan' => $this->faker->boolean(80) // 80% aktif
        ];
    }
}