<!DOCTYPE html>
<html lang="en">
<head><title>Edit Dosen</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="container mt-5">
    <h2>Edit Dosen</h2>
    <form action="/si-akademik/public/dosen/update?id=<?= $dosen['id'] ?>" method="POST">
        <div class="mb-3"><label>NIDN</label><input type="text" name="nidn" value="<?= htmlspecialchars($dosen['nidn']) ?>" class="form-control" required></div>
        <div class="mb-3"><label>Nama</label><input type="text" name="nama" value="<?= htmlspecialchars($dosen['nama']) ?>" class="form-control" required></div>
        <div class="mb-3"><label>Bidang Keahlian</label><input type="text" name="bidang_keahlian" value="<?= htmlspecialchars($dosen['bidang_keahlian']) ?>" class="form-control" required></div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="/si-akademik/public/dosen" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>