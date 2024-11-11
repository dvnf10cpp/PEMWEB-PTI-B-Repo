<?php
session_start();

// Cek status login
if (empty($_SESSION['logged_in'])) {
    header("Location: login_view.php");
    exit();
}

require_once '../controllers/ProgramKerja.php';
$controller = new ProgramKerjaController();

// Hapus program jika ada request POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nomor'])) {
    $controller->deleteProker();
}

// Ambil daftar program kerja
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
            margin: 20px;
        }
        .header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            display: inline;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Daftar Program Kerja</h2>
        <a href="add_proker.php">Tambah Program Kerja</a>
        <a href="../logout.php">Logout</a>
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
                <td>
                    <a href="edit_proker.php?nomor=<?= htmlspecialchars($program['nomor']) ?>">Edit</a>
                    <form action="" method="POST">
                        <input type="hidden" name="nomor" value="<?= htmlspecialchars($program['nomor']) ?>">
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus program ini?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
