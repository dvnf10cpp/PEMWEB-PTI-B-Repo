<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <form action="../register.php" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <br> <br>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required>
        <br> <br>
        <label for="angkatan">Angkatan:</label>
        <input type="number" name="angkatan"  required>
        <br> <br>
        <label for="jabatan">Jabatan:</label>
        <input type="text" name="jabatan" required>
        <br> <br>
        <label for="nim">Foto (url):</label>
        <input type="text" name="foto">
        <br> <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br> <br>
        <button type="submit">Register</button>
    </form>
    <p><a href="login_view.php">Klik di sini</a> jika sudah punya akun</p>
</body>

</html>