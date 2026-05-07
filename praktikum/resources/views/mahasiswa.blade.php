@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="container" style="max-width: 1200px; margin: 0 auto;">
    <h2>Daftar Mahasiswa</h2>
    
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="/mahasiswa/create" style="display: inline-block; background-color: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">
        + Tambah Mahasiswa
    </a>
    
    <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">ID</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">NIM</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Nama</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Program Studi</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataMahasiswa as $mhs)
            <tr>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $mhs->id }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $mhs->nim }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $mhs->nama }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $mhs->program_studi }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">
                    <a href="/mahasiswa/{{ $mhs->id }}/edit" style="background-color: #007bff; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-right: 5px;">Edit</a>
                    
                    <form action="/mahasiswa/{{ $mhs->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="border: 1px solid #ddd; padding: 20px; text-align: center;">Belum ada data mahasiswa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection