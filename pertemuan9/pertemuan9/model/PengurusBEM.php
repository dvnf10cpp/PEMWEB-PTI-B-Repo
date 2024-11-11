<?php

require("config/koneksi_mysql.php");

class PengurusBEM 
{
    private $pengurusModel;
    private string $nama;
    private string $nim;
    private int $angkatan;
    private string $jabatan;
    private string $foto;
    private string $password;
    private $conn;

    public function __construct() {
        global $mysqli;
        $this->conn = $mysqli;
    }

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

    public function fetchAllPengurusBEM()
    {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM pengurusbem");
        
        $pengurus = [];
        while ($row = $result->fetch_assoc()) {
            $pengurus[] = $row;
        }
        
        return $pengurus;
    }

    public function fetchOnePengurusBEM(string $nim)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM pengurusbem WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc();
    }

    public function insertPengurusBEM() {
        global $mysqli;
        $stmt = $mysqli->prepare("INSERT INTO pengurusbem (nama, nim, angkatan, jabatan, foto, password) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $mysqli->error);
        }
        $stmt->bind_param("ssisss", $this->nama, $this->nim, $this->angkatan, $this->jabatan, $this->foto, $this->password);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }


    public function updatePengurusBEM()
    {
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE pengurusbem SET nama = ?, angkatan = ?, jabatan = ?, foto = ?, password = ? WHERE nim = ?");
        $stmt->bind_param("sissss", $this->nama, $this->angkatan, $this->jabatan, $this->foto, $this->password, $this->nim);
        
        return $stmt->execute();
    }

    public function deletePengurusBEM()
    { 
        global $mysqli;
        $stmt = $mysqli->prepare("DELETE FROM pengurusbem WHERE nim = ?");
        $stmt->bind_param("s", $this->nim);
        
        return $stmt->execute();
    }
    public function validateLogin($nim, $password) {
        $query = "SELECT * FROM pengurusbem WHERE nim = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                return true;
            } else {
                echo "Password salah";
            }
        } else {
            echo "NIM tidak ditemukan";
        }
        return false;
    }
}