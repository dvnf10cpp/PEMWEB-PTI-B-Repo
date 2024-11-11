<?php 

include_once("controllers/PengurusController.php");

$controller = new PengurusController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $controller->viewRegister();
} else {
    $controller->registerAccount();
    header("Location: views/login_view.php");
    exit();
}
?>