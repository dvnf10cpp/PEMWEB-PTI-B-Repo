<!DOCTYPE html>
<html>
<head>
    <title>Tambah Program Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Program Kerja</h2>
        <form action="add_proker.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nomor Program</label>
                <input type="number" class="form-control" name="nomor" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Program</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Surat Keterangan</label>
                <input type="file" class="form-control" name="surat_keterangan" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="list_proker.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>