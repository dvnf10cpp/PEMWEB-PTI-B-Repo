<?php
require_once("models/ProgramKerja.php");

class ProgramKerjaController
{
    private $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramKerja();
    }

    public function addProker()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $surat_keterangan = $_FILES['surat_keterangan']['name'];

            move_uploaded_file($_FILES['surat_keterangan']['tmp_name'], "uploads/" . $surat_keterangan);

            $this->programModel->createModel(null, $nama, $surat_keterangan);
            $this->programModel->insertProgramKerja();

            header("Location: list_proker.php");
        }
    }

    public function updateProker()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomor = $_POST['nomor'];
            $nama = $_POST['nama'];
            $surat_keterangan = $_FILES['surat_keterangan']['name'];

            if (!empty($surat_keterangan)) {
                move_uploaded_file($_FILES['surat_keterangan']['tmp_name'], "uploads/" . $surat_keterangan);
            }

            $this->programModel->createModel($nomor, $nama, $surat_keterangan);
            $this->programModel->updateProgramKerja();

            header("Location: list_proker.php");
        }
    }

    public function deleteProker()
    {
        if (isset($_GET['nomor'])) {
            $nomor = $_GET['nomor'];
            $this->programModel->createModel($nomor, null, null);
            $this->programModel->deleteProgramKerja();

            header("Location: list_proker.php");
        }
    }
}
?>
