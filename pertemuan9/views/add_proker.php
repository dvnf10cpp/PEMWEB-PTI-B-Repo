<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program Kerja</title>
</head>
<body>
    <h1>Tambah Program Kerja</h1>
    <form action="add_proker.php" method="POST">
        <label for="nomor">Nomor:</label>
        <input type="number" id="nomor" name="nomor" required><br>

        <label for="nama">Nama Program Kerja:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="surat">Surat Keterangan:</label>
        <input type="text" id="surat" name="surat" required><br>

        <button type="submit">Tambah</button>
    </form>
</body>
</html>