<?php

include_once("../model/ProgramKerja.php");

class ProgramKerjaController
{
    public $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramKerja();
    }

    public function viewAddProker()
    {
        include("../views/add_proker.php");
    }

    public function viewEditProker()
    {
        include("../views/edit_proker.php");
    }

    public function viewListProker()
    {
        $programList = $this->programModel->fetchAllProgramKerja();
        include("../views/list_proker.php");
    }

    public function addProker()
    {
        if (isset($_POST['nomor']) && isset($_POST['nama']) && isset($_POST['surat_keterangan'])) {
            $nomor = $_POST['nomor'];
            $nama = $_POST['nama'];
            $suratKeterangan = $_POST['surat_keterangan'];
    
            if (!empty($nomor)) {
                $this->programModel->createModel($nomor, $nama, $suratKeterangan);
    
                if ($this->programModel->insertProgramKerja()) {
                    header("Location: list_proker.php");
                    exit();
            }
        } else {
            echo "Semua field harus diisi!";
        }
    }
}

    public function updateProker()
    {
        $nomor = $_POST['nomor'];
        $nama = $_POST['nama'];
        $suratKeterangan = $_POST['surat_keterangan'];

        $this->programModel->createModel($nomor, $nama, $suratKeterangan);

        if ($this->programModel->updateProgramKerja()) {
            header("Location: list_proker.php");
            exit();
        } 
    }

    public function deleteProker()
    {
        if (isset($_POST['nomor'])) {
            $nomor = $_POST['nomor'];
            if ($this->programModel->deleteProgramKerja($nomor)) {
                header("Location: ../views/list_proker.php?message=Program kerja berhasil dihapus");
                exit();
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $controller = new ProgramKerjaController();
        $controller->deleteProker();
    }
}
