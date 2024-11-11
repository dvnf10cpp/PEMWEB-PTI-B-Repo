<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program Kerja</title>
</head>
<body>
    <h1>Tambah Program Kerja</h1>
    <form action="list_proker.php" method="POST">
        <label for="nomor">Nomor Program:</label>
        <input type="number" name="nomor" required><br>
        <label for="nama">Nama Program:</label>
        <input type="text" name="nama" required><br>
        <label for="surat_keterangan">Surat Keterangan:</label>
        <input type="text" name="surat_keterangan" required><br>
        <button type="submit">Tambah Program</button>
    </form>
</body>
</html>