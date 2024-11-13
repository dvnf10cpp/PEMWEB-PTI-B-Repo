<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Program Kerja</title>
</head>
<body>
    <?php if (isset($programKerjaList) && count($programKerjaList) > 0): ?>
        <table>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Surat Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($programKerjaList as $proker): ?>
                <tr>
                    <td><?= $proker['nomor']; ?></td>
                    <td><?= $proker['nama']; ?></td>
                    <td><?= $proker['surat_keterangan']; ?></td>
                    <td>
                        <a href="controllers/ProgramKerja.php?action=viewEditProker&nomor=<?= $proker['nomor']; ?>">Edit</a>
                        <a href="controllers/ProgramKerja.php?action=deleteProker&nomor=<?= $proker['nomor']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Tidak ada program kerja untuk ditampilkan.</p>
    <?php endif; ?>
</body>
</html>
