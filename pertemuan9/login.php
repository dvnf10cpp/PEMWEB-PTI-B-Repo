<?php
session_start();             

include_once("controllers/PengurusController.php");
$controller = new PengurusController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->loginAccount();
}
?>

