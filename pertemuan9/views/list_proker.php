<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Program Kerja</title>
</head>
<body>
    <h1>Daftar Program Kerja</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Program</th>
                <th>Surat Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($programs) && is_array($programs)) {
                foreach ($programs as $program): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($program['nomor']); ?></td>
                        <td><?php echo htmlspecialchars($program['nama']); ?></td>
                        <td><?php echo htmlspecialchars($program['surat_keterangan']); ?></td>
                    </tr>
                <?php endforeach;
            } else {
                echo "<tr><td colspan='3'>No Programs availabel</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="add_proker.php">Tambah Program Kerja</a><br>
    <a href="edit_proker.php">Edit Program Kerja</a><br>
</body>
</html>