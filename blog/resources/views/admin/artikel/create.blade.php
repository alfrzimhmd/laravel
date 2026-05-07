@extends('layouts.app')

@section('title', 'Admin - Tambah Artikel')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h4 class="fw-bold mb-0">
                        <i class="fas fa-plus-circle text-primary me-2"></i>Tambah Artikel Baru
                    </h4>
                    <p class="text-muted mb-0">Buat artikel baru untuk dibagikan kepada pembaca</p>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="judul" class="form-label fw-bold">Judul Artikel <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                           id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul artikel" required>
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
                                        <option value="Teknologi" {{ old('kategori') == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                                        <option value="Laravel" {{ old('kategori') == 'Laravel' ? 'selected' : '' }}>Laravel</option>
                                        <option value="Pemrograman" {{ old('kategori') == 'Pemrograman' ? 'selected' : '' }}>Pemrograman</option>
                                        <option value="Tips" {{ old('kategori') == 'Tips' ? 'selected' : '' }}>Tips & Trik</option>
                                        <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum</option>
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
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>📝 Draft (belum publish)</option>
                                        <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>🚀 Publish (langsung tayang)</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gambar" class="form-label fw-bold">Gambar Thumbnail</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                                           id="gambar" name="gambar" accept="image/*">
                                    <small class="text-muted">Format: JPG, PNG, JPEG. Maks 2MB</small>
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="isi" class="form-label fw-bold">Isi Artikel <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('isi') is-invalid @enderror" 
                                      id="isi" name="isi" rows="15" placeholder="Tulis isi artikel di sini..." required>{{ old('isi') }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between pt-3">
                            <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Simpan Artikel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection