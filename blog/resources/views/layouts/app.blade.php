<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Creative Blog') - BlogSaya</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    
    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            background: linear-gradient(145deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main { flex: 1; }
        
        .navbar {
            background: rgba(255,255,255,0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            padding: 1rem 0;
            border-bottom: 1px solid rgba(15, 118, 110, 0.1);
        }
        .navbar-brand {
            font-weight: 800;
            font-size: 1.6rem;
            background: linear-gradient(135deg, #0f766e, #14b8a6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
        }
        .nav-link {
            color: #334155 !important;
            font-weight: 500;
            margin: 0 0.25rem;
            transition: all 0.2s ease;
            border-radius: 50px;
            padding: 0.5rem 1rem !important;
        }
        .nav-link:hover, .nav-link.active {
            background: #0f766e10;
            color: #0f766e !important;
        }
        
        footer {
            background: #0f172a;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #0f766e, #14b8a6, #f59e0b);
        }
        
        .card {
            border: none;
            border-radius: 28px;
            transition: all 0.35s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            background: #ffffff;
            box-shadow: 0 20px 35px -12px rgba(0,0,0,0.05);
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 40px -12px rgba(15,118,110,0.25);
        }
        .btn-primary {
            background: linear-gradient(95deg, #0f766e, #14b8a6);
            border: none;
            border-radius: 60px;
            padding: 8px 24px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 12px 18px -8px #0f766e80; background: #0d9488;}
        .btn-outline-primary {
            border: 2px solid #0f766e;
            color: #0f766e;
            border-radius: 60px;
            font-weight: 500;
        }
        .btn-outline-primary:hover { background: #0f766e; color: white; border-color: #0f766e; }
        
        .badge { padding: 6px 14px; border-radius: 50px; font-weight: 500; letter-spacing: -0.2px; }
        .table {
            border-radius: 24px;
            overflow: hidden;
        }
        .table thead { background: #0f172a; color: white; }
        .table tbody tr:hover { background: #f0fdfa; transition: 0.2s; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/"><i class="fas fa-feather-alt me-2" style="color:#0f766e"></i>BlogSaya</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link {{ request()->path() == '/' ? 'active' : '' }}" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->path() == 'blog' ? 'active' : '' }}" href="/blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->path() == 'about' ? 'active' : '' }}" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->path() == 'admin/artikel' ? 'active' : '' }}" href="/admin/artikel"><i class="fas fa-lock me-1"></i>Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <h5 class="fw-bold mb-1"><i class="fas fa-feather-alt me-2" style="color:#14b8a6"></i>BlogSaya</h5>
                <p class="text-white-50 small mb-0">Coding, Creativity, and Curiosity.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="https://wa.me/085292165080" target="_blank" class="text-white-50 me-4 fs-5"><i class="fab fa-whatsapp"></i></a>
                <a href="https://github.com/alfrzimhmd" target="_blank" class="text-white-50 me-4 fs-5"><i class="fab fa-github"></i></a>
                <a href="https://instagram.com/mhmdalfrz_11" target="_blank" class="text-white-50 fs-5"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <hr class="bg-white-50 mt-4 mb-3">
        <div class="text-center text-white-50 small">
            &copy; {{ date('Y') }} BlogSaya — Dibangun dengan Laravel & Bootstrap
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>