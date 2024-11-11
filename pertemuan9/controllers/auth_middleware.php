<?php

// session_start();
function checkLogin() {
    if (!isset($_SESSION['username'])) {
        header("Location: views/login_view.php");
        exit();
    }
}