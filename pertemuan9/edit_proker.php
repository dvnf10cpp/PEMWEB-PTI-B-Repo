<?php

include_once("controllers/ProgramKerjaController.php");

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$controller = new ProgramKerjaController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $controller->viewEditProker();
} else {
    $controller->updateProker();
}