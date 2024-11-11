<?php

require("config/koneksi_mysql.php");

class ProgramKerja 
{
    private int $nomorProgram;
    private string $nama;
    private string $suratKeterangan;

    public function __construct($nomorProgram = 0, $nama = "", $suratKeterangan = "") {
        $this->nomorProgram = $nomorProgram;
        $this->nama = $nama;
        $this->suratKeterangan = $suratKeterangan;
    }

    // public function createModel(
    //     $nomorProgram = "",
    //     $nama = "",
    //     $suratKeterangan = "",
    // )
    // {
    //     $this->nomorProgram = $nomorProgram;
    //     $this->nama = $nama;
    //     $this->suratKeterangan = $suratKeterangan;
    // }

    public static function fetchAllProgramKerja()
    {
        global $mysqli;
        $query = "SELECT * FROM program_kerja";
        $result = $mysqli->query($query);

        $programKerjaList =[];
        while ($row = $result->fetch_assoc()) {
            $programKerjaList[] = $row;
        }

        return $programKerjaList;
    }

    public static function fetchOneProgramKerja(int $nomorProgram)
    {
        global $mysqli;
        $stmt = $mysqli->prepare( "SELECT * FROM program_kerja WHERE nomorProgram = ?");
        $stmt->bind_param("i", $nomorProgram);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function insertProgramKerja() 
    {
        global $mysqli;
        $stmt = $mysqli->prepare("INSERT INTO program_kerja(nomorPengguna, nama, suratKeterangan) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $this->nomorProgram, $this->nama, $this->suratKeterangan);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function updateProgramKerja()
    {
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE program_kerja SET nama = ?, suratKeterangan = ? WHERE nomorProgram = ? ");
        $stmt->bind_param("ssi", $this->nama, $this->suratKeterangan, $this->nomorProgram);
        $result = $stmt->execute();
        $stmt->close();
        return $result; 
    }

    public static function deleteProgramKerja(int $nomorProgram)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("DELETE FROM program_kerja WHERE nomorProgram = ? ");
        $stmt->bind_param("i", $nomorProgram);
        $result = $stmt->execute();
        $stmt->close();
        return $result; 
    }
}