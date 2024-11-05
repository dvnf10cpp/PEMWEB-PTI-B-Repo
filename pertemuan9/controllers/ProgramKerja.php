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
        // var_dump($programList);
        include("../views/list_proker.php");
    }

    public function addProker()
    {
        $nomor = $_POST['nomor'];
        $nama = $_POST['nama'];
        $suratKeterangan = $_POST['surat_keterangan'];

        $this->programModel->createModel($nomor, $nama, $suratKeterangan);

        if ($this->programModel->insertProgramKerja()) {
            header("Location: list_proker.php");
            exit();
        } else {
            echo "Gagal menambahkan program kerja!";
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
        } else {
            echo "Gagal memperbarui program kerja!";
        }
    }

    public function deleteProker()
    {
        $nomor = $_POST['nomor'];

        if ($this->programModel->deleteProgramKerja($nomor)) {
            return true;
        } else {
            echo "Gagal menghapus program kerja!";
            return false;
        }
    }
}
