{{-- resources/views/admin/artikel/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Admin - Edit Artikel')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h4 class="fw-bold mb-0">
                        <i class="fas fa-edit text-warning me-2"></i>Edit Artikel
                    </h4>
                    <p class="text-muted mb-0">Perbarui konten artikel yang sudah ada</p>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="judul" class="form-label fw-bold">Judul Artikel <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                           id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="kategori" class="form-label fw-bold">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select @error('kategori') is-invalid @enderror" 
                                            id="kategori" name="kategori" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Teknologi" {{ old('kategori', $artikel->kategori) == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                                        <option value="Laravel" {{ old('kategori', $artikel->kategori) == 'Laravel' ? 'selected' : '' }}>Laravel</option>
                                        <option value="Pemrograman" {{ old('kategori', $artikel->kategori) == 'Pemrograman' ? 'selected' : '' }}>Pemrograman</option>
                                        <option value="Tips" {{ old('kategori', $artikel->kategori) == 'Tips' ? 'selected' : '' }}>Tips & Trik</option>
                                        <option value="Umum" {{ old('kategori', $artikel->kategori) == 'Umum' ? 'selected' : '' }}>Umum</option>
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="draft" {{ old('status', $artikel->status) == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                                        <option value="publish" {{ old('status', $artikel->status) == 'publish' ? 'selected' : '' }}>🚀 Publish</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gambar" class="form-label fw-bold">Ganti Gambar</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                                           id="gambar" name="gambar" accept="image/*">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        @if($artikel->gambar)
                        <div class="mb-3">
                            <label class="form-label fw-bold">Gambar Saat Ini</label>
                            <div>
                                <img src="{{ asset('storage/' . $artikel->gambar) }}" width="150" class="img-thumbnail">
                            </div>
                        </div>
                        @endif
                        
                        <div class="mb-3">
                            <label for="isi" class="form-label fw-bold">Isi Artikel <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('isi') is-invalid @enderror" 
                                      id="isi" name="isi" rows="15" required>{{ old('isi', $artikel->isi) }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between pt-3">
                            <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Update Artikel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection