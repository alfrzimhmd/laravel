@extends('layouts.app')

@section('title', 'Daftar Dosen')

@section('content')
<div style="max-width: 1200px; margin: 0 auto;">
    <h2>Daftar Dosen</h2>
    
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="/dosen/create" style="display: inline-block; background-color: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">
        + Tambah Dosen
    </a>
    
    <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">ID</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">NIDN</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Nama Lengkap</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Keahlian</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">No Telepon</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataDosen as $dsn)
            <tr>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $dsn->id }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $dsn->nidn }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $dsn->nama_lengkap }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $dsn->keahlian }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $dsn->no_telepon ?? '-' }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">
                    <a href="/dosen/{{ $dsn->id }}/edit" style="background-color: #007bff; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-right: 5px;">Edit</a>
                    
                    <form action="/dosen/{{ $dsn->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data dosen ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="border: 1px solid #ddd; padding: 20px; text-align: center;">Belum ada data dosen.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection