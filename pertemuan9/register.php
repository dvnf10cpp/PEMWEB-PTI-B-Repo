<?php 

include_once(__DIR__ . "/controllers/PengurusController.php");

$controller = new PengurusController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $controller->viewRegister();
} else {
    $controller->registerAccount();
}


