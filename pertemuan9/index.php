<?php 
session_start();
require_once("controllers/ProgramKerjaController.php");
require_once("controllers/Authcontroller.php");

$controller = new ProgramKerjaController();
$authController = new AuthController();

$action = $_GET['action'] ?? 'viewListProker';

switch ($action) {
    case 'viewRegister' :
        $authController->viewRegister();
        break;
    case 'registerUser' :
        if (isset($_POST['username'], $_POST['password'], $_POST['confirm_password'])) {
            $authController->register($_POST['username'],$_POST['password'],$_POST['confirm_password']);
        }
        break;
    case 'viewLogin' :
        $authController->viewLogin();
        break;
    case 'loginUser' :
        if (isset($_POST['username'], $_POST['password'])) {
            $authController->login($_POST['username'],$_POST['password']);
        }
        break;
    case 'logoutUser' :
        $authController->logout();
        break;
    case 'viewAddProker' :
        $controller->viewAddProker();
        break;
    case 'viewEditProker':
        if (isset($_GET['nomorProgram'])) {
            $nomorProgram = $_GET['nomorProgram'];
            $controller->viewEditProker($nomorProgram);
        }
        break;
    case 'viewListProker':
        if (isset($_SESSION['username'])) {
            $controller->viewListProker();
        } else {
            header("Location: index.php?action=viewLogin");
            exit();
        }
        break;
    case 'addProker':
        if (isset($_POST['nomorProgram'], $_POST['nama'], $_POST['suratKeterangan'])) {
            $controller->addProker($_POST['nomorProgram'], $_POST['nama'], $_POST['suratKeterangan']);
        }
        break;
    case 'updateProker':
        if (isset($_GET['nomorProgram'], $_POST['nama'], $_POST['suratKeterangan'])) {
            $controller->updateProker($_GET['nomorProgram'], $_POST['nama'], $_POST['suratKeterangan']);
        }
        break;
    case 'deleteProker':
        if (isset($_GET['nomorProgram'])) {
            $controller->deleteProker($_GET['nomorProgram']);
        }
        break;
    default:
        echo "Action tidak ditemukan";
        break;   
}
?>