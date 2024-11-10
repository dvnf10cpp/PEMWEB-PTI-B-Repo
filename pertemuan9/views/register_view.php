<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <form action="../register.php" method="POST">
        <input type="text" name="nama" placeholder="Nama" required><br>
        <input type="text" name="nim" placeholder="NIM" required><br>
        <input type="number" name="angkatan" placeholder="Angkatan" required><br>
        <input type="text" name="jabatan" placeholder="Jabatan" required><br>
        <input type="text" name="foto" placeholder="Foto URL"><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Sudah punya akun? <a href="login_view.php">Login di sini</a></p>
</body>

</html>