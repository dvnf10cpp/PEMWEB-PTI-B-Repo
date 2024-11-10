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
        include("views/edit_proker.php");
    }

    public function viewListProker()
    {
        $prokers = $this->programModel->fetchAllProgramKerja();
        include("views/list_proker.php");
    }

    public function addProker()
    {
     
        $nomorProgram = $_POST['nomorProgram'];
        $nama = $_POST['nama'];
        $suratKeterangan = $_POST['suratKeterangan'];

        
        $this->programModel->createModel($nomorProgram, $nama, $suratKeterangan);
        $result = $this->programModel->insertProgramKerja();

        if ($result) {
            echo "Program kerja berhasil ditambahkan!";
            header("Location: index.php?action=viewListProker"); 
        } else {
            echo "Gagal menambahkan program kerja.";
        }
    }

    public function updateProker()
    {
        $nomorProgram = $_POST['nomorProgram'];
        $nama = $_POST['nama'];
        $suratKeterangan = $_POST['suratKeterangan'];

        $this->programModel->createModel($nomorProgram, $nama, $suratKeterangan);
        $result = $this->programModel->updateProgramKerja();

        if ($result) {
            echo "Program kerja berhasil diupdate!";
            header("Location: index.php?action=viewListProker"); 
        } else {
            echo "Gagal mengupdate program kerja.";
        }
    }

    public function deleteProker()
    {
        $nomorProgram = $_POST['nomorProgram'];
        $result = $this->programModel->deleteProgramKerja($nomorProgram);

        if ($result) {
            echo "Program kerja berhasil dihapus!";
            header("Location: index.php?action=viewListProker"); 
        } else {
            echo "Gagal menghapus program kerja.";
        }
    }
}
