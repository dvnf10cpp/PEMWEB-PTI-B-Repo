<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program kerja</title>
</head>
<body>
    <h1>Edit Program Kerja</h1>
    <form action="list_proker.php" method="POST">
        <input type="hidden" name="nomor"><br>
        <label for="nama">Nama Program:</label>
        <input type="text" name="nama"><br>
        <label for="surat_keterangan">Surat Keterangan:</label>
        <input type="text" name="surat_keterangan" required><br>
        <button type="submit">Perbarui Program</button>
    </form>
</body>
</html>