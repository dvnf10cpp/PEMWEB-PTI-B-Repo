<?php

include_once("model/ProgramKerja.php");

class ProgramKerjaController 
{
    private $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramKerja();
    }

    public function viewListProker()
    {
        session_start();
        if (!isset($_SESSION['nim'])) {
            header("Location: views/login_view.php");
            exit();
        }
    
        // Ambil semua program kerja dari model
        $programKerjaList = $this->programModel->fetchAllProgramKerja();
    
        // Pastikan data ada
        if ($programKerjaList) {
            include("views/list_proker.php");
        } else {
            echo "Tidak ada program kerja.";
        }
    }          
    
    public function viewAddProker()
    {
        session_start();
        if (!isset($_SESSION['nim'])) {
            header("Location: views/login_view.php");
            exit();
        }
        include("views/add_proker.php");
    }
    
    public function viewEditProker()
    {
        session_start();
        if (!isset($_SESSION['nim'])) {
            header("Location: views/login_view.php");
            exit();
        }
    
        // Ambil nomor proker dari URL
        $nomorProgram = $_GET['nomor'];
    
        // Ambil data proker berdasarkan nomor
        $proker = $this->programModel->fetchOneProgramKerja($nomorProgram);
    
        // Pastikan data ditemukan sebelum melanjutkan
        if ($proker) {
            include("views/edit_proker.php");
        } else {
            echo "Program Kerja tidak ditemukan.";
        }
    }              

    public function addProker()
    {
        session_start();
        if (!isset($_SESSION['nim'])) {
            header("Location: views/login_view.php");
            exit();
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $surat_keterangan = $_POST['surat_keterangan'];
    
            $this->programModel->createModel(null, $nama, $surat_keterangan);
            $this->programModel->insertProgramKerja();
            
            header("Location: views/list_proker.php");
            exit();
        }
        include("views/add_proker.php");
    }         

    public function updateProker()
    {
        session_start();
        if (!isset($_SESSION['nim'])) {
            header("Location: views/login_view.php");
            exit();
        }
    
        $nomor = $_POST['nomor'] ?? '';
        $nama = $_POST['nama'] ?? '';
        $suratKeterangan = $_POST['surat_keterangan'] ?? '';
    
        $this->programModel->createModel($nomor, $nama, $suratKeterangan);
        if ($this->programModel->updateProgramKerja()) {
            header("Location: views/list_proker.php");
            exit();
        } else {
            echo "Gagal memperbarui program kerja.";
        }
    }       

    public function deleteProker($nomor)
    {
        session_start();
        if (!isset($_SESSION['nim'])) {
            header("Location: views/login_view.php");
            exit();
        }
    
        if ($this->programModel->deleteProgramKerja($nomor)) {
            header("Location: views/list_proker.php");
            exit();
        } else {
            echo "Gagal menghapus program kerja.";
        }
    }     
}