<?php
include '../config/koneksi_mysql.php';

if (isset($_POST['submit'])) {
    $nomorProgram = $_POST['nomorProgram'];
    $nama = $_POST['nama'];
    $suratKeterangan = $_POST['suratKeterangan'];

    $query = "INSERT INTO program_kerja (nomorProgram, nama, suratKeterangan) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sss", $nomorProgram, $nama, $suratKeterangan);

    if ($stmt->execute()) {
        header("Location: list_proker.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
       
}   
?>

<form action="list_proker.php" method="POST">
    <label>Nomor Program</label>
    <input type="number" name="nomorProgram" required>

    <label>Nama Program</label>
    <input type="text" name="nama" required>

    <label>Surat Keterangan</label>
    <textarea name="suratKeterangan" required></textarea>

    <button type="submit" name="submit">Tambah Proker</button>
</form>