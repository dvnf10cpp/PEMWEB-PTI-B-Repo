<!DOCTYPE html>
<html>
<head>
    <title>List Program Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Program Kerja BEM</h2>
            <a href="add_proker.php" class="btn btn-primary">Tambah Program Kerja</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Program</th>
                    <th>Surat Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($programKerjaList as $proker): ?>
                <tr>
                    <td><?= $proker['nomor'] ?></td>
                    <td><?= $proker['nama'] ?></td>
                    <td>
                        <?php if ($proker['surat_keterangan']): ?>
                            <a href="<?= $proker['surat_keterangan'] ?>" target="_blank">Lihat Surat</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="edit_proker.php?id=<?= $proker['nomor'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="delete_proker.php?id=<?= $proker['nomor'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>