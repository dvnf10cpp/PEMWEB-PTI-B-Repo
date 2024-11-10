<?php

require("config/koneksi_mysql.php");

class ProgramKerja 
{
    private int $nomorProgram;
    private string $nama;
    private string $suratKeterangan;
    private $db;

    public function __construct()
    {
        global $mysqli;
        $this->db = $mysqli;
    }

    public function createModel($nomorProgram = "", $nama = "", $suratKeterangan = "")
    {
        $this->nomorProgram = $nomorProgram;
        $this->nama = $nama;
        $this->suratKeterangan = $suratKeterangan;
    }

    public function fetchAllProgramKerja()
    {
        $query = "SELECT * FROM program_kerja";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOneProgramKerja(int $nomorProgram)
    {
        $query = "SELECT * FROM program_kerja WHERE nomor_program = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $nomorProgram);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insertProgramKerja() 
    {
        $query = "INSERT INTO program_kerja (nomor_program, nama, surat_keterangan) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iss", $this->nomorProgram, $this->nama, $this->suratKeterangan);
        return $stmt->execute();
    }

    public function updateProgramKerja()
    {
        $query = "UPDATE program_kerja SET nama = ?, surat_keterangan = ? WHERE nomor_program = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssi", $this->nama, $this->suratKeterangan, $this->nomorProgram);
        return $stmt->execute();
    }

    public function deleteProgramKerja($nomorProgram)
    {
        $query = "DELETE FROM program_kerja WHERE nomor_program = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $nomorProgram);
        return $stmt->execute();
    }
}
