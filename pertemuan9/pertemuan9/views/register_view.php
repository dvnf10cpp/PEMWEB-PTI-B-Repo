<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pengurus BEM</title>
</head>
<body>
    <h2>Register Akun Pengurus BEM</h2>
    <form action="../register.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required><br><br>
        <label>NIM:</label>
        <input type="text" name="nim" required><br><br>
        <label>Angkatan:</label>
        <input type="number" name="angkatan" required><br><br>
        <label>Jabatan:</label>
        <input type="text" name="jabatan" required><br><br>
        <label>Foto:</label>
        <input type="text" name="foto" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login_view.php">Login disini</a></p>
</body>
</html>
