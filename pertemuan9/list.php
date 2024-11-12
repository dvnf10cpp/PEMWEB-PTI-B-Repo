<?php
require_once 'controllers/PengurusController.php';

$pengurusController = new PengurusController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pengurusController->registerAccount();
} else {
    $pengurusController->viewRegister();
}