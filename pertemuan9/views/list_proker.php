<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Program Kerja</title>
</head>
<body>
    <h1>List Program Kerja</h1>
    <table border="1">
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Surat Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($programKerjaList as $program) { ?>
        <tr>
            <td><?php echo $program['nomor']; ?></td>
            <td><?php echo $program['nama']; ?></td>
            <td><?php echo $program['surat_keterangan']; ?></td>
            <td>
                <a href="edit_proker.php?nomor=<?php echo $program['nomor']; ?>">Edit</a>
                <a href="delete_proker.php?nomor=<?php echo $program['nomor']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>