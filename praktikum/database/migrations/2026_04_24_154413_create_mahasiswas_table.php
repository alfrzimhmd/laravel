<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id(); // Primary Key Auto Increment

            $table->string('nim', 15)->unique(); // NIM unik
            $table->string('nama', 100); // Nama mahasiswa

            $table->string('program_studi', 50)
                ->default('Teknologi Informasi');

            $table->enum('status', [
                'Aktif',
                'Cuti',
                'Lulus'
            ])->default('Aktif');

            $table->text('alamat')->nullable(); // alamat boleh kosong

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
