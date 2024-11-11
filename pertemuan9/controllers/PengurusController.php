<?php

use Illuminate\Routing\Controller;

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
        if (isset($_POST['nama'], $_POST['nim'], $_POST['angkatan'], $_POST['jabatan'], $_POST['foto'], $_POST['password'])) {
            $this->pengurusModel->createModel(
                $_POST['nama'],
                $_POST['nim'],
                $_POST['angkatan'],
                $_POST['foto'],
                $_POST['jabatan'],
                password_hash($_POST['password'], PASSWORD_DEFAULT) 
            );
            $this->pengurusModel->insertPengurusBEM();
            header("Location: views/login_view.php");
        }
    }

    public function viewLogin()
    {
        include("views/login_view.php");
    }

    public function loginAccount()
    {
        if (isset($_POST['nim'], $_POST['password'])) {
            $pengurus = $this->pengurusModel->fetchPengurusByNIM($_POST['nim']);
            if ($pengurus && password_verify($_POST['password'], $pengurus['password'])) {
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $pengurus['id'];
                header("Location: views/list_proker.php");
            } else {
                echo "NIM atau password salah.";
            }
        }
    }
}
