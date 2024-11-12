<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff9c4; 
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        .login-container {
            background-color: #fffde7; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #fbc02d; 
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #fdd835; 
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #f9a825; 
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #f57f17; 
        }

        p {
            margin-top: 15px;
            font-size: 14px;
        }

        a {
            color: #f9a825;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Login yuu ges</h2>
    <form action="../login.php" method="POST">
        <input type="text" name="nim" placeholder="NIM" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>Km belum punya akun? <a href="register_view.php">Daftar sini ya</a></p>
</body>

</html>

