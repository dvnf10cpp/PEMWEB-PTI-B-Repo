<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="POST" enctype="multipart/form-data">
        <label>Nama:</label><input type="text" name="nama" required><br>
        <label>NIM:</label><input type="text" name="nim" required><br>
        <label>Angkatan:</label><input type="number" name="angkatan" required><br>
        <label>Jabatan:</label><input type="text" name="jabatan" required><br>
        <label>Foto:</label><input type="file" name="foto" required><br>
        <label>Password:</label><input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>