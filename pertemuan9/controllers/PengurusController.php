<?php
session_start();


require_once __DIR__ . '/../model/UserModel.php';

class PengurusController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Menampilkan form registrasi
    public function viewRegister() {
        include 'views/register_view.php';
    }

    // Menyimpan akun pengurus baru ke database dan mengarahkan ke halaman login
    public function registerAccount() {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // Melakukan registrasi
            if ($this->userModel->registerUser($username, $password)) {
                // Jika registrasi berhasil, arahkan ke halaman login
                header("Location: login.php");
                exit;
            } else {
                echo "Registration failed!";
            }
        } else {
            echo "Please fill all fields!";
        }
    }

    // Menampilkan form login
    public function viewLogin() {
        include 'views/login_view.php';
    }

    // Memverifikasi login dan mengatur session
    public function loginAccount() {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel->loginUser($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                header("Location: list_proker.php");
                exit;
            } else {
                echo "Login failed. Invalid credentials.";
            }
        } else {
            echo "Please fill all fields!";
        }
    }

    // Mengakhiri session pengguna (logout)
    public function logout() {
        session_destroy();
        header("Location: login_view.php");
        exit;
    }
}

