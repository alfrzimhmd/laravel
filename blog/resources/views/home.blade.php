@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- HERO SECTION --}}
<div
    class="position-relative"
    style="
        background: linear-gradient(135deg, #0f766e 0%, #0284c7 100%);
        overflow: hidden;
    "
>
    <div
        class="container py-5 position-relative"
        style="z-index: 2"
    >
        <div class="row align-items-center min-vh-50 py-5">

            {{-- Left Content --}}
            <div class="col-lg-7 text-white">
                <h1 class="display-3 fw-bold mb-4">
                    Ide & Kode
                    <span class="text-warning">.</span>
                </h1>

                <p class="lead mb-4 opacity-95">
                    Jelajahi pemikiran, tutorial, dan cerita dari dunia
                    pengembangan web. Mari membangun sesuatu yang berarti.
                </p>

                <div class="d-flex gap-3 flex-wrap">
                    <a
                        href="/blog"
                        class="btn btn-light btn-lg px-4 fw-semibold rounded-pill"
                    >
                        <i class="fas fa-newspaper me-2"></i>
                        Jelajahi Blog
                    </a>

                    <a
                        href="/about"
                        class="btn btn-outline-light btn-lg px-4 rounded-pill"
                    >
                        Tentang Saya
                    </a>
                </div>
            </div>

            {{-- Right Icon --}}
            <div class="col-lg-5 d-none d-lg-block text-center">
                <i class="fas fa-terminal fa-7x text-white opacity-25"></i>
            </div>

        </div>
    </div>

    {{-- Wave Effect --}}
    <div
        class="position-absolute bottom-0 start-0 w-100"
        style="line-height: 0;"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1440 120"
        >
            <path
                fill="#f8fafc"
                fill-opacity="1"
                d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"
            >
            </path>
        </svg>
    </div>
</div>

{{-- STATS CARD --}}
<div
    class="container position-relative"
    style="margin-top: -50px; z-index: 10"
>
    <div class="row g-4">

        <div class="col-md-3 col-6">
            <div class="card p-3 text-center shadow border-0">
                <i class="fas fa-newspaper fa-2x text-primary mb-2"></i>
                <h3 class="fw-bold mb-0">12+</h3>
                <p class="text-muted small">Artikel</p>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card p-3 text-center shadow border-0">
                <i class="fas fa-tags fa-2x text-success mb-2"></i>
                <h3 class="fw-bold mb-0">5+</h3>
                <p class="text-muted small">Kategori</p>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card p-3 text-center shadow border-0">
                <i class="fas fa-users fa-2x text-info mb-2"></i>
                <h3 class="fw-bold mb-0">1.2k</h3>
                <p class="text-muted small">Pembaca</p>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card p-3 text-center shadow border-0">
                <i class="fas fa-comment fa-2x text-warning mb-2"></i>
                <h3 class="fw-bold mb-0">48</h3>
                <p class="text-muted small">Komentar</p>
            </div>
        </div>

    </div>
</div>

{{-- FEATURE SECTION --}}
<div class="container py-5 mt-3">

    <div class="text-center mb-5">
        <h2 class="fw-bold">
            Nikmati
            <span class="text-teal">Pengalaman</span>
            Membaca
        </h2>

        <div
            class="mx-auto mt-2"
            style="
                width: 70px;
                height: 4px;
                background: linear-gradient(
                    90deg,
                    #0f766e,
                    #14b8a6
                );
                border-radius: 4px;
            "
        >
        </div>
    </div>

    <div class="row g-5">

        {{-- Card 1 --}}
        <div class="col-md-4">
            <div class="card h-100 p-4 text-center border-0 shadow-sm">
                <div
                    class="bg-light rounded-circle d-inline-flex mx-auto mb-3"
                    style="padding: 16px;"
                >
                    <i class="fas fa-book-open fa-2x text-teal"></i>
                </div>

                <h5 class="fw-bold">Baca Artikel</h5>

                <p class="text-muted">
                    Akses berbagai tulisan inspiratif seputar
                    teknologi & karir.
                </p>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="col-md-4">
            <div class="card h-100 p-4 text-center border-0 shadow-sm">
                <div
                    class="bg-light rounded-circle d-inline-flex mx-auto mb-3"
                    style="padding: 16px;"
                >
                    <i class="fas fa-search fa-2x text-teal"></i>
                </div>

                <h5 class="fw-bold">Cari Topik</h5>

                <p class="text-muted">
                    Temukan artikel favoritmu berdasarkan
                    kata kunci atau kategori.
                </p>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="col-md-4">
            <div class="card h-100 p-4 text-center border-0 shadow-sm">
                <div
                    class="bg-light rounded-circle d-inline-flex mx-auto mb-3"
                    style="padding: 16px;"
                >
                    <i class="fas fa-comments fa-2x text-teal"></i>
                </div>

                <h5 class="fw-bold">Berkomentar</h5>

                <p class="text-muted">
                    Ikut diskusi dan bagikan pendapatmu
                    di kolom komentar.
                </p>
            </div>
        </div>

    </div>
</div>

{{-- ARTIKEL TERBARU --}}
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h3 class="fw-bold">✨ Terbaru</h3>

        <a
            href="/blog"
            class="text-teal text-decoration-none"
        >
            Lihat semua →
        </a>
    </div>

    <div class="row g-4">

        @php
            $latestArticles = \App\Models\Artikel::where('status', 'publish')
                ->latest()
                ->take(3)
                ->get();
        @endphp

        @forelse($latestArticles as $artikel)

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">

                    {{-- Gambar --}}
                    @if($artikel->gambar)
                        <img
                            src="{{ asset('storage/' . $artikel->gambar) }}"
                            class="card-img-top"
                            style="
                                height: 180px;
                                object-fit: cover;
                            "
                            alt="Gambar Artikel"
                        >
                    @else
                        <div class="bg-light text-center py-4">
                            <i class="fas fa-image fa-2x text-muted"></i>
                        </div>
                    @endif

                    {{-- Card Body --}}
                    <div class="card-body">
                        <span class="badge bg-teal mb-2">
                            {{ $artikel->kategori }}
                        </span>

                        <h5 class="card-title">
                            {{ Str::limit($artikel->judul, 55) }}
                        </h5>

                        <p class="card-text text-muted small">
                            {{ Str::limit(strip_tags($artikel->isi), 90) }}
                        </p>
                    </div>

                    {{-- Footer --}}
                    <div class="card-footer bg-white border-0 pb-3">
                        <a
                            href="{{ route('blog.show', $artikel->slug) }}"
                            class="btn btn-outline-primary btn-sm rounded-pill w-100"
                        >
                            Baca artikel →
                        </a>
                    </div>

                </div>
            </div>

        @empty

            <div class="col-12 text-center py-5">
                <p>
                    Belum ada artikel.
                    Yuk tambah konten!
                </p>
            </div>

        @endforelse

    </div>
</div>

<style>
    .text-teal {
        color: #0f766e;
    }

    .bg-teal {
        background-color: #0f766e;
        color: white;
    }

    .rounded-circle {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

@endsection