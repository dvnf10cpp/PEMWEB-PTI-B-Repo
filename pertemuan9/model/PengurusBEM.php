<?php

require("config/koneksi_mysql.php");

class PengurusBEM 
{
    private $mysqli;
    private string $nama;
    private string $nim;
    private int $angkatan;
    private string $jabatan;
    private string $foto;
    private string $password;

    public function __construct()
    {
        global $mysqli;
        $this->mysqli = $mysqli;
    }

    public function createModel(
        $nama = "",
        $nim = "",
        $angkatan = "",
        $jabatan = "",
        $foto = "",
        $password = ""
    ) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->angkatan = $angkatan;
        $this->jabatan = $jabatan;
        $this->foto = $foto;
        $this->password = $password;
    }

    public function fetchAllPengurusBEM()
    {
        $result = $this->mysqli->query("SELECT * FROM pengurus_bem");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOnePengurusBEM(string $nim)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM pengurus_bem WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insertPengurusBEM() 
    {
        $stmt = $this->mysqli->prepare("INSERT INTO pengurus_bem (nama, nim, angkatan, jabatan, foto, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss", $this->nama, $this->nim, $this->angkatan, $this->jabatan, $this->foto, $this->password);
        return $stmt->execute();
    }

    public function updatePengurusBEM(string $nim)
    {
        $stmt = $this->mysqli->prepare("UPDATE pengurus_bem SET nama = ?, angkatan = ?, jabatan = ?, foto = ?, password = ? WHERE nim = ?");
        $stmt->bind_param("sissss", $this->nama, $this->angkatan, $this->jabatan, $this->foto, $this->password, $nim);
        return $stmt->execute();
    }

    public function deletePengurusBEM(string $nim)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM pengurus_bem WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        return $stmt->execute();
    }
}
