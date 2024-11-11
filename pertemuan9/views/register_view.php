<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        .register-container {
            width: 300px;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            text-align: center;
        }
       </style>
</head>

<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="../register.php" method="POST">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="number" name="angkatan" placeholder="Angkatan" required>
            <input type="text" name="jabatan" placeholder="Jabatan" required>
            <input type="text" name="foto" placeholder="Foto URL">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <div class="login-link">
            <p>Sudah punya akun? <a href="login_view.php">Login di sini</a></p>
        </div>
    </div>
</body>

</html>
