<?php

include_once 'model/User.php';

class AuthController {
    // public function register($username, $password,) {
    //     $user = new user ($username, $password);
    //     $user->save();
    //     echo "Registrasi berhasil ";
    // }
    public function register($username, $password) {
        $user = new User($username, $password);
        if ($user->save()) {
            header("Location: index.php?action=viewLogin");
        } else {
            echo "Registrasi Gagal";
        }
    }
        // if ($password !== $confirmPassword) {
        //     echo "Password tidak sesuai";
        //     return;
        // }

        // $user = new user ($username, password_hash($password, PASSWORD_DEFAULT));
        // $user->save();

        // echo "Registrasi berhasil. Silakan login.";
        // header("Location: ../index.php?action=viewLogin");
        // exit();

    public function login ($username, $password) {
        $user = User::findByUsername($username);
        if ($user && User::verifyPassword($password, $user['password'])) {
            // session_start();
            $_SESSION['username'] = $username;
            // header("Location: index.php");
            header ("Location: index.php?action=viewListProker");
            exit();
        } else {
            echo "Username atau password salah";
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: views/login_view.php");
        // header("Location: ../index.php?action=viewLogin");
        exit();
    }
}