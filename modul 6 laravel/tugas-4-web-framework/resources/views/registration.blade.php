<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container" style="max-width: 500px;">
        <h1 class="mb-4">Registration</h1>

        <form action="/register" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>

            <div class="d-flex align-items-center mb-3">
                <button type="submit" class="btn btn-success me-4">Register</button>
                <a href="/login" class="text-decoration-none">Sudah punya akun? Login</a>
            </div>
        </form>

        {{-- Pesan Sukses --}}
        @if(session('success'))
            <p class="mt-3 text-muted">{{ session('success') }}</p>
        @endif
    </div>
</body>
</html>