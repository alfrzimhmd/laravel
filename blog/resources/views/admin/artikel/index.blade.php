@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">
                <i class="fas fa-chart-line text-teal me-2"></i>
                Dashboard Artikel
            </h3>
            <p class="text-muted small mb-0">
                Kelola semua konten blogmu di sini
            </p>
        </div>

        <a
            href="{{ route('admin.artikel.create') }}"
            class="btn btn-primary btn-sm rounded-pill"
        >
            <i class="fas fa-plus me-1"></i>
            Tambah Baru
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success py-2">
            {{ session('success') }}
        </div>
    @endif

    {{-- Card Table --}}
    <div class="card border-0 shadow-sm overflow-hidden">

        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    {{-- Table Header --}}
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Gbr</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody>
                        @forelse($artikels as $artikel)
                            <tr>

                                {{-- ID --}}
                                <td>
                                    {{ $artikel->id }}
                                </td>

                                {{-- Gambar --}}
                                <td>
                                    @if($artikel->gambar)
                                        <img
                                            src="{{ asset('storage/' . $artikel->gambar) }}"
                                            width="38"
                                            class="rounded shadow-sm"
                                            alt="Gambar Artikel"
                                        >
                                    @else
                                        <i class="fas fa-image text-muted"></i>
                                    @endif
                                </td>

                                {{-- Judul --}}
                                <td>
                                    <strong>
                                        {{ Str::limit($artikel->judul, 48) }}
                                    </strong>
                                    <br>
                                    <small class="text-muted">
                                        {{ Str::limit(strip_tags($artikel->isi), 45) }}
                                    </small>
                                </td>

                                {{-- Kategori --}}
                                <td>
                                    <span class="badge bg-teal">
                                        {{ $artikel->kategori }}
                                    </span>
                                </td>

                                {{-- Status --}}
                                <td>
                                    @if($artikel->status == 'publish')
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle"></i>
                                            Publish
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="fas fa-pen-fancy"></i>
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                {{-- Views --}}
                                <td>
                                    {{ $artikel->views }}
                                </td>

                                {{-- Tanggal --}}
                                <td>
                                    {{ $artikel->created_at->format('d/m/Y') }}
                                </td>

                                {{-- Aksi --}}
                                <td>
                                    <div class="btn-group gap-2">

                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.artikel.edit', $artikel->id) }}"
                                            class="btn btn-sm btn-warning rounded-pill px-3"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form
                                            action="{{ route('admin.artikel.destroy', $artikel->id) }}"
                                            method="POST"
                                            class="d-inline"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger rounded-pill px-3"
                                                onclick="return confirm('Hapus?')"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    Belum ada artikel, yuk buat artikel pertama
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>

        {{-- Pagination --}}
        <div class="card-footer bg-white">
            {{ $artikels->links() }}
        </div>

    </div>
</div>

<style>
    .bg-teal {
        background: #0f766e;
    }
</style>
@endsection