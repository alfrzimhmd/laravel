@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div style="background: linear-gradient(135deg, #0f766e 0%, #0284c7 100%);">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="text-white fw-bold mb-1">Semua Artikel</h2>
                <p class="text-white-50 mb-0">Temukan insight dan wawasan baru dari blog ini</p>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <form method="GET" action="/blog" class="d-inline-block w-100 w-md-auto">
                    <div class="input-group" style="max-width: 280px; margin-left: auto;">
                        <span class="input-group-text bg-white border-0 rounded-start-pill">
                            <i class="fas fa-filter text-teal"></i>
                        </span>
                        <select name="kategori" class="form-select form-select-sm rounded-end-pill" onchange="this.form.submit()" style="cursor: pointer;">
                            <option value="">Semua Kategori</option>
                            @php
                                $kategoris = \App\Models\Artikel::select('kategori')
                                    ->where('status', 'publish')
                                    ->distinct()
                                    ->get();
                            @endphp
                            @foreach($kategoris as $kat)
                                <option value="{{ $kat->kategori }}" {{ request('kategori') == $kat->kategori ? 'selected' : '' }}>
                                    {{ $kat->kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    @if(request('kategori'))
        <div class="alert alert-info py-2 mb-4 rounded-pill d-flex justify-content-between align-items-center">
            <span><i class="fas fa-filter me-2"></i> Menampilkan artikel dengan kategori: <strong>{{ request('kategori') }}</strong></span>
            <a href="/blog" class="text-decoration-none fw-bold">× Reset Filter</a>
        </div>
    @endif
    
    <div class="row g-4">
        @forelse($artikels as $artikel)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    @if($artikel->gambar)
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->judul }}" style="height: 190px; object-fit: cover; transition: transform 0.3s ease;">
                    @else
                        <div class="bg-light text-center py-5" style="height: 190px;">
                            <i class="fas fa-image fa-2x text-muted"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge" style="background: #0f766e; color: white;">{{ $artikel->kategori }}</span>
                            <small class="text-muted">
                                <i class="far fa-eye me-1"></i> {{ $artikel->views }}
                            </small>
                        </div>
                        <h5 class="fw-bold mb-2">{{ Str::limit($artikel->judul, 55) }}</h5>
                        <p class="text-muted small">{{ Str::limit(strip_tags($artikel->isi), 90) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-3 pt-0">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">
                                <i class="far fa-calendar-alt me-1"></i> {{ $artikel->created_at->format('d M Y') }}
                            </small>
                        </div>
                        <a href="{{ route('blog.show', $artikel->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill w-100">
                            Baca selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">Tidak ada artikel</h4>
                @if(request('kategori'))
                    <p class="text-muted">Belum ada artikel dengan kategori <strong>"{{ request('kategori') }}"</strong>.</p>
                    <a href="/blog" class="btn btn-primary rounded-pill mt-2">Lihat semua artikel</a>
                @else
                    <p class="text-muted">Silakan tambahkan artikel melalui halaman admin.</p>
                    <a href="/admin/artikel/create" class="btn btn-primary rounded-pill mt-2">Tambah Artikel</a>
                @endif
            </div>
        @endforelse
    </div>
    
    <div class="mt-5 d-flex justify-content-center">
        @if($artikels->hasPages())
            <nav aria-label="Page navigation">
                <ul class="pagination custom-pagination">
                    {{-- Previous Page Link --}}
                    @if($artikels->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link rounded-pill me-2"><i class="fas fa-chevron-left"></i> Sebelumnya</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link rounded-pill me-2" href="{{ $artikels->previousPageUrl() . (request('kategori') ? '?kategori=' . request('kategori') : '') }}" rel="prev">
                                <i class="fas fa-chevron-left"></i> Sebelumnya
                            </a>
                        </li>
                    @endif
                    
                    {{-- Pagination Elements --}}
                    @foreach($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                        @if($page == $artikels->currentPage())
                            <li class="page-item active">
                                <span class="page-link rounded-pill mx-1">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link rounded-pill mx-1" href="{{ $url . (request('kategori') ? '?kategori=' . request('kategori') : '') }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                    
                    {{-- Next Page Link --}}
                    @if($artikels->hasMorePages())
                        <li class="page-item">
                            <a class="page-link rounded-pill ms-2" href="{{ $artikels->nextPageUrl() . (request('kategori') ? '?kategori=' . request('kategori') : '') }}" rel="next">
                                Selanjutnya <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link rounded-pill ms-2">Selanjutnya <i class="fas fa-chevron-right"></i></span>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
    </div>
    
    <div class="text-center mt-3">
        <small class="text-muted">
            Menampilkan {{ $artikels->firstItem() ?? 0 }} - {{ $artikels->lastItem() ?? 0 }} 
            dari {{ $artikels->total() }} artikel
        </small>
    </div>
</div>

<style>
    .text-teal { color: #0f766e; }
    .rounded-start-pill { border-radius: 50px 0 0 50px !important; }
    .rounded-end-pill { border-radius: 0 50px 50px 0 !important; }
    .card-img-top:hover {
        transform: scale(1.02);
    }
    
    .custom-pagination {
        margin-bottom: 0;
        gap: 5px;
        flex-wrap: wrap;
        justify-content: center;
    }
    .custom-pagination .page-link {
        border-radius: 50px !important;
        color: #0f766e;
        border: 1px solid #e2e8f0;
        padding: 8px 18px;
        font-weight: 500;
        transition: all 0.3s ease;
        background-color: white;
    }
    .custom-pagination .page-link:hover {
        background: linear-gradient(135deg, #0f766e, #14b8a6);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
    }
    .custom-pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #0f766e, #0284c7);
        color: white;
        border-color: transparent;
        box-shadow: 0 4px 12px rgba(15,118,110,0.3);
    }
    .custom-pagination .page-item.disabled .page-link {
        color: #94a3b8;
        background-color: #f1f5f9;
        border-color: #e2e8f0;
        cursor: not-allowed;
    }
</style>
@endsection