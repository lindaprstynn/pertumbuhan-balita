<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pertumbuhan_balita";

$koneksi = mysqli_connect($servername, $username, $password, $database);
if (!$koneksi) {
    die("Koneksi Gagal:" . mysqli_connect_error());
}
