<?php
require("config/koneksi_mysql.php");

class ProkerModel {
    private $db;

    public function __construct() {
        global $mysqli;
        $this->db = $mysqli;
    }

    public function getAllProkers() {
        $query = "SELECT * FROM prokers";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addProker($title, $description) {
        $query = "INSERT INTO prokers (title, description) VALUES (?, ?)";
        $statement = $this->db->prepare($query);
        $statement->bind_param("ss", $title, $description);
        return $statement->execute();
    }

    public function updateProker($id, $title, $description) {
        $query = "UPDATE prokers SET title = ?, description = ? WHERE id = ?";
        $statement = $this->db->prepare($query);
        $statement->bind_param("ssi", $title, $description, $id);
        return $statement->execute();
    }

    public function deleteProker($id) {
        $query = "DELETE FROM prokers WHERE id = ?";
        $statement = $this->db->prepare($query);
        $statement->bind_param("i", $id);
        return $statement->execute();
    }
}
?>
