<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Program Kerja</title>
</head>
<body>
    <h2>Daftar Program Kerja</h2>
    <a href="add_proker.php">Tambah Program Kerja</a> | <a href="AuthController.php?action=logout">Logout</a>
    <table border="1">
        <tr>
            <th>Judul Program</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($prokers as $proker): ?>
        <tr>
            <td><?= $proker['title'] ?></td>
            <td><?= $proker['description'] ?></td>
            <td>
                <a href="edit_proker.php?id=<?= $proker['id'] ?>">Edit</a>
                <a href="ProkerController.php?action=delete&id=<?= $proker['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
