<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 600px;">
        <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>
        <div class="card shadow">
            <div class="card-body">
                
                <div class="mb-4">
                    <h2 class="card-title mb-0">LOGIN AKADEMIK</h2>
                </div>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger py-2" role="alert">
                        <?= $error; ?>
                    </div>
                <?php endif; ?>

                <form action="/si-akademik/public/login/process" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>