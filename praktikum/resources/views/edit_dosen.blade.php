@extends('layouts.app')

@section('title', 'Edit Dosen')

@section('content')
    <h2>Form Edit Data Dosen</h2>
    
    <form action="/dosen/{{ $dosen->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>NIDN (10 digit angka):</label><br>
            <input type="text" name="nidn" value="{{ old('nidn', $dosen->nidn) }}">
            @error('nidn') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group">
            <label>Nama Lengkap:</label><br>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $dosen->nama_lengkap) }}">
            @error('nama_lengkap') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group">
            <label>Keahlian:</label><br>
            <select name="keahlian">
                <option value="">-- Pilih Keahlian --</option>
                <option value="Pemrograman Web" {{ old('keahlian', $dosen->keahlian) == 'Pemrograman Web' ? 'selected' : '' }}>Pemrograman Web</option>
                <option value="Jaringan Komputer" {{ old('keahlian', $dosen->keahlian) == 'Jaringan Komputer' ? 'selected' : '' }}>Jaringan Komputer</option>
                <option value="Kecerdasan Buatan" {{ old('keahlian', $dosen->keahlian) == 'Kecerdasan Buatan' ? 'selected' : '' }}>Kecerdasan Buatan</option>
                <option value="Basis Data" {{ old('keahlian', $dosen->keahlian) == 'Basis Data' ? 'selected' : '' }}>Basis Data</option>
            </select>
            @error('keahlian') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <button type="submit">Update Data</button>
    </form>
@endsection