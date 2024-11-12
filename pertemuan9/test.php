<?php
echo "<h2>Testing Path & Include</h2>";

$controllerPath = __DIR__ . '/controllers/PengurusController.php';
$modelPath = __DIR__ . '/model/PengurusBEM.php';
$viewPath = __DIR__ . '/views/login_view.php';

echo 'Controller Path: ' . $controllerPath . '<br>';
echo 'Model Path: ' . $modelPath . '<br>';
echo 'View Path: ' . $viewPath . '<br>';

echo file_exists($controllerPath) ? "PengurusController.php DITEMUKAN<br>" : "PengurusController.php TIDAK DITEMUKAN<br>";
echo file_exists($modelPath) ? "PengurusBEM.php DITEMUKAN<br>" : "PengurusBEM.php TIDAK DITEMUKAN<br>";
echo file_exists($viewPath) ? "login_view.php DITEMUKAN<br>" : "login_view.php TIDAK DITEMUKAN<br>";
