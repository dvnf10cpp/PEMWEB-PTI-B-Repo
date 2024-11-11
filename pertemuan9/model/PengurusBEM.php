<?php

require("config/koneksi_mysql.php");

class PengurusBEM 
{
    private string $nama;
    private string $nim;
    private int $angkatan;
    private string $jabatan;
    private string $foto;
    private string $password;

    public function __construct($nama="", $nim="", $angkatan=0, $jabatan="", $foto="", $password=""){
        $this->nama = $nama;
        $this->nim = $nim;
        $this->angkatan = $angkatan;
        $this->jabatan = $jabatan;
        $this->foto = $foto;
        $this->password = $password;
    }

    public function fetchAllPengurusBEM()
    {
        global $mysqli;
        $query = "SELECT * FROM pengurus_bem";
        $result = $mysqli->query ($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOnePengurusBEM(string $nim)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM pengurus_bem WHERE nim = ? ");
        $stmt -> bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function insertPengurusBEM() 
    {
        global $mysqli;
        $stmt = $mysqli->prepare("INSERT INTO pengurus_bem (nama, nim, angkatan, jabatan, foto, password)VALUES(?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("ssisss", $this->nama, $this->nim, $this->angkatan, $this->jabatan, $this->foto, $this->password);
        $result = $stmt->execute();
        $stmt->close();
       return $result;
    }

    public function updatePengurusBEM()
    {
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE pengurus_bem SET nama = ?, angkatan = ?, jabatan = ?, foto = ?, password = ? WHERE nim = ?");
        $stmt -> bind_param("sissss", $this->nama, $this->angkatan, $this->jabatan, $this->foto, $this->password, $this->nim);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function deletePengurusBEM()
    {
        global $mysqli;
        $stmt = $mysqli->prepare("DELETE FROM pengurus_bem WHERE nim = ?");
        $stmt -> bind_param("s", $this->nim);
        $result = $stmt->execute();
        $stmt->close();
        return $result;  
    }
}