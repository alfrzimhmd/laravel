<?php

namespace Database\Seeders;

use App\Models\SiswaEkskul;
use Illuminate\Database\Seeder;

class SiswaEkskulSeeder extends Seeder
{
    public function run(): void
    {
        SiswaEkskul::factory()->count(10)->create();
    }
}