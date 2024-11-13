<?php

require("config/koneksi_mysql.php");

class ProgramKerja 
{
    private $mysqli;
    private int $nomorProgram;
    private string $nama;
    private string $suratKeterangan;

    public function __construct()
    {
        global $mysqli;
        $this->mysqli = $mysqli;
    }

    public function createModel(
        $nomorProgram = 0,
        $nama = "",
        $suratKeterangan = ""
    ) {
        $this->nomorProgram = $nomorProgram;
        $this->nama = $nama;
        $this->suratKeterangan = $suratKeterangan;
    }

    public function fetchAllProgramKerja()
    {
        global $mysqli;
        $query = "SELECT * FROM program_kerja";
        $result = $mysqli->query($query);
    
        $programKerjaList = [];
        while ($row = $result->fetch_assoc()) {
            $programKerjaList[] = $row;
        }
        return $programKerjaList;
    }    

    public function fetchOneProgramKerja(int $nomorProgram)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomorProgram);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insertProgramKerja() 
    {
        $stmt = $this->mysqli->prepare("INSERT INTO program_kerja (nomor, nama, surat_keterangan) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $this->nomorProgram, $this->nama, $this->suratKeterangan);
        return $stmt->execute();
    }

    public function updateProgramKerja()
    {
        $stmt = $this->mysqli->prepare("UPDATE program_kerja SET nama = ?, surat_keterangan = ? WHERE nomor = ?");
        $stmt->bind_param("ssi", $this->nama, $this->suratKeterangan, $this->nomorProgram);
        return $stmt->execute();
    }

    public function deleteProgramKerja(int $nomorProgram)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomorProgram);
        return $stmt->execute();
    }
}
