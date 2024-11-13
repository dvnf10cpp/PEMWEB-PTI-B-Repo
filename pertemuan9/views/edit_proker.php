<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proker</title>
</head>
<body>
    <?php if (isset($proker)): ?>
        <form method="POST" action="controllers/ProgramKerja.php?action=updateProker&nomor=<?= $proker['nomor']; ?>">
            Nama: <input type="text" name="nama" value="<?= $proker['nama']; ?>">
            Surat Keterangan: <input type="text" name="surat_keterangan" value="<?= $proker['surat_keterangan']; ?>">
            <button type="submit">Simpan</button>
        </form>
    <?php else: ?>
        <p>Program Kerja tidak ditemukan.</p>
    <?php endif; ?>
</body>
</html>