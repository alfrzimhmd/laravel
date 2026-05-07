@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <h2>Form Tambah Data Mahasiswa</h2>
    
    <form action="/mahasiswa" method="POST">
        @csrf
        
        <div class="form-group">
            <label>NIM:</label><br>
            <input type="text" name="nim" value="{{ old('nim') }}">
            @error('nim') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group">
            <label>Nama Lengkap:</label><br>
            <input type="text" name="nama" value="{{ old('nama') }}">
            @error('nama') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group">
            <label>Program Studi:</label><br>
            <input type="text" name="program_studi" value="{{ old('program_studi', 'Teknologi Informasi') }}" readonly>
            @error('program_studi') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <button type="submit">Simpan Data</button>
    </form>
@endsection