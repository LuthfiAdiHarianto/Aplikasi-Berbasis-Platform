<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h1>Selamat datang, {{ $user->name }}</h1>
        
        <a href="/logout" class="btn btn-primary mt-3 mb-4">Logout</a>

        <p class="text-dark">Jika tombol logout di-klik maka keluar dari autentikasi dan kembali ke halaman login</p>
    </div>
</body>
</html>