@extends('layouts.app')

@section('content')
<div class="modern-card" data-aos="fade-up">
    <div class="card-header-modern d-flex justify-content-between align-items-center">
        <h3>
            <i class="fas fa-users"></i> 
            Daftar Siswa Ekstrakurikuler
        </h3>
        <a href="{{ route('siswa_ekskul.create') }}" class="btn btn-gradient-primary">
            <i class="fas fa-plus-circle"></i> Tambah Siswa
        </a>
    </div>
    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th style="width: 5%"> No</th>
                        <th style="width: 20%"><i class="fas fa-user-graduate"></i> Nama Siswa</th>
                        <th style="width: 10%"><i class="fas fa-school"></i> Kelas</th>
                        <th style="width: 20%"><i class="fas fa-futbol"></i> Ekstrakurikuler</th>
                        <th style="width: 15%"><i class="fas fa-calendar-alt"></i> Hari Latihan</th>
                        <th style="width: 12%"><i class="fas fa-toggle-on"></i> Status</th>
                        <th style="width: 18%"><i class="fas fa-cogs"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswa as $key => $s)
                    <tr data-aos="fade-up" data-aos-delay="{{ $key * 50 }}">
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <i class="fas fa-user-graduate me-2" style="color: #0f9b8e"></i>
                            <strong>{{ $s->nama_siswa }}</strong>
                        </td>
                        <td>
                            <span class="kelas-badge">
                                <i class="fas fa-school"></i> {{ $s->kelas }}
                            </span>
                        </td>
                        <td>
                            @php
                                $ekskulIcon = [
                                    'Pramuka' => 'fa-campground',
                                    'Kesenian' => 'fa-palette',
                                    'Olahraga' => 'fa-futbol'
                                ];
                                $icon = $ekskulIcon[$s->pilihan_ekskul] ?? 'fa-star';
                            @endphp
                            <i class="fas {{ $icon }} me-2" style="color: #0ba360"></i>
                            {{ $s->pilihan_ekskul }}
                        </td>
                        <td>
                            <i class="fas fa-calendar-alt me-2" style="color: #0f9b8e"></i>
                            {{ $s->hari_latihan }}
                        </td>
                        <td>
                            @if($s->status_keaktifan)
                                <span class="badge-active">
                                    <i class="fas fa-check-circle"></i> Aktif
                                </span>
                            @else
                                <span class="badge-inactive">
                                    <i class="fas fa-times-circle"></i> Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('siswa_ekskul.edit', $s->id) }}" class="btn btn-warning btn-action">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('siswa_ekskul.destroy', $s->id) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa {{ $s->nama_siswa }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="fas fa-folder-open fa-3x mb-3" style="color: #cbd5e1"></i>
                            <p class="text-muted">Belum ada data siswa. Silakan tambah data baru.</p>
                            <a href="{{ route('siswa_ekskul.create') }}" class="btn btn-gradient-primary mt-2">
                                <i class="fas fa-plus-circle"></i> Tambah Siswa Pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="text-center mt-4" style="color: #004d40; opacity: 0.8;">
    <small>
        <i class="fas fa-database"></i> Total Siswa: {{ $siswa->count() }} | 
        <i class="fas fa-calendar-alt"></i> Sistem Pendataan Ekstrakurikuler SD
    </small>
</div>
@endsection