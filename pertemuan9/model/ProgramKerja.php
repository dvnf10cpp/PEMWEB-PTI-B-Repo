<?php

require("config/koneksi_mysql.php");

class ProgramKerja
{
    private int $nomorProgram;
    private string $nama;
    private string $suratKeterangan;

    public function createModel(
        $nomorProgram = "",
        $nama = "",
        $suratKeterangan = ""
    )
    {
        $this->nomorProgram = $nomorProgram;
        $this->nama = $nama;
        $this->suratKeterangan = $suratKeterangan;
    }

    public function fetchAllProgramKerja()
    {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM program_kerja ORDER BY nomor");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOneProgramKerja(int $nomorProgram)
    {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM program_kerja WHERE nomor = $nomorProgram");
        return $result->fetch_assoc();
    }

    public function insertProgramKerja()
    {
        global $mysqli;
        $query = "INSERT INTO program_kerja (nomor, nama, surat_keterangan) 
                  VALUES ($this->nomorProgram, '$this->nama', '$this->suratKeterangan')";
        return $mysqli->query($query);
    }

    public function updateProgramKerja()
    {
        global $mysqli;
        $query = "UPDATE program_kerja SET 
                  nama = '$this->nama',
                  surat_keterangan = '$this->suratKeterangan'
                  WHERE nomor = $this->nomorProgram";
        return $mysqli->query($query);
    }

    public function deleteProgramKerja()
    {
        global $mysqli;
        return $mysqli->query("DELETE FROM program_kerja WHERE nomor = $this->nomorProgram");
    }
}
