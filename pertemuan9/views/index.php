<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, arahkan ke halaman login
    header('Location: login_view.php');
    exit();
}

// Menampilkan pesan selamat datang
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Dashboard</title>
</head>
<body>
    <h1>Selamat datang di halaman utama!</h1>
    
    <p>Ini adalah halaman utama yang hanya bisa diakses oleh pengguna yang sudah login.</p>

    <h2>Menu:</h2>
    <ul>
        <li><a href="add_proker.php">Tambah Program Kerja</a></li>
        <li><a href="list_proker.php">Lihat Program Kerja</a></li>
        <li><a href="edit_proker.php">Edit Program Kerja</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
