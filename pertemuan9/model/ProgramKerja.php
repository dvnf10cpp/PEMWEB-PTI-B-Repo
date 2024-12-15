<?php
require_once("config/koneksi_mysql.php");

class ProgramKerja
{
    private $mysqli;
    private $nomor;
    private $nama;
    private $surat_keterangan;

    public function __construct()
    {
        global $mysqli;
        $this->mysqli = $mysqli;
    }

    public function createModel($nomor, $nama, $surat_keterangan)
    {
        $this->nomor = $nomor;
        $this->nama = $nama;
        $this->surat_keterangan = $surat_keterangan;
    }

    public function insertProgramKerja()
    {
        $stmt = $this->mysqli->prepare("INSERT INTO program_kerja (nama, surat_keterangan) VALUES (?, ?)");
        $stmt->bind_param("ss", $this->nama, $this->surat_keterangan);
        $stmt->execute();
    }

    public function fetchAllProgramKerja()
    {
        $result = $this->mysqli->query("SELECT * FROM program_kerja");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOneProgramKerja($nomor)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomor);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateProgramKerja()
    {
        $stmt = $this->mysqli->prepare("UPDATE program_kerja SET nama = ?, surat_keterangan = ? WHERE nomor = ?");
        $stmt->bind_param("ssi", $this->nama, $this->surat_keterangan, $this->nomor);
        $stmt->execute();
    }

    public function deleteProgramKerja()
    {
        $stmt = $this->mysqli->prepare("DELETE FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $this->nomor);
        $stmt->execute();
    }
}
?>
