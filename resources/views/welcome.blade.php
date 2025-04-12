<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang di E-Procurement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container text-center py-5">
        <h1 class="mb-4">Selamat Datang di Sistem E-Procurement</h1>
        <p class="mb-4">Silahkan login atau register untuk melanjutkan.</p>
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
        </div>
    </div>
</body>
</html>
