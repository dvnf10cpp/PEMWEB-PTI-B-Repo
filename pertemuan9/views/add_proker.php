<?php
session_start();

// Redirect ke halaman login jika user belum login
if (empty($_SESSION['logged_in'])) {
    header("Location: login_view.php");
    exit();
}

require_once '../controllers/ProgramKerja.php';
$controller = new ProgramKerjaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->addProker();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Program Kerja</title>
</head>

<body>
    <h2>Tambah Program Kerja</h2>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div>
            <label for="nomor">Nomor Program:</label><br>
            <input type="number" id="nomor" name="nomor" required><br><br>
        </div>
        
        <div>
            <label for="nama">Nama Program:</label><br>
            <input type="text" id="nama" name="nama" required><br><br>
        </div>

        <div>
            <label for="surat_keterangan">Surat Keterangan:</label><br>
            <input type="text" id="surat_keterangan" name="surat_keterangan" required><br><br>
        </div>

        <button type="submit">Tambah Program Kerja</button>
    </form>
</body>

</html>
