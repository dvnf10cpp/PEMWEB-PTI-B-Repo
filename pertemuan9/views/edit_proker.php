<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program Kerja</title>
</head>
<body>
    <h1>Edit Program Kerja</h1>
    <form action="edit_proker.php" method="POST">
        <input type="hidden" name="nomor" value="<?php echo $programKerja['nomor']; ?>">
        <label for="nama">Nama Program Kerja:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $programKerja['nama']; ?>" required><br>

        <label for="surat">Surat Keterangan:</label>
        <input type="text" id="surat" name="surat" value="<?php echo $programKerja['surat_keterangan']; ?>" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>