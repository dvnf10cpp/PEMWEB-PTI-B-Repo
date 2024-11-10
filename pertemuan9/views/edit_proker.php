<!DOCTYPE html>
<html>
<head>
    <title>Edit Program Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Program Kerja</h2>
        <form action="edit_proker.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="nomor" value="<?= $proker['nomor'] ?>">
            <input type="hidden" name="current_surat" value="<?= $proker['surat_keterangan'] ?>">
            
            <div class="mb-3">
                <label class="form-label">Nama Program</label>
                <input type="text" class="form-control" name="nama" value="<?= $proker['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Surat Keterangan</label>
                <?php if ($proker['surat_keterangan']): ?>
                    <div class="mb-2">
                        <a href="<?= $proker['surat_keterangan'] ?>" target="_blank">Lihat Surat Saat Ini</a>
                    </div>
                <?php endif; ?>
                <input type="file" class="form-control" name="surat_keterangan">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah surat</small>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="list_proker.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
