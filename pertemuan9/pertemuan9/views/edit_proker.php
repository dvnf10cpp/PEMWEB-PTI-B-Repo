<?php
session_start();
include_once '../controllers/ProgramKerjaController.php';

$controller = new ProgramKerjaController();

// Check if 'nomor' exists in the GET request and is a valid integer
if (isset($_GET['nomor']) && filter_var($_GET['nomor'], FILTER_VALIDATE_INT) !== false) {
    $nomor = (int)$_GET['nomor']; 
} else {
    // Redirect if 'nomor' is not set or invalid
    header("Location: list_proker.php");
    exit();
}

$program = $controller->getProgramModel()->fetchOneProgramKerja($nomor);

if (!$program) {
    // Handle the case where the program is not found
    header("Location: list_proker.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateProker();
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
    <form action="edit_proker.php?nomor=<?= htmlspecialchars($nomor) ?>" method="POST">
        <label>Nomor Program:</label><br>
        <input type="number" name="nomor" value="<?= htmlspecialchars($program['nomor']) ?>" readonly><br><br>

        <label>Nama Program:</label><br>
        <input type="text" name="nama" value="<?= htmlspecialchars($program['nama']) ?>" required><br><br>

        <label>Surat Keterangan:</label><br>
        <input type="text" name="surat_keterangan" value="<?= htmlspecialchars($program['surat_keterangan']) ?>" required><br><br>

        <button type="submit">Update Program Kerja</button>
    </form>
</body>

</html>