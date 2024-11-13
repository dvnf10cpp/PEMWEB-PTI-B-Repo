<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Proker</title>
</head>
<body>
    <form action="/pertemuan9/controllers/ProgramKerja.php?action=addProker" method="POST">
        <input type="text" name="nama" placeholder="Nama Program Kerja" required>
        <input type="text" name="surat_keterangan" placeholder="Surat Keterangan" required>
        <button type="submit">Tambah Program Kerja</button>
    </form>
</body>
</html>