<?php
session_start();
require_once 'UserModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register($username, $password) {
        if ($this->userModel->registerUser($username, $password)) {
            header("Location: login_view.php");
            exit;
        } else {
            echo "Registration failed!";
        }
    }

    public function login($username, $password) {
        $user = $this->userModel->loginUser($username, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: list_proker.php");
            exit;
        } else {
            echo "Login failed. Invalid credentials.";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: login_view.php");
        exit;
    }
}

if ($_GET['action'] == 'register') {
    $authController = new AuthController();
    $authController->register($_POST['username'], $_POST['password']);
} elseif ($_GET['action'] == 'login') {
    $authController = new AuthController();
    $authController->login($_POST['username'], $_POST['password']);
} elseif ($_GET['action'] == 'logout') {
    $authController = new AuthController();
    $authController->logout();
}
?>
