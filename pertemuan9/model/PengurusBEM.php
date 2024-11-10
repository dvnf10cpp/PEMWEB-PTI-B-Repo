<?php
// model/PengurusBEM.php

require_once("config/koneksi_mysql.php");

class PengurusBEM 
{
    private string $nama;
    private string $nim;
    private int $angkatan;
    private string $jabatan;
    private string $foto;
    private string $password;

    public function createModel(
        $nama = "",
        $nim = "",
        $angkatan = "",
        $jabatan = "",
        $foto = "",
        $password = ""
    )
    {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->angkatan = $angkatan;
        $this->jabatan = $jabatan;
        $this->foto = $foto;
        $this->password = $password;
    }

    public function insertPengurusBEM() 
    {
        global $mysqli;
        
        try {
            $query = "INSERT INTO pengurus_bem (nama, nim, angkatan, jabatan, foto, password) 
                     VALUES (?, ?, ?, ?, ?, ?)";
            
            // Menggunakan prepared statement untuk keamanan
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ssssss", 
                $this->nama, 
                $this->nim, 
                $this->angkatan, 
                $this->jabatan, 
                $this->foto, 
                $this->password
            );
            
            $result = $stmt->execute();
            $stmt->close();
            
            return $result;
        } catch (Exception $e) {
            // Log error jika diperlukan
            error_log("Error inserting pengurus: " . $e->getMessage());
            return false;
        }
    }

    public function fetchAllPengurusBEM()
    {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM pengurus_bem");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOnePengurusBEM(string $nim)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM pengurus_bem WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function verifyLogin($nim, $password)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM pengurus_bem WHERE nim = ? AND password = ?");
        $stmt->bind_param("ss", $nim, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}