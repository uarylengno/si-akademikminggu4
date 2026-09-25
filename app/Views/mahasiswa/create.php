<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title mb-4">Tambah Mahasiswa</h2>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="/si-akademik/public/mahasiswa/store">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?= htmlspecialchars($_POST['nim'] ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="prodi" class="form-control" value="<?= htmlspecialchars($_POST['prodi'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Dosen Pembimbing</label>
                    <select name="dosen_id" class="form-select">
                        <option value="">-- Belum ada --</option>
                        <?php foreach ($dosenList as $d): ?>
                            <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nama']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="/si-akademik/public/mahasiswa" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>