<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Portal Akademik</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 1000px; margin: 0 auto; }
        header { margin-bottom: 20px; }
        header a { margin-right: 15px; text-decoration: none; color: blue; }
        footer { margin-top: 30px; text-align: center; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; }
        .btn-add { background-color: green; color: white; padding: 10px; display: inline-block; margin-bottom: 15px; }
        .btn-edit { background-color: blue; color: white; }
        .btn-delete { background-color: red; color: white; border: none; cursor: pointer; }
        .alert-success { background-color: lightgreen; padding: 10px; margin-bottom: 15px; border-radius: 5px; }
        .error { color: red; font-size: 12px; margin-top: 5px; }
        .form-group { margin-bottom: 15px; }
        label { font-weight: bold; }
        input[type="text"], select { width: 100%; padding: 8px; margin-top: 5px; }
        button { background-color: blue; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Sistem Akademik</h1>
            <nav>
                <a href="/beranda">Beranda</a> |
                <a href="/mahasiswa">Mahasiswa</a> |
                <a href="/dosen">Dosen</a>
            </nav>
            <hr>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <hr>
            <p>&copy; 2026 Teknologi Informasi - UIN Salatiga</p>
        </footer>
    </div>
</body>
</html>