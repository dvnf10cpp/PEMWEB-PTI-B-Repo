<form action="index.php?action=updateProker&nomorProgram=<?= htmlspecialchars($programData['nomorProgram']) ?>" method="POST">
    <label>Nama Program</label>
    <input type="text" name="nama" value="<?=htmlspecialchars($programData['nama']) ?>" required>

    <label>Surat Keterangan</label>
    <textarea name="suratKeterangan" required><?=htmlspecialchars($programData['suratKeterangan']) ?></textarea>

    <button type="submit" name="submit">Update Proker</button>
</form>