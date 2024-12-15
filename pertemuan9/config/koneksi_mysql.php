<?php
$host = "localhost";           // Server database
$user = "root";                // Username MySQL
$password = "";                // Password MySQL (kosong jika tidak ada password)
$database = "bem_db";          // Nama database yang digunakan

// Membuat koneksi ke database MySQL dengan menggunakan objek mysqli
try {
    $mysqli = new mysqli($host, $user, $password, $database);

    // Cek koneksi
    if ($mysqli->connect_error) {
        throw new Exception("Koneksi gagal: " . $mysqli->connect_error);
    }
} catch (Exception $e) {
    // Tangani error koneksi
    error_log($e->getMessage()); // Menyimpan error dalam log (untuk pengembang)
    die("Terjadi masalah dengan koneksi database. Silakan coba lagi nanti."); // Pesan yang lebih aman untuk pengguna
}
?>
