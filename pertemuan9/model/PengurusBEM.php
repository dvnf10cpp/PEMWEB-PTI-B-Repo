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
    private $db;

    public function __construct()
    {
        global $mysqli; 
        $this->db = $mysqli; 
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
        $this->password = password_hash($password, PASSWORD_BCRYPT); // Hash password untuk keamanan
    }

    public function fetchAllPengurusBEM()
    {
        // Mengambil semua data pengurus BEM
        $query = "SELECT * FROM pengurus_bem";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOnePengurusBEM(string $nim)
    {
        // Mengambil data pengurus BEM berdasarkan NIM
        $query = "SELECT * FROM pengurus_bem WHERE nim = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insertPengurusBEM() 
    {
        $query = "INSERT INTO pengurus_bem (nama, nim, angkatan, jabatan, foto, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssisss", $this->nama, $this->nim, $this->angkatan, $this->jabatan, $this->foto, $this->password);
        return $stmt->execute();
    }

    public function updatePengurusBEM($nim)
    {
        // Mengupdate data pengurus BEM berdasarkan NIM
        $query = "UPDATE pengurus_bem SET nama = ?, angkatan = ?, jabatan = ?, foto = ?, password = ? WHERE nim = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sissss", $this->nama, $this->angkatan, $this->jabatan, $this->foto, $this->password, $nim);
        return $stmt->execute();
    }

    public function deletePengurusBEM($nim)
    {
        // Menghapus data pengurus BEM berdasarkan NIM
        $query = "DELETE FROM pengurus_bem WHERE nim = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $nim);
        return $stmt->execute();
    }

    // Implementasi metode addUser untuk registrasi akun
    public function addUser($username, $password, $email)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $username, $hashedPassword, $email);
        return $stmt->execute();
    }

    // Implementasi metode verifyUser untuk login
    public function verifyUser($username, $password)
    {
        $query = "SELECT password FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        return password_verify($password, $hashedPassword);
    }
}
