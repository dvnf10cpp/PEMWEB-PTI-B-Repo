<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login_view.php");
    exit();
}
include_once '../controllers/ProgramKerja.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Kerja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            color: #333;
        }

        .header button a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .header button {
            padding: 10px 20px;
            border: none;
            background-color: #4285f4;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .header button:hover {
            background-color: #357ae8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4285f4;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions a,
        .actions form button {
            color: #4285f4;
            text-decoration: none;
            font-weight: bold;
            border: none;
            background: none;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .actions form {
            display: inline;
        }

        .actions a:hover,
        .actions form button:hover {
            color: #d9534f;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Daftar Program Kerja</h2>
            <div>
                <button><a href="add_proker.php">Add Program Kerja</a></button>
                <button><a href="../logout.php">Logout</a></button>
            </div>
        </div>
        <table>
            <tr>
                <th>Nomor Program</th>
                <th>Nama Program</th>
                <th>Surat Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($programList as $program): ?>
                <tr>
                    <td><?= htmlspecialchars($program['nomor']) ?></td>
                    <td><?= htmlspecialchars($program['nama']) ?></td>
                    <td><?= htmlspecialchars($program['surat_keterangan']) ?></td>
                    <td class="actions">
                        <a href="edit_proker.php?nomor=<?= $program['nomor'] ?>">Edit</a>
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="nomor" value="<?= $program['nomor'] ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php unset($programList); ?>
</body>

</html>
