<?php

include_once("../model/ProgramKerja.php");
include_once("../config/auth.php");

class ProgramKerjaController 
{
    public $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramKerja();
        checkLogin();
    }

    public function viewAddProker()
    {
        include("add_proker.php");
    }

    public function viewEditProker()
    {
        if (isset($_GET['nomor'])) {
            $nomor = $_GET['nomor'];
            $proker = $this->programModel->fetchOneProgramKerja($nomor);
            if ($proker) {
                include("views/edit_proker.php");
            }else {
                echo "Program kerja vailed";
            }
        }else {
            header("Location: list_proker.php");
        }
    }

    public function viewListProker()
    {
        $listProker = $this->programModel->fetchAllProgramKerja();
        include("list_proker.php");
    }

    public function addProker()
    {
        checkLogin();
        // implementasi logic nambah proker dengan pemanggila model juga
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nomor = $_POST['nomor'];
            $nama = $_POST['nama'];
            $suratKeterangan = $_POST['surat_keterangan'];

            if ($this->programModel->insertProgramKerja($nomor, $nama, $surat_keterangan)){
                header("Location: views/list_proker.php");
            }else {
                echo "Gagal tambah perogram kerja";
            }
        }else {
            include("views/add_proker.php");
        }
    }

    public function updateProker()
    {
        checkLogin();
        // implementasi logic update proker dengan pemanggila model juga
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nomor'])) {
            $nomor = $_POST['nomor'];
            $nama = $_POST['nama'];
            $suratKeterangan = $_POST['surat_keterangan'];

            if ($this->programModel->updateProgramKerja($nomor, $nama, $suratKeterangan)) {
                header("Location: views/list_proker.php");
            }else {
                echo "Gagal memperbarui program kerja";
            }
        }
    }

    public function deleteProker()
    {
        checkLogin();
        // implementasi logic hapus proker dengan pemanggila model juga
        if (isset($_GET['nomor'])) {
            $nomor= $_GET['nomor'];
            if ($this->programModel->deleteProgramKerja($nomor)) {
                header ("Location: views/list_proker.php");
            }else {
                echo "Gagal menghapus program kerja";
            }
        }
    }
}

if (isset($_GET['action'])) {
    $controller = new ProgramKerjaController();
    switch ($_GET['action']) {
        case 'addproker': $controller->addProker();
        break;
        case 'updateProker': $controller->updateProker();
        break;
        case 'deleteProker': $controller->deleteProker();
        break;
        case 'viewAddProker': $controller->viewAddProker();
        break;
        case 'viewEditProker': $controller->viewEditProker();
        break;
        default: $controller->viewListProker();
    }
}