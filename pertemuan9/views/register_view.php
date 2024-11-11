<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun Pengurus BEM</title>
</head>
<body>
    <h1>Register Akun Pengurus BEM</h1>
    <form action="../register.php" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required><br>
        <label for="angkatan">Angkatan:</label>
        <input type="number" name="angkatan" required><br>
        <label for="jabatan">Jabatan:</label>
        <input type="text" name="jabatan" required><br>
        <label for="foto">Foto:</label>
        <input type="text" name="foto" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>