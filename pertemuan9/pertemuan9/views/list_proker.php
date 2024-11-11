<?php
include_once("D:/xampp/htdocs/MVC/controllers/ProgramKerjaController.php");

$controller = new ProgramKerjaController();
$programKerja = $controller->getProgramKerja(); // Panggil metode getter
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Kerja</title>
</head>
<body>
    <h2>Daftar Program Kerja</h2>
    <a href="add_proker.php">Tambah Program Kerja</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Surat Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($programKerja as $proker) : ?>
                <tr>
                    <td><?= $proker['nomor'] ?></td>
                    <td><?= $proker['nama'] ?></td>
                    <td><?= $proker['surat_keterangan'] ?></td>
                    <td>
                        <a href="edit_proker.php?nomor=<?= $proker['nomor'] ?>">Edit</a>
                        <form action="delete_proker.php" method="POST" style="display:inline;">
                            <input type="hidden" name="nomor" value="<?= $proker['nomor'] ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../logout.php">Logout</a>
</body>
</html>