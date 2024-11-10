<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Program Kerja</title>
</head>
<body>
    <h2>Tambah Program Kerja</h2>
    <form action="ProkerController.php?action=add" method="POST">
        <label for="title">Judul Program:</label>
        <input type="text" name="title" required><br>
        <label for="description">Deskripsi:</label>
        <textarea name="description" required></textarea><br>
        <button type="submit">Tambah</button>
    </form>
    <a href="list_proker.php">Kembali ke daftar program kerja</a>
</body>
</html>
