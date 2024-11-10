<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Program Kerja</title>
</head>
<body>
    <h2>Edit Program Kerja</h2>
    <form action="ProkerController.php?action=edit&id=<?= $_GET['id'] ?>" method="POST">
        <label for="title">Judul Program:</label>
        <input type="text" name="title" value="<?= $proker['title'] ?>" required><br>
        <label for="description">Deskripsi:</label>
        <textarea name="description" required><?= $proker['description'] ?></textarea><br>
        <button type="submit">Update</button>
    </form>
    <a href="list_proker.php">Kembali ke daftar program kerja</a>
</body>
</html>
