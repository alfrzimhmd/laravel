<?php

namespace App\Http\Controllers;

use App\Models\SiswaEkskul;
use Illuminate\Http\Request;

class SiswaEkskulController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $siswa = SiswaEkskul::all();
        return view('siswa_ekskul.index', compact('siswa'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('siswa_ekskul.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'kelas' => 'required|string|max:5',
            'pilihan_ekskul' => 'required|in:Pramuka,Kesenian,Olahraga',
            'hari_latihan' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'status_keaktifan' => 'required|boolean'
        ]);

        SiswaEkskul::create($request->all());

        return redirect()->route('siswa_ekskul.index')
            ->with('success', 'Data siswa berhasil ditambahkan!');
    }

    // Menampilkan form edit dengan data lama
    public function edit($id)
    {
        $siswa = SiswaEkskul::findOrFail($id);
        return view('siswa_ekskul.edit', compact('siswa'));
    }

    // Mengupdate data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'kelas' => 'required|string|max:5',
            'pilihan_ekskul' => 'required|in:Pramuka,Kesenian,Olahraga',
            'hari_latihan' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'status_keaktifan' => 'required|boolean'
        ]);

        $siswa = SiswaEkskul::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa_ekskul.index')
            ->with('success', 'Data siswa berhasil diupdate!');
    }

    // Menghapus data
    public function destroy($id)
    {
        $siswa = SiswaEkskul::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa_ekskul.index')
            ->with('success', 'Data siswa berhasil dihapus!');
    }
}