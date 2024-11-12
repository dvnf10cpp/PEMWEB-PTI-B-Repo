<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login_view.php");
    exit();
}
include_once 'C:\xampp.lagi\htdocs\pengurusBEM\controllers\ProgramKerjaController.php';
$controller = new ProgramKerjaController();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nomor'])) {
    $controller->deleteProker();
}
$programList = $controller->programModel->fetchAllProgramKerja();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Program Kerja</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }

        div {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        button a {
            color: white;
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f8f8f8;
            color: #333;
        }

        td a {
            color: #4CAF50;
            text-decoration: none;
            margin-right: 10px;
        }

        td a:hover {
            text-decoration: underline;
        }

        form {
            display: inline;
        }
        form button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <div style="display: flex; align-items: center; gap: 20px;">
        <h2>Daftar Program Kerja</h2>
        <button>
            <a href="add_proker.php" style="text-decoration: none;">Add Program Kerja</a>
        </button>
        <button>
            <a href="../logout.php" style="text-decoration: none;">Logout</a>
        </button>
    </div>
    <table border="1">
        <tr>
            <th>Nomor Program</th>
            <th>Nama Program</th>
            <th>Surat Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php

        foreach ($programList as $program): ?>
            <tr>
                <td><?= htmlspecialchars($program['nomor']) ?></td>
                <td><?= htmlspecialchars($program['nama']) ?></td>
                <td><?= htmlspecialchars($program['surat_keterangan']) ?></td>
                <td>
                    <a href="edit_proker.php?nomor=<?= $program['nomor'] ?>">Edit</a>
                    <form action="" method="POST" style="display:inline;">
                        <input type="hidden" name="nomor" value="<?= $program['nomor'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php
    unset($programList);
    ?>
</body>

</html>



