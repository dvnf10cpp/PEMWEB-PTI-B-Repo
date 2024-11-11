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
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }

        .register-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        .register-form input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .register-form button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .register-form button:hover {
            background-color: #45a049;
        }

        .login-link {
            margin-top: 15px;
            color: #0073e6;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
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
        <p>Sudah punya akun? <a href="login_view.php">Login di sini</a></p>
    </div>
</body>

</html>