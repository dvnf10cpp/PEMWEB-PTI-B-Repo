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
        // implementasi register akun dengan memanggil model juga
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $angkatan = $_POST['angkatan'];
        $jabatan = $_POST['jabatan'];
        $foto = $_POST['foto'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $this->pengurusModel->createModel($nama, $nim, $angkatan, $jabatan, $foto, $password);

        $hasil = $this->pengurusModel->insertPengurusBEM();

        if ($hasil) {
            echo "Registration successful. You can now <a href='views/login_view.php'>login here</a>.";
        } else {
            echo "Registration failed. Please try again.";
        }
    }

    public function viewLogin()
    {
        include("views/login_view.php");
    }

    public function loginAccount()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nim = $_POST['nim'];
            $password = $_POST['password'];

            // Validasi login menggunakan model
            if ($this->pengurusModel->validateLogin($nim, $password)) {
                $_SESSION['logged_in'] = true;
                $_SESSION['nim'] = $nim;
                header("Location: views/list_proker.php");
                exit();
            } else {
                echo "Login gagal, periksa NIM atau password.";
            }
        } else {
            $this->viewLogin();
        }
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: views/login_view.php");
        exit();
    }
    
}