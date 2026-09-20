<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>
    <div class="card shadow">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="card-title mb-0">DATA MAHASISWA</h2>
                <a href="/si-akademik/public/dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
            </div>
            
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Dosen Pembimbing</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa as $m): ?>
                    <tr>
                        <td><?= htmlspecialchars($m['nim']) ?></td>
                        <td><?= htmlspecialchars($m['nama']) ?></td>
                        <td><?= htmlspecialchars($m['prodi']) ?></td>
                        <td><?= htmlspecialchars($m['nama_dosen'] ?? 'Belum ada') ?></td>
                        <td>
                            <a href="/si-akademik/public/mahasiswa/detail?nim=<?= $m['nim']; ?>" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>