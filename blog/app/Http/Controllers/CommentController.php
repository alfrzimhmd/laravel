<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Artikel;

class CommentController extends Controller
{
    public function store(Request $request, $artikelId)
    {
        $request->validate([
            'nama' => 'required|min:3|max:100',
            'email' => 'required|email|max:100',
            'isi' => 'required|min:5',
        ]);

        Comment::create([
            'artikel_id' => $artikelId,
            'nama' => $request->nama,
            'email' => $request->email,
            'isi' => $request->isi,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    // Hapus Komentar hanya untuk admin 
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
}