<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Pengurus BEM</title>
</head>
<body>
    <h1>Registrasi Pengurus BEM</h1>
    <form method="POST" action="register.php">
        <input type="text" name="nama" required placeholder="Nama">
        <br>
        <input type="text" name="nim" placeholder="NIM" required>
        <br>
        <input type="text" name="angkatan" placeholder="Angkatan" required>
        <br>
        <input type="text" name="jabatan" placeholder="Jabatan" required>
        <br>
        <input type="password" name="password" placeholder="Password" required>
        <br>
        <input type="file" name="foto" accept="image/*" required>
        <br>
        <button type="submit">Daftar</button>
    </form>
    <a href="views/login_view.php">masuk jika ada akun</a>
</body>
</html>
