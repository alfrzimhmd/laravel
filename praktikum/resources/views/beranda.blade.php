@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <h2>Selamat Datang di Portal Akademik</h2>
    <p>Ini adalah aplikasi sederhana untuk mengelola data Mahasiswa dan Dosen.</p>
    
    <h3>Menu Tersedia:</h3>
    <ul>
        <li><strong>Mahasiswa</strong> - Kelola data mahasiswa (Tambah, Lihat, Edit, Hapus)</li>
        <li><strong>Dosen</strong> - Kelola data dosen (Tambah, Lihat, Edit, Hapus)</li>
    </ul>
@endsection