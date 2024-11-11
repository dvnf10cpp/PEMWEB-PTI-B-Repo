<?php
session_start();
include_once '../controllers/ProgramKerjaController.php';

$controller = new ProgramKerjaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomor = $_POST['nomor'];
    $controller->deleteProker($nomor);
    header("Location: list_proker.php");
    exit();
}
?>