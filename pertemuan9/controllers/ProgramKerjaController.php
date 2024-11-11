<?php

include_once("model/ProgramKerja.php");
include_once("controllers/auth_middleware.php");

class ProgramKerjaController 
{
    private $programModel;

    public function __construct()
    {
        checkLogin();
        $this->programModel = new ProgramKerja();
    }

    public function viewAddProker()
    {
        include("views/add_proker.php");
    }

    public function viewEditProker($nomorProgram)
    {
        $programData = $this->programModel->fetchOneProgramKerja($nomorProgram);
        include("views/edit_proker.php");
    }

    public function viewListProker()
    {
        checkLogin();
        $programKerjaList = $this->programModel->fetchAllProgramKerja();
        include("views/list_proker.php");
    }

    public function addProker($nomorProgram,$nama,$suratKeterangan)
    {
        $this->programModel = new ProgramKerja($nomorProgram,$nama,$suratKeterangan);
        $this->programModel->insertProgramKerja();
        header("Location: index.php?action = viewListProker");
        // implementasi logic nambah proker dengan pemanggila model juga
    }

    public function updateProker($nomorProgram, $nama, $suratKeterangan)
    {
        $this->programModel = new ProgramKerja($nomorProgram, $nama, $suratKeterangan);
        $this->programModel->updateProgramKerja();
        header("Location: index.php?action=viewListProker");
        // implementasi logic update proker dengan pemanggila model juga
    }

    public function deleteProker($nomorProgram)
    {
        $this->programModel->deleteProgramKerja($nomorProgram);
        header("Location: index.php?action=viewListProker");
        // implementasi logic hapus proker dengan pemanggila model juga
    }
}