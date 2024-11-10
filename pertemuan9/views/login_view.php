<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h2>Login</h2>
    <form action="../login.php" method="POST" style="display: flex; flex-direction: column; gap: 10px; width: 400px">
        <input type="text" name="nim" placeholder="NIM" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="register_view.php">Register di sini</a></p>
</body>

</html>