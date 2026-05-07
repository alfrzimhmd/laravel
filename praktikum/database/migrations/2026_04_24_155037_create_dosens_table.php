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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id(); // Primary Key Auto Increment

            $table->string('nidn', 20)->unique(); // NIDN unik
            $table->string('nama_lengkap', 100); // Nama dosen
            $table->string('keahlian', 50); // Bidang keahlian

            $table->string('no_telepon', 15)
                ->nullable(); // boleh kosong

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
