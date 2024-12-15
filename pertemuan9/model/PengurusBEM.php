<?php
require_once("config/koneksi_mysql.php");

class PengurusBEM 
{
    private $mysqli;
    private $nama;
    private $nim;
    private $angkatan;
    private $jabatan;
    private $foto;
    private $password;

    public function __construct()
    {
        global $mysqli;
        $this->mysqli = $mysqli;
    }

    public function createModel($nama, $nim, $angkatan, $jabatan, $foto, $password)
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
        $stmt = $this->mysqli->prepare("INSERT INTO pengurus_bem (nama, nim, angkatan, jabatan, foto, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $this->nama, $this->nim, $this->angkatan, $this->jabatan, $this->foto, $this->password);
        $stmt->execute();
    }

    public function fetchOnePengurusBEM($nim)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM pengurus_bem WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
