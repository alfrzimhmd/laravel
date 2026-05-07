<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim',
            'nama' => 'required|min:3|max:100',
            'program_studi' => 'required',
        ], [
            'nim.required' => 'NIM wajib diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM ini sudah terdaftar di sistem.',
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nama.min' => 'Nama minimal terdiri dari 3 karakter.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'program_studi.required' => 'Program Studi wajib diisi.',
        ]);

        // Simpan ke database
        Mahasiswa::create($validatedData);

        // Redirect ke halaman daftar mahasiswa dengan pesan sukses
        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa berhasil ditambahkan!');
    }
    public function create()
    {
        return view('tambah_mahasiswa');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('edit_mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        
        $validatedData = $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim,' . $id,
            'nama' => 'required|min:3|max:100',
            'program_studi' => 'required',
        ], [
            'nim.required' => 'NIM wajib diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM ini sudah terdaftar di sistem.',
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nama.min' => 'Nama minimal terdiri dari 3 karakter.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'program_studi.required' => 'Program Studi wajib diisi.',
        ]);
        
        $mahasiswa->update($validatedData);
        
        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        
        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa berhasil dihapus!');
    }
    
    public function index()
    {
        // Mengambil semua data mahasiswa dari database
        $mahasiswa = Mahasiswa::all();
        
        return view('mahasiswa', ['dataMahasiswa' => $mahasiswa]);
    }

    public function detail($nim)
    {
        return "Menampilkan detail data mahasiswa dengan NIM: " . $nim;
    }
}