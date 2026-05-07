<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        // Mengambil semua data dosen dari database
        $dosen = Dosen::all();
        
        return view('dosen', ['dataDosen' => $dosen]);
    }

    public function create()
    {
        return view('tambah_dosen');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nidn' => 'required|numeric|digits:10|unique:dosens,nidn',
            'nama_lengkap' => 'required|string|max:100',
            'keahlian' => 'required|in:Pemrograman Web,Jaringan Komputer,Kecerdasan Buatan,Basis Data',
        ], [
            'nidn.required' => 'NIDN wajib diisi.',
            'nidn.numeric' => 'NIDN harus berupa angka.',
            'nidn.digits' => 'NIDN harus tepat 10 digit.',
            'nidn.unique' => 'NIDN ini sudah terdaftar.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'keahlian.required' => 'Keahlian wajib dipilih.',
        ]);

        // Simpan ke database
        Dosen::create($validatedData);

        // Redirect ke halaman daftar dosen dengan pesan sukses
        return redirect('/dosen')->with('success', 'Data Dosen berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('edit_dosen', ['dosen' => $dosen]);
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        
        $validatedData = $request->validate([
            'nidn' => 'required|numeric|digits:10|unique:dosens,nidn,' . $id,
            'nama_lengkap' => 'required|string|max:100',
            'keahlian' => 'required|in:Pemrograman Web,Jaringan Komputer,Kecerdasan Buatan,Basis Data',
        ], [
            'nidn.required' => 'NIDN wajib diisi.',
            'nidn.numeric' => 'NIDN harus berupa angka.',
            'nidn.digits' => 'NIDN harus tepat 10 digit.',
            'nidn.unique' => 'NIDN ini sudah terdaftar.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'keahlian.required' => 'Keahlian wajib dipilih.',
        ]);
        
        $dosen->update($validatedData);
        
        return redirect('/dosen')->with('success', 'Data Dosen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        
        return redirect('/dosen')->with('success', 'Data Dosen berhasil dihapus!');
    }
}