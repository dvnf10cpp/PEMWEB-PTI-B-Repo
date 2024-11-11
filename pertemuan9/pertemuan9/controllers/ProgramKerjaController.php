<?php

include_once("../model/ProgramKerja.php");

class ProgramKerjaController
{
    private $programModel;
    private $model;
    public function __construct()
    {
        $this->programModel = new ProgramKerja();
        $this->model = new ProgramKerja();
    }

    public function getProgramKerja()
    {
        return $this->programModel->fetchAllProgramKerja();
    }

    public function listProgramKerja()
    {
        $programKerja = $this->getProgramKerja(); 
        require_once('views/list_proker.php');
    }

    public function viewAddProker()
    {
        include("views/add_proker.php");
    }

    public function viewEditProker($nomor) 
    {
        $programKerja = $this->programModel->getProgramKerjaById($nomor);
        include("views/edit_proker.php");
    }

    public function addProker()
    {
        $nama = $_POST['nama'];
        $suratKeterangan = $_POST['surat_keterangan'];
        $this->programModel->createModel('', $nama, $suratKeterangan);
        $this->programModel->insertProgramKerja();
        header("Location: list_proker.php");
    }

    public function updateProker()
    {
        $nomor = $_POST['nomor'];
        $nama = $_POST['nama'];
        $suratKeterangan = $_POST['surat_keterangan'];
        $this->programModel->createModel($nomor, $nama, $suratKeterangan);
        $this->programModel->updateProgramKerja();
        header("Location: list_proker.php");
    }

    public function getProgramModel() {
        return $this->programModel;
    }
    public function deleteProker($nomor) {
        $this->model->deleteProgramKerja($nomor);
        if ($this->model->deleteProgramKerja($nomor)) {
            header("Location: list_proker.php?message=success");
        } else {
            header("Location: list_proker.php?message=error");
        }
    }
}