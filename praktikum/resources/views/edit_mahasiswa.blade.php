@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
    <h2>Form Edit Data Mahasiswa</h2>
    
    <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>NIM:</label><br>
            <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}">
            @error('nim') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group">
            <label>Nama Lengkap:</label><br>
            <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">
            @error('nama') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group">
            <label>Program Studi:</label><br>
            <input type="text" name="program_studi" value="{{ old('program_studi', $mahasiswa->program_studi) }}">
            @error('program_studi') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <button type="submit">Update Data</button>
    </form>
@endsection