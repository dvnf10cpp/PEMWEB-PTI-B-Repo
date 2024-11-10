<?php
require("config/koneksi_mysql.php");

class UserModel {
    private $db;

    public function __construct() {
        global $mysqli;
        $this->db = $mysqli;
    }

    public function registerUser($username, $password) {
  
        $checkQuery = "SELECT * FROM users WHERE username = ?";
        $checkStmt = $this->db->prepare($checkQuery);
        $checkStmt->bind_param("s", $username);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
   
            echo "Username sudah digunakan. Silakan pilih username lain.";
            return false;
        }

        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $statement = $this->db->prepare($query);
        $statement->bind_param("ss", $username, $hashedPassword);
        return $statement->execute();
    }

    public function loginUser($username, $password) {
        $query = "SELECT * FROM users WHERE username = ?";
        $statement = $this->db->prepare($query);
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>
