<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pengurus BEM</title>
</head>
<body>
    <h1>Register Pengurus BEM</h1>
    <form action="register.php" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br>

        <label for="angkatan">Angkatan:</label>
        <input type="text" id="angkatan" name="angkatan" required><br>

        <label for="jabatan">Jabatan:</label>
        <input type="text" id="jabatan" name="jabatan" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="foto">Upload Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
