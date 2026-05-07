<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    // Menampilkan daftar artikel
    public function index(Request $request)
    {
        $query = Artikel::where('status', 'publish');
        
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', $request->kategori);
        }
        
        $artikels = $query->orderBy('created_at', 'desc')->paginate(6);
        
        return view('blog.index', compact('artikels'));
    }

    // Menampilkan detail artikel
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        
        // Tambah view count
        $artikel->increment('views');
        
        return view('blog.show', compact('artikel'));
    }

    // Menampilkan daftar artikel untuk admin
    public function adminIndex()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    // Menampilkan form tambah artikel untuk admin
    public function create()
    {
        return view('admin.artikel.create');
    }

    //  Menyimpan artikel baru untuk admin
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5|max:200',
            'isi' => 'required',
            'kategori' => 'required',
            'status' => 'required|in:draft,publish',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        // Upload gambar
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' => $request->isi,
            'gambar' => $gambarPath,
            'kategori' => $request->kategori,
            'status' => $request->status,
            'views' => 0,
        ]);

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil ditambahkan!');
    }

    // Menampilkan form edit artikel untuk admin 
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }


    // Mengupdate artikel untuk admin 
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul' => 'required|min:5|max:200',
            'isi' => 'required',
            'kategori' => 'required',
            'status' => 'required|in:draft,publish',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'status' => $request->status,
        ];

        // Update slug jika judul berubah
        if ($artikel->judul != $request->judul) {
            $data['slug'] = Str::slug($request->judul);
        }

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar && file_exists(storage_path('app/public/' . $artikel->gambar))) {
                unlink(storage_path('app/public/' . $artikel->gambar));
            }
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil diupdate!');
    }

    //  Menghapus artikel 
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        
        // Hapus file gambar jika ada
        if ($artikel->gambar && file_exists(storage_path('app/public/' . $artikel->gambar))) {
            unlink(storage_path('app/public/' . $artikel->gambar));
        }
        
        $artikel->delete();

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil dihapus!');
    }
}