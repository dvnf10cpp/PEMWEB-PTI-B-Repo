<?php
session_start();

include_once '../controllers/ProgramKerjaController.php';

$controller = new ProgramKerjaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomor = filter_var($_POST['nomor'], FILTER_SANITIZE_NUMBER_INT);
    $nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
    $suratKeterangan = filter_var($_POST['surat_keterangan'], FILTER_SANITIZE_STRING);

    if ($nomor && $nama && $suratKeterangan) {
        if ($controller->addProker($nomor, $nama, $suratKeterangan)) {
            header('Location: success.php');
            exit();
        } else {
            echo "Terjadi kesalahan saat menambahkan program kerja.";
        }
    } else {
        echo "Input tidak valid.";
    }
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
    <?php if (isset($_GET['error'])) : ?>
        <p style="color: red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="nomor">Nomor Program:</label><br>
        <input type="number" name="nomor" id="nomor" required><br><br>

        <label for="nama">Nama Program:</label><br>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="surat_keterangan">Surat Keterangan:</label><br>
        <input type="text" name="surat_keterangan" id="surat_keterangan" required><br><br>

        <button type="submit">Tambah Program Kerja</button>
    </form>
</body>

</html>