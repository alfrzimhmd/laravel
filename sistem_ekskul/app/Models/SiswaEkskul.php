<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaEkskul extends Model
{
    use HasFactory;

    protected $table = 'siswa_ekskul';

    protected $fillable = [
        'nama_siswa',
        'kelas',
        'pilihan_ekskul',
        'hari_latihan',
        'status_keaktifan'
    ];
}