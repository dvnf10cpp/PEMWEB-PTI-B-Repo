<?php
require("config/koneksi_mysql.php");

class User {
    private $username;
    private $passwordHash;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->passwordHash = password_hash ($password, PASSWORD_DEFAULT);
    }

    public function save() {
        global $mysqli;
        $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $this->username, $this->passwordHash);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public static function findByUsername($username) {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? ");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
        // if ($row = $result->fetch_assoc()) {
        //     return new User($row['username'], $row['passwordHash']);
        // }
        // return null;
    }
    public function getUsername() {
        return $this->username;
    }
    public function getPasswordHash() {
        return $this->passwordHash;
    }
    public static function verifyPassword($inputPassword, $storedHash) {
        return password_verify($inputPassword,$storedHash);
    }
}