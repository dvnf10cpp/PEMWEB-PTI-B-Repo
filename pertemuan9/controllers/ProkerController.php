<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login_view.php");
    exit;
}


class ProkerController {
    private $prokerModel;

    public function __construct() {
        $this->prokerModel = new ProkerModel();
    }

    public function listProker() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login_view.php");
            exit;
        }
        return $this->prokerModel->getAllProkers();
    }

    public function addProker($title, $description) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login_view.php");
            exit;
        }
        $this->prokerModel->addProker($title, $description);
        header("Location: list_proker.php");
        exit;
    }

    public function editProker($id, $title, $description) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login_view.php");
            exit;
        }
        $this->prokerModel->updateProker($id, $title, $description);
        header("Location: list_proker.php");
        exit;
    }

    public function deleteProker($id) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login_view.php");
            exit;
        }
        $this->prokerModel->deleteProker($id);
        header("Location: list_proker.php");
        exit;
    }
}

if ($_GET['action'] == 'add') {
    $prokerController = new ProkerController();
    $prokerController->addProker($_POST['title'], $_POST['description']);
} elseif ($_GET['action'] == 'edit') {
    $prokerController = new ProkerController();
    $prokerController->editProker($_GET['id'], $_POST['title'], $_POST['description']);
} elseif ($_GET['action'] == 'delete') {
    $prokerController = new ProkerController();
    $prokerController->deleteProker($_GET['id']);
}
?>
