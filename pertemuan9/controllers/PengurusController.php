<?php 

include_once("model/PengurusBEM.php");
include_once("config/auth.php");

class PengurusController 
{
    public $pengurusModel;

    public function __construct() {
        $this->pengurusModel = new PengurusBEM();
    }

    public function viewRegister()
    {
        session_start();
        include("views/login_view.php");
    }

    public function registerAccount()
    {
        // implementasi register akun dengan memanggil model juga
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $angkatan = $_POST['angkatan'];
            $jabatan = $_POST['jabatan'];
            $foto = $_POST['foto'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $this->pengurusModel->createModel($nama, $nim, $angkatan, $jabatan, $foto, $password);
            $this->pengurusModel->insertPengurusBEM();

            header("Location: views/login_view.php");
        }
    }

    public function viewLogin()
    {
        session_start();
        include("login_view.php");
    }

    public function loginAccount()
    {
        session_start();
        // implementasi logic login akun dengan memanggil model juga
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nim = $_POST['nim'];
            $password = $_POST['password'];
            $pengurus = $this->pengurusModel->fetchOnePengurusBEM($nim);

            if ($pengurus && password_verify($password, $pengurus['password'])) {
                $_SESSION['logged_in'] = true;
                header("Location: views/list_proker.php");
                exit();
            }else {
                echo "NIM atau password salah";
            }
        }
    }
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: views/login_view.php");
        exit();
    }
}

