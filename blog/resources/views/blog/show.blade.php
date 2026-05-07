@extends('layouts.app')

@section('title', $artikel->judul)

@section('content')
<div style="background: linear-gradient(135deg, #0f766e 0%, #0284c7 100%);">
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-white text-decoration-none opacity-75 hover-opacity-100">Home</a></li>
                <li class="breadcrumb-item"><a href="/blog" class="text-white text-decoration-none opacity-75 hover-opacity-100">Blog</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">{{ Str::limit($artikel->judul, 50) }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-5">
                <div class="mb-3">
                    <span class="badge" style="background: #0f766e; color: white; padding: 6px 16px;">{{ $artikel->kategori }}</span>
                    @if($artikel->status == 'draft')
                        <span class="badge bg-warning text-dark px-3 py-2 ms-2">
                            <i class="fas fa-pencil-alt me-1"></i>Draft
                        </span>
                    @else
                        <span class="badge bg-success px-3 py-2 ms-2">
                            <i class="fas fa-check-circle me-1"></i>Published
                        </span>
                    @endif
                </div>
                <h1 class="display-5 fw-bold mb-4" style="color: #0f172a;">{{ $artikel->judul }}</h1>
                <div class="d-flex justify-content-center gap-4 text-muted">
                    <div>
                        <i class="fas fa-calendar-alt me-2 text-teal"></i> {{ $artikel->created_at->format('d M Y, H:i') }}
                    </div>
                    <div>
                        <i class="fas fa-eye me-2 text-teal"></i> {{ $artikel->views }} views
                    </div>
                </div>
            </div>
            
            @if($artikel->gambar)
            <div class="mb-5 text-center">
                <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid rounded-4 shadow-lg" alt="{{ $artikel->judul }}" style="max-height: 450px; object-fit: cover; width: 100%;">
            </div>
            @endif
            
            <div class="card border-0 shadow-sm rounded-4 mb-5">
                <div class="card-body p-5">
                    <div class="article-content" style="font-size: 1.05rem; line-height: 1.85; color: #334155;">
                        {!! nl2br(e($artikel->isi)) !!}
                    </div>
                </div>
            </div>
            
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div>
                    <span class="text-muted me-3">Share:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 36px; height: 36px; line-height: 36px; padding: 0;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($artikel->judul) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 36px; height: 36px; line-height: 36px; padding: 0;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($artikel->judul . ' - ' . url()->current()) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 36px; height: 36px; line-height: 36px; padding: 0;">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                <a href="/blog" class="btn btn-outline-secondary rounded-pill">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Blog
                </a>
            </div>

            <div class="mt-5 pt-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">
                            <i class="fas fa-comments me-2 text-teal"></i> Komentar ({{ $artikel->comments->count() }})
                        </h4>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show py-2 mb-4 rounded-pill">
                                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <div class="bg-light rounded-4 p-4 mb-4">
                            <h5 class="fw-bold mb-3">💬 Tinggalkan Komentar</h5>
                            <form action="{{ route('comment.store', $artikel->id) }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Nama <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan nama Anda">
                                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email@example.com">
                                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold">Komentar <span class="text-danger">*</span></label>
                                        <textarea name="isi" rows="4" class="form-control @error('isi') is-invalid @enderror" placeholder="Tulis komentar Anda di sini...">{{ old('isi') }}</textarea>
                                        @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                                            <i class="fas fa-paper-plane me-2"></i>Kirim Komentar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="comments-list">
                            @forelse($artikel->comments as $comment)
                                <div class="comment-item border-bottom pb-3 mb-3" id="comment-{{ $comment->id }}">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div style="flex: 1;">
                                            <div class="d-flex align-items-center gap-2 mb-2">
                                                <div class="rounded-circle text-white text-center" style="width: 40px; height: 40px; line-height: 40px; background: #0f766e;">
                                                    <i class="fas fa-user fa-sm"></i>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold mb-0">{{ $comment->nama }}</h6>
                                                    <small class="text-muted">
                                                        <i class="far fa-calendar-alt me-1"></i> {{ $comment->created_at->format('d M Y, H:i') }}
                                                    </small>
                                                </div>
                                            </div>
                                            <p class="mb-0 text-secondary" style="margin-left: 52px;">{{ $comment->isi }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <i class="fas fa-comment-slash fa-3x text-muted mb-2"></i>
                                    <p class="text-muted mb-0">Belum ada komentar. Jadilah yang pertama!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-teal { color: #0f766e; }
    .hover-opacity-100:hover { opacity: 1 !important; }
    .article-content p { margin-bottom: 1.2rem; }
    .article-content h2, .article-content h3 { margin-top: 1.5rem; margin-bottom: 0.8rem; color: #0f172a; }
    .comment-item {
        transition: all 0.2s ease;
    }
    .comment-item:hover {
        background-color: #f8fafc;
        padding-left: 8px;
        border-radius: 12px;
    }
</style>
@endsection