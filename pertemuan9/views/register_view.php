<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h2>Register</h2>
    <form action="../register.php" method="POST" style="display: flex; flex-direction: column; gap: 10px; width: 400px">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="nim" placeholder="NIM" required>
        <input type="number" name="angkatan" placeholder="Angkatan" required>
        <input type="text" name="jabatan" placeholder="Jabatan" required>
        <input type="text" name="foto" placeholder="Foto URL">
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <p>Sudah punya akun? <a href="login_view.php">Login di sini</a></p>
</body>

</html>