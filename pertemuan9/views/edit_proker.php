<?php
session_start();

// Cek status login
if (empty($_SESSION['logged_in'])) {
    header("Location: login_view.php");
    exit();
}

require_once '../controllers/ProgramKerja.php';
$controller = new ProgramKerjaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateProker();
    header("Location: list_proker.php");
    exit();
}

// Ambil nomor program dari query string
$nomorProgram = $_GET['nomor'] ?? null;
if ($nomorProgram !== null) {
    $program = $controller->programModel->fetchOneProgramKerja((int)$nomorProgram);
    if (!$program) {
        header("Location: list_proker.php");
        exit();
    }
} else {
    header("Location: list_proker.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Program Kerja</title>
</head>

<body>
    <h2>Edit Program Kerja</h2>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?nomor=' . htmlspecialchars($nomorProgram); ?>" method="POST">
        <div>
            <label for="nomor">Nomor Program:</label><br>
            <input type="number" id="nomor" name="nomor" value="<?= htmlspecialchars($program['nomor']) ?>" readonly><br><br>
        </div>

        <div>
            <label for="nama">Nama Program:</label><br>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($program['nama']) ?>" required><br><br>
        </div>

        <div>
            <label for="surat_keterangan">Surat Keterangan:</label><br>
            <input type="text" id="surat_keterangan" name="surat_keterangan" value="<?= htmlspecialchars($program['surat_keterangan']) ?>" required><br><br>
        </div>

        <button type="submit">Update Program Kerja</button>
    </form>
</body>

</html>
