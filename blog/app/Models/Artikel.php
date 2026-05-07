<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;

    // Nama tabel 
    protected $table = 'artikels';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'kategori',
        'status',
        'views',
    ];

    // Event: otomatis membuat slug dari judul saat membuat data baru
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            $artikel->slug = Str::slug($artikel->judul);
        });
    }

    // Accessor: mengambil URL gambar
    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        return asset('images/default.jpg'); // gambar default jika tidak ada
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}