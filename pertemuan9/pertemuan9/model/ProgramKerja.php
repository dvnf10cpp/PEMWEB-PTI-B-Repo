<?php

require("../config/koneksi_mysql.php");

class ProgramKerja 
{
    private string $nomorProgram;
    private string $nama;
    private string $suratKeterangan;

    public function createModel(
        $nomorProgram = "",
        $nama = "",
        $suratKeterangan = "",
    )
    {
        $this->nomorProgram = $nomorProgram;
        $this->nama = $nama;
        $this->suratKeterangan = $suratKeterangan;
    }

    public function fetchAllProgramKerja()
    {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM programkerja");

        $programs = [];
        while ($row = $result->fetch_assoc()) {
            $programs[] = $row;
        }

        return $programs;
    }

    public function fetchOneProgramKerja(int $nomorProgram)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM programkerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomorProgram);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function insertProgramKerja() 
    {
        global $mysqli;
        $stmt = $mysqli->prepare("INSERT INTO programkerja (nomor, nama, surat_keterangan) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $this->nomorProgram, $this->nama, $this->suratKeterangan);

        return $stmt->execute();
    }

    public function updateProgramKerja()
    {
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE programkerja SET nama = ?, surat_keterangan = ? WHERE nomor = ?");
        $stmt->bind_param("ssi", $this->nama, $this->suratKeterangan, $this->nomorProgram);

        return $stmt->execute();
    }

    public function deleteProgramKerja($nomor) {
        global $mysqli;
        $sql = "DELETE FROM programkerja WHERE nomor = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $nomor);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}