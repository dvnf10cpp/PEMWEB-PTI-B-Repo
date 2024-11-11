<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regist</title>
</head>
<body>
    <h2>Registrasi Pengurus Bem</h2>
    <form action="index.php?action=registerUser" method="POST">
        <label>Username</label>
        <input type="text" name="username" placeholder="Username" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Daftar</button>
    </form>
    <p>Sudah ada akun> <a href="index.php?action=viewLogin">Login di sini</a></p>
</body>
</html>