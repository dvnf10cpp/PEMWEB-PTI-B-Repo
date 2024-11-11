<?php

$mysqli = new mysqli("127.0.0.1","root","","latihanmvc",3307);
if ($mysqli->connect_error) {
    die("Koneksi gagal: ". $mysqli->connect_error);
}
?>