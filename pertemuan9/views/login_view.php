<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengurus BEM</title>
</head>
<body>
    <h1>Login Pengurus BEM</h1>
    <form action="list_proker.php" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="views/register_view.php">Register di sini</a></p>
</body>
</html>