<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #e8f0fe;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            color: #333;
        }

        .login-container form input {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .login-container form input:focus {
            outline: none;
            border-color: #4285f4;
            box-shadow: 0 0 5px rgba(66, 133, 244, 0.5);
        }

        .login-container form button {
            width: 100%;
            padding: 0.75rem;
            background-color: #4285f4;
            color: #fff;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container form button:hover {
            background-color: #357ae8;
        }

        .login-container p {
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .login-container a {
            color: #4285f4;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="../login.php" method="POST">
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="register_view.php">Daftar di sini</a></p>
    </div>
</body>

</html>