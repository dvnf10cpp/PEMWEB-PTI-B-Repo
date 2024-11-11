<?php
include '../config/koneksi_mysql.php';

if($mysqli->connect_error) {
    die("Koneksi gagal: ". $mysqli->connect_error);
}

$query = "SELECT * FROM program_kerja";
$result = $mysqli->query($query);

if (!$result) {
    die ("Error pada query: ". $mysqli->error);
}

$programKerjaList = [];
    while ($row = $result->fetch_assoc()) {
        $programKerjaList[] = $row;
    }
?>

<a href="add_proker.php">Tambah Proker</a>
<table>
    <thead>
        <tr>
        <th>Nomor Program</th>
        <th>Nama Program</th>
        <th>Surat Keterangan</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($programKerjaList)) : ?>
        <?php foreach ($programKerjaList as $program) : ?>
        <tr>
            <td><?=htmlspecialchars($program['nomorProgram']) ?></td>
            <td><?=htmlspecialchars($program['nama']) ?></td>
            <td><?=htmlspecialchars($program['suratKeterangan']) ?></td>
            <td>
                <a href="edit_proker.php?id=<?= $program['nomorProgram'] ?>">Edit</a>
                <a href="hapus_proker.php?id=<?= $program['nomorProgram'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="4">Tidak ada data Proker</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>