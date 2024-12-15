<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengurus BEM</title>
</head>
<body>
    <h1>Login Pengurus BEM</h1>
    <form action="login.php" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>