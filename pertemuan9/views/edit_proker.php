<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login_view.php");
    exit();
}
include_once 'C:\xampp.lagi\htdocs\pengurusBEM\controllers\ProgramKerjaController.php';
$controller = new ProgramKerjaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateProker();
    header("Location: list_proker.php");
    exit();
}

if (isset($_GET['nomor'])) {
    $nomorProgram = (int)$_GET['nomor'];
    $program = $controller->programModel->fetchOneProgramKerja($nomorProgram);
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
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }
        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
            text-align: left;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Edit Program Kerja</h2>
    <form action="edit_proker.php" method="POST">
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
