@extends('layouts.app')

@section('title', 'About')

@section('content')
<div style="background: linear-gradient(135deg, #0f766e 0%, #0284c7 100%);">
    <div class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <h1 class="text-white fw-bold mb-3">Tentang Saya</h1>
                <p class="text-white-50 mb-0">Kenali lebih dekat orang di balik blog ini</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="text-center mb-5">
                <div class="position-relative d-inline-block mb-4">
                    <div class="rounded-circle p-1" style="background: linear-gradient(135deg, #0f766e, #14b8a6);">
                        @php
                            $profilePhoto = asset('storage/profile/profile.jpeg'); 
                        @endphp
                        <img src="{{ file_exists(public_path('storage/profile/profile.jpeg')) ? $profilePhoto : $defaultPhoto }}" 
                             class="rounded-circle border border-4 border-white" 
                             alt="Profile" 
                             style="width: 160px; height: 160px; object-fit: cover;">
                    </div>
                </div>
                <h1 class="fw-bold mb-2" style="color: #0f172a;">蕭以賢</h1>
                <p class="text-muted">
                    <i class="fas fa-map-marker-alt me-1 text-teal"></i> Jawa Tengah, Indonesia
                </p>
                <div class="d-flex justify-content-center gap-3 mb-4">
                    <a href="https://wa.me/085292165080" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px; line-height: 40px; padding: 0; border-color: #0f766e; color: #0f766e;">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://github.com/alfrzimhmd" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px; line-height: 40px; padding: 0; border-color: #0f766e; color: #0f766e;">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://instagram.com/mhmdalfrz_11" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px; line-height: 40px; padding: 0; border-color: #0f766e; color: #0f766e;">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold mb-3" style="color: #0f172a;">
                        <i class="fas fa-user-circle me-2" style="color: #0f766e;"></i>Tentang Saya
                    </h3>
                    <p class="lead" style="color: #0f766e;">
                        Halo! Saya adalah seorang pengembang web & mobile yang senang berbagi pengetahuan melalui tulisan.
                    </p>
                    <p style="color: #334155;">
                        Blog ini dibuat sebagai tempat untuk mendokumentasikan perjalanan belajar saya di dunia pemrograman, 
                        khususnya dalam pengembangan web menggunakan Laravel, PHP, dan pengembangan mobile menggunakan Flutter & Dart.
                    </p>
                    <p style="color: #334155;">
                        Saya percaya bahwa berbagi pengetahuan adalah cara terbaik untuk belajar dan berkembang. 
                        Melalui blog ini, saya berharap dapat memberikan manfaat dan inspirasi bagi para pembaca.
                    </p>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold mb-4" style="color: #0f172a;">
                        <i class="fas fa-code me-2" style="color: #0f766e;"></i>Skills & Expertise
                    </h3>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fab fa-laravel me-2" style="color: #ef4444;"></i>Laravel</span>
                                    <span class="text-muted">85%</span>
                                </div>
                                <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e2e8f0;">
                                    <div class="progress-bar" style="width: 85%; background: linear-gradient(90deg, #0f766e, #14b8a6); border-radius: 10px;"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fab fa-php me-2" style="color: #4f46e5;"></i>PHP</span>
                                    <span class="text-muted">80%</span>
                                </div>
                                <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e2e8f0;">
                                    <div class="progress-bar" style="width: 80%; background: linear-gradient(90deg, #0f766e, #14b8a6); border-radius: 10px;"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fas fa-database me-2" style="color: #3b82f6;"></i>MySQL</span>
                                    <span class="text-muted">75%</span>
                                </div>
                                <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e2e8f0;">
                                    <div class="progress-bar" style="width: 75%; background: linear-gradient(90deg, #0f766e, #14b8a6); border-radius: 10px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fab fa-js me-2" style="color: #eab308;"></i>JavaScript</span>
                                    <span class="text-muted">70%</span>
                                </div>
                                <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e2e8f0;">
                                    <div class="progress-bar" style="width: 70%; background: linear-gradient(90deg, #0f766e, #14b8a6); border-radius: 10px;"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fab fa-bootstrap me-2" style="color: #8b5cf6;"></i>Bootstrap</span>
                                    <span class="text-muted">70%</span>
                                </div>
                                <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e2e8f0;">
                                    <div class="progress-bar" style="width: 70%; background: linear-gradient(90deg, #0f766e, #14b8a6); border-radius: 10px;"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fab fa-git-alt me-2" style="color: #ef4444;"></i>Git</span>
                                    <span class="text-muted">65%</span>
                                </div>
                                <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e2e8f0;">
                                    <div class="progress-bar" style="width: 65%; background: linear-gradient(90deg, #0f766e, #14b8a6); border-radius: 10px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h5 class="fw-bold mb-3" style="color: #0f172a;">
                            <i class="fas fa-mobile-alt me-2" style="color: #0f766e;"></i>Mobile Development
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>
                                            <i class="devicon-flutter-plain me-2" style="color: #1979c8; font-size: 1.2rem;"></i>
                                            Flutter
                                        </span>
                                        <span class="text-muted">89%</span>
                                    </div>
                                    <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e2e8f0;">
                                        <div class="progress-bar" style="width: 89%; background: linear-gradient(90deg, #0f766e, #14b8a6); border-radius: 10px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>
                                            <i class="devicon-dart-plain me-2" style="color: #1979c8; font-size: 1.2rem;"></i>
                                            Dart
                                        </span>
                                        <span class="text-muted">85%</span>
                                    </div>
                                    <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e2e8f0;">
                                        <div class="progress-bar" style="width: 85%; background: linear-gradient(90deg, #0f766e, #14b8a6); border-radius: 10px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center py-4">
                <i class="fas fa-quote-left fa-2x" style="color: #0f766e; opacity: 0.5;"></i>
                <p class="fs-5 fst-italic mt-3" style="color: #334155;">
                    "The only way to do great work is to love what you do."
                </p>
                <footer class="text-muted">- Steve Jobs</footer>
            </div>
            
            <div class="text-center mt-4">
                <a href="/blog" class="btn btn-primary rounded-pill px-4">
                    <i class="fas fa-newspaper me-2"></i>Jelajahi Artikel
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .text-teal { color: #0f766e; }
    .btn-outline-primary:hover {
        background: #0f766e !important;
        border-color: #0f766e !important;
    }
    .btn-outline-primary:hover i {
        color: white !important;
    }
    .progress-bar {
        border-radius: 10px;
    }
</style>
@endsection