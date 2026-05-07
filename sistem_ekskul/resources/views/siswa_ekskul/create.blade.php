@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="modern-card" data-aos="fade-up">
            <div class="card-header-modern">
                <h3>
                    <i class="fas fa-user-plus"></i> 
                    Form Tambah Siswa
                </h3>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('siswa_ekskul.store') }}" method="POST">
                    @csrf

                    <div class="form-group-modern">
                        <label>
                            <i class="fas fa-user"></i> Nama Lengkap Siswa <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               name="nama_siswa" 
                               class="form-control-modern @error('nama_siswa') is-invalid @enderror" 
                               value="{{ old('nama_siswa') }}"
                               placeholder="Masukkan nama lengkap siswa">
                        @error('nama_siswa')
                            <div class="invalid-feedback-custom">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group-modern">
                        <label>
                            <i class="fas fa-school"></i> Kelas <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               name="kelas" 
                               class="form-control-modern @error('kelas') is-invalid @enderror" 
                               value="{{ old('kelas') }}"
                               placeholder="Contoh: 1A, 2B, 3C, 4A, 5B, 6C">
                        @error('kelas')
                            <div class="invalid-feedback-custom">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group-modern">
                        <label>
                            <i class="fas fa-futbol"></i> Pilihan Ekstrakurikuler <span class="text-danger">*</span>
                        </label>
                        <select name="pilihan_ekskul" class="form-control-modern @error('pilihan_ekskul') is-invalid @enderror">
                            <option value="">-- Pilih Ekstrakurikuler --</option>
                            <option value="Pramuka" {{ old('pilihan_ekskul') == 'Pramuka' ? 'selected' : '' }}>
                                Pramuka
                            </option>
                            <option value="Kesenian" {{ old('pilihan_ekskul') == 'Kesenian' ? 'selected' : '' }}>
                                Kesenian
                            </option>
                            <option value="Olahraga" {{ old('pilihan_ekskul') == 'Olahraga' ? 'selected' : '' }}>
                                Olahraga
                            </option>
                        </select>
                        @error('pilihan_ekskul')
                            <div class="invalid-feedback-custom">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group-modern">
                        <label>
                            <i class="fas fa-calendar-week"></i> Hari Latihan <span class="text-danger">*</span>
                        </label>
                        <select name="hari_latihan" class="form-control-modern @error('hari_latihan') is-invalid @enderror">
                            <option value="">-- Pilih Hari Latihan --</option>
                            <option value="Senin" {{ old('hari_latihan') == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ old('hari_latihan') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ old('hari_latihan') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ old('hari_latihan') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ old('hari_latihan') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ old('hari_latihan') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        </select>
                        @error('hari_latihan')
                            <div class="invalid-feedback-custom">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group-modern">
                        <label>
                            <i class="fas fa-toggle-on"></i> Status Keaktifan <span class="text-danger">*</span>
                        </label>
                        <select name="status_keaktifan" class="form-control-modern @error('status_keaktifan') is-invalid @enderror">
                            <option value="1" {{ old('status_keaktifan') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('status_keaktifan') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('status_keaktifan')
                            <div class="invalid-feedback-custom">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('siswa_ekskul.index') }}" class="btn btn-outline-secondary-custom">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-gradient-success">
                            <i class="fas fa-save"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection