<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa_ekskul', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('kelas'); // Contoh: 1A, 2B, 3C
            $table->enum('pilihan_ekskul', ['Pramuka', 'Kesenian', 'Olahraga']);
            $table->enum('hari_latihan', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->boolean('status_keaktifan')->default(true); // true = aktif, false = tidak aktif
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa_ekskul');
    }
};