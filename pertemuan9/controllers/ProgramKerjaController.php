<?php

include_once("model/ProgramKerja.php");

class ProgramKerjaController
{
    private $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramKerja();
    }

    public function viewAddProker()
    {
        include("views/add_proker.php");
    }

    public function viewEditProker()
    {
        // Pastikan ada parameter id di URL
        if (isset($_GET['id'])) {
            $nomor = $_GET['id'];
            
            // Ambil data program kerja berdasarkan nomor
            $proker = $this->programModel->fetchOneProgramKerja($nomor);
            
            // Pastikan data ditemukan
            if ($proker === null) {
                header("Location: list_proker.php?error=notfound");  // Jika data tidak ditemukan, redirect ke daftar
                exit;
            }
            
            // Mengirim data ke view
            include("views/edit_proker.php");
        } else {
            header("Location: list_proker.php?error=invalidid");
            exit;
        }
    }

    public function viewListProker()
    {
        // Mengambil daftar program kerja dari model
        $programKerjaList = $this->programModel->fetchAllProgramKerja();
        
        // Pastikan data sudah ada
        if ($programKerjaList === null) {
            $programKerjaList = [];  // Inisialisasi sebagai array kosong jika data null
        }

        // Mengirim data ke view
        include("views/list_proker.php");
    }

    public function addProker()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nomor = $_POST['nomor'];
            $nama = $_POST['nama'];

            // Handle file upload untuk surat keterangan
            $suratKeterangan = "";
            if (isset($_FILES['surat_keterangan'])) {
                $target_dir = "uploads/";
                $suratKeterangan = $target_dir . basename($_FILES["surat_keterangan"]["name"]);
                move_uploaded_file($_FILES["surat_keterangan"]["tmp_name"], $suratKeterangan);
            }

            $this->programModel->createModel($nomor, $nama, $suratKeterangan);
            $result = $this->programModel->insertProgramKerja();

            if ($result) {
                header("Location: list_proker.php");
            } else {
                header("Location: add_proker.php?error=1");
            }
        }
    }

    public function updateProker()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nomor = $_POST['nomor'];
            $nama = $_POST['nama'];

            // Ambil surat keterangan saat ini atau jika ada file baru, ganti dengan file baru
            $suratKeterangan = $_POST['current_surat'];
            if (isset($_FILES['surat_keterangan']) && $_FILES['surat_keterangan']['size'] > 0) {
                $target_dir = "uploads/";
                $suratKeterangan = $target_dir . basename($_FILES["surat_keterangan"]["name"]);
                move_uploaded_file($_FILES["surat_keterangan"]["tmp_name"], $suratKeterangan);
            }

            // Update data program kerja
            $this->programModel->createModel($nomor, $nama, $suratKeterangan);
            $result = $this->programModel->updateProgramKerja();

            if ($result) {
                header("Location: list_proker.php"); // Jika berhasil update, redirect ke daftar
            } else {
                header("Location: edit_proker.php?id=" . $nomor . "&error=1"); // Jika gagal, tetap di halaman edit dengan error
            }
        }
    }

    public function deleteProker()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
            exit;
        }

        if (isset($_GET['id'])) {
            $nomor = $_GET['id'];
            $this->programModel->createModel($nomor);
            $result = $this->programModel->deleteProgramKerja();

            if ($result) {
                header("Location: list_proker.php");
            } else {
                header("Location: list_proker.php?error=1");
            }
        }
    }
}
