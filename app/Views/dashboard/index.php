<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['username'] ?? 'admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Informasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 600px;">
        <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>
        <div class="card shadow">
            <div class="card-body">
                
                <div class="mb-4">
                    <h2 class="card-title mb-0 text-center">Sistem Informasi Akademik</h2>
                </div>

                <p class="fs-5 text-center">Selamat datang, <strong><?= htmlspecialchars($username); ?></strong>.</p>
                
                <hr>

                <h5 class="mb-3 text-center">Menu:</h5>
                <div class="d-flex justify-content-center gap-2">
                    <a href="/si-akademik/public/mahasiswa" class="btn btn-primary">Mahasiswa</a>
                    <a href="/si-akademik/public/dosen" class="btn btn-secondary">Dosen</a>
                    <a href="/si-akademik/public/logout" class="btn btn-danger">Logout</a>
                </div>

            </div>
        </div>
    </div>
</body>
</html>