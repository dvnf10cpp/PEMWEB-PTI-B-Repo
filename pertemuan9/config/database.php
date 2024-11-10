<?php
// config/database.php
function getDatabaseConnection() {
    static $mysqli = null;
    
    if ($mysqli === null) {
        $mysqli = new mysqli("127.0.0.1", "root", "", "latihanmvc", 3306);
        
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
    }
    
    return $mysqli;
}