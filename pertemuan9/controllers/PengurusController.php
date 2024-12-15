<?php
require_once("models/PengurusBEM.php");

class PengurusController
{
    private $pengurusModel;

    public function __construct()
    {
        $this->pengurusModel = new PengurusBEM();
    }
    
    public function registerAccount()
    {
        // Ambil data dari form
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $angkatan = $_POST["angkatan"];
        $jabatan = $_POST["jabatan"];
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $foto = $_FILES["foto"]["name"];

        // Simpan file foto
        move_uploaded_file($_FILES["foto"]["tmp_name"], "uploads/" . $foto);

        // Model untuk menyimpan data
        $pengurus = new PengurusBEM();
        $pengurus->createModel($nama, $nim, $angkatan, $jabatan, $foto, $password);
        $pengurus->insertPengurusBEM();

        // Redirect setelah berhasil registrasi
        header("Location: login.php");
        exit;
    }

    public function loginAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = $_POST['nim'];
            $password = $_POST['password'];

            $pengurus = $this->pengurusModel->fetchOnePengurusBEM($nim);

            if ($pengurus && password_verify($password, $pengurus['password'])) {
                session_start();
                $_SESSION['user'] = $pengurus['nama'];
                header("Location: list_proker.php");
            } else {
                echo "Login gagal! Cek kembali NIM dan password.";
            }
        }
    }

    public function viewRegister()
    {
        // Render halaman registrasi
        include("views/register_view.php");
    }
}
?>
