<?php 

include_once("controllers/PengurusController.php");

$controller = new PengurusController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $controller->viewRegister();
} else {
    if (isset($_POST['username'], $_POST['password'], $_POST['confirm_password'])) {
        $controller->registerAccount($_POST['username'], $_POST['password'], $_POST['confirm_password']);
    }
}

