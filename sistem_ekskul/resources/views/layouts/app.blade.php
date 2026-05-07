<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Pendataan Ekstrakurikuler SD | UIN Salatiga</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0f2f1 0%, #b2dfdb 50%, #80cbc4 100%);
            min-height: 100vh;
            background-attachment: fixed;
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(135deg, #0f9b8e 0%, #11998e 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            letter-spacing: -0.3px;
        }
        
        .navbar-brand i {
            background: linear-gradient(135deg, #0f9b8e 0%, #11998e 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-right: 8px;
        }
        
        .modern-card {
            background: white;
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .card-header-modern {
            background: linear-gradient(135deg, #0f9b8e 0%, #11998e 100%);
            padding: 1.25rem 1.5rem;
            border-bottom: none;
        }
        
        .card-header-modern h3 {
            color: white;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.35rem;
        }
        
        .card-header-modern h3 i {
            margin-right: 10px;
        }
        
        .btn-gradient-primary {
            background: linear-gradient(135deg, #0f9b8e 0%, #11998e 100%);
            border: none;
            color: white;
            padding: 10px 24px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-gradient-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 155, 142, 0.4);
            color: white;
        }
        
        .btn-gradient-success {
            background: linear-gradient(135deg, #0ba360 0%, #3ca55c 100%);
            border: none;
            color: white;
            padding: 10px 24px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-gradient-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(11, 163, 96, 0.4);
            color: white;
        }
        
        .btn-outline-secondary-custom {
            background: transparent;
            border: 2px solid #e2e8f0;
            color: #64748b;
            padding: 10px 24px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-secondary-custom:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
            color: #475569;
        }
        
        .form-group-modern {
            margin-bottom: 1.5rem;
        }
        
        .form-group-modern label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        
        .form-group-modern label i {
            margin-right: 8px;
            color: #0f9b8e;
        }
        
        .form-control-modern {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }
        
        .form-control-modern:focus {
            outline: none;
            border-color: #0f9b8e;
            box-shadow: 0 0 0 4px rgba(15, 155, 142, 0.1);
        }
        
        .form-control-modern.is-invalid {
            border-color: #ef4444;
        }
        
        .invalid-feedback-custom {
            color: #ef4444;
            font-size: 0.8rem;
            margin-top: 6px;
            display: block;
        }
        
        .table-wrapper {
            padding: 0;
            overflow-x: auto;
        }
        
        .table-modern {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 0;
        }
        
        .table-modern thead th {
            background: #ffffff;
            color: #0f9b8e;
            font-weight: 700;
            padding: 1rem 1rem;
            border-bottom: 3px solid #0f9b8e;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .table-modern thead th i {
            margin-right: 6px;
            color: #0f9b8e;
        }
        
        .table-modern tbody tr {
            transition: background 0.2s ease;
            border-bottom: 1px solid #f0fdf4;
        }
        
        .table-modern tbody tr:hover {
            background: #f0fdf4;
        }
        
        .table-modern tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e2e8f0;
            color: #334155;
            font-size: 0.9rem;
        }
        
        .badge-active {
            background: linear-gradient(135deg, #0ba360 0%, #3ca55c 100%);
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
            color: white;
        }
        
        .badge-inactive {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
            color: white;
        }
        
        .alert-modern {
            border-radius: 16px;
            border: none;
            padding: 1rem 1.25rem;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            animation: slideDown 0.3s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }
        
        .alert-fade-out {
            animation: fadeOut 0.5s ease-out forwards;
        }
        
        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-20px);
                display: none;
            }
        }
        
        .main-container {
            padding: 2rem 1rem 4rem 1rem;
        }
        
        .btn-action {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 500;
            margin: 0 4px;
            transition: all 0.2s ease;
        }
        
        .btn-action i {
            margin-right: 4px;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
            border: none;
            color: white;
        }
        
        .btn-warning:hover {
            background: linear-gradient(135deg, #f97316 0%, #f59e0b 100%);
            color: white;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border: none;
        }
        
        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        }
        
        .kelas-badge {
            background: #e0f2f1;
            color: #0f9b8e;
            padding: 6px 12px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.8rem;
            display: inline-block;
        }
        
        .kelas-badge i {
            margin-right: 4px;
        }
        
        @media (max-width: 768px) {
            .card-header-modern h3 {
                font-size: 1rem;
            }
            .card-header-modern {
                flex-direction: column;
                gap: 12px;
                text-align: center;
            }
            .table-modern {
                font-size: 0.8rem;
            }
            .btn-action {
                padding: 4px 8px;
                font-size: 0.7rem;
            }
            .table-modern thead th {
                font-size: 0.7rem;
                padding: 0.75rem 0.5rem;
            }
            .table-modern tbody td {
                padding: 0.75rem 0.5rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('siswa_ekskul.index') }}">
            <i class="fas fa-chalkboard-user"></i>
            Sistem Ekskul SD
        </a>
    </div>
</nav>

<div class="container main-container">
    @if(session('success'))
        <div class="alert alert-modern alert-success alert-dismissible fade show auto-dismiss" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.auto-dismiss');
        alerts.forEach(function(alert) {
            setTimeout(function() {
                alert.classList.add('alert-fade-out');
                setTimeout(function() {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 500);
            }, 3000);
        });
    });
</script>
</body>
</html>