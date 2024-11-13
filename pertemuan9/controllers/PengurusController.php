<?php

include_once("model/PengurusBEM.php");

class PengurusController 
{
    private $pengurusModel;

    public function __construct()
    {
        $this->pengurusModel = new PengurusBEM();
    }

    public function viewRegister()
    {
        include("views/register_view.php");
    }

    public function registerAccount()
    {
        $nama = $_POST['nama'] ?? '';
        $nim = $_POST['nim'] ?? '';
        $angkatan = $_POST['angkatan'] ?? 0;
        $jabatan = $_POST['jabatan'] ?? '';
        $foto = $_POST['foto'] ?? ''; // Jika tidak ada input foto, gunakan string kosong
        $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);
    
        $this->pengurusModel->createModel($nama, $nim, $angkatan, $jabatan, $foto, $password);
        if ($this->pengurusModel->insertPengurusBEM()) {
            // Redirect ke halaman login setelah registrasi berhasil
            header("Location: views/login_view.php");
            exit();            
        } else {
            echo "Registrasi gagal!";
        }
    }       

    public function viewLogin()
    {
        include("views/login_view.php");
    }

    public function loginAccount()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nim = $_POST['nim'];
            $password = $_POST['password'];
    
            // Ambil data pengguna
            $pengurus = $this->pengurusModel->fetchOnePengurusBEM($nim);
    
            // Verifikasi password
            if ($pengurus && password_verify($password, $pengurus['password'])) {
                session_start();
                $_SESSION['nim'] = $pengurus['nim'];
                $_SESSION['nama'] = $pengurus['nama'];
    
                // Redirect ke halaman list proker
                header("Location: list_proker.php");
                exit(); // Pastikan proses berhenti setelah pengalihan
            } else {
                echo "NIM atau Password salah";
            }
        }
    }           
}