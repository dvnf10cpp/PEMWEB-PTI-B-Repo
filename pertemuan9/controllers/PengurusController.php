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

    public function registerAccount() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $angkatan = $_POST['angkatan'];
            $jabatan = $_POST['jabatan'];
            $password = $_POST['password'];
            
            // Handle file upload
            $foto = "";
            if (isset($_FILES['foto'])) {
                $target_dir = "uploads/";
                $foto = $target_dir . basename($_FILES["foto"]["name"]);
                move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
            }

            $this->pengurusModel->createModel($nama, $nim, $angkatan, $jabatan, $foto, $password);
            $result = $this->pengurusModel->insertPengurusBEM();

            if ($result) {
                header("Location: login.php");
            } else {
                header("Location: register.php?error=1");
            }
        }
    }

    public function viewLogin()
    {
        include("views/login_proker.php");
    }

    public function loginAccount() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nim = $_POST['nim'];
            $password = $_POST['password'];

            $user = $this->pengurusModel->verifyLogin($nim, $password);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: list_proker.php");
            } else {
                header("Location: login.php?error=1");
            }
        }
    }
}