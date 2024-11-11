<?php

require("../config/koneksi_mysql.php");

class ProgramKerja 
{
    private int $nomor;
    private $db;
    private string $nama;
    private string $suratKeterangan;

    public function __construct() {
        global $mysqli;
        $this->db = $mysqli;
    }

    public function createModel(
        $nomor = "",
        $nama = "",
        $suratKeterangan = ""
    )
    {
        $this->nomor = $nomor;
        $this->nama = $nama;
        $this->suratKeterangan = $suratKeterangan;
    }

    public function fetchAllProgramKerja()
    {
        // implementasi fetch all rows with select
        global $mysqli;
        $stmt = $this->db->query("SELECT * FROM program_kerja");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOneProgramKerja(int $nomor)
    {
        // implementasi fetch one row by nomor proker with select
        global $mysqli;
        $stmt = $this->db->prepare("SELECT * FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomor);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function insertProgramKerja($nomor, $nama, $surat_keterangan)
    {
        // implementasi sql insert
        $stmt = $this->db->prepare ("INSERT INTO program_kerja (nomor, nama, surat_keterangan) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $this->nomor, $this->nama, $this->suratKeterangan);
        if ($stmt->execute()) {
            return true;
        }else {
            return false;
        };
    }

    public function updateProgramKerja($nomor, $nama, $surat_keterangan)
    {
        // implementasi sql update
        $stmt = $this->db->prepare("UPDATE program_kerja SET nama = ?, surat_keterangan = ? WHERE nomor = ?");
        $stmt->bind_param("ssi", $this->nama, $this->suratKeterangan, $this->nomor);
        return $stmt->execute();
    }

    public function deleteProgramKerja($nomor)
    {
        // implementasi sql delete 
        $stmt = $this->db->prepare("DELETE FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomor);
        return $stmt->execute();  
    }
}