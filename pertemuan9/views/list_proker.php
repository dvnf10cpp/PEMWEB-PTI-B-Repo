<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

include_once("../config/koneksi_mysql.php");
include_once("../model/ProgramKerja.php");

$controller = new ProgramKerja($mysqli);

$programKerja = $controller->fetchAllProgramKerja();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Program Kerja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
        .proker-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }


    </style>
</head>
<body>
    <h1>List Program Kerja</h1>
    <form action="../logout.php" method="POST" style="display:inline;">
        <button type="submit">Logout</button>
    </form>
    <button><a href="../views/add_proker.php">Tambah Program Kerja</a></button>
    <hr>
    
    <?php if (count($programKerja) > 0): ?>
        <?php foreach ($programKerja as $proker): ?>
            <div class="proker-item">
                <h2><?php echo htmlspecialchars($proker['nama']); ?></h2>
                <p><?php echo htmlspecialchars($proker['surat_keterangan']); ?></p>

                <button><a href="../views/edit_proker.php?nomor=<?php echo htmlspecialchars($proker['nomor']); ?>">Edit</a></button>
                
                <form action="../controllers/ProgramKerja.php" method="POST" style="display:inline;">
                    <input type="hidden" name="nomor" value="<?php echo htmlspecialchars($proker['nomor']); ?>">
                    <button type="submit" name="action" value="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus program kerja ini?')" class="btn">Hapus</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada program kerja yang tersedia.</p>
    <?php endif; ?>
</body>
</html>
