<?php
$host = "localhost";      // biasanya localhost
$user = "root";           // user MySQL
$pass = "";               // password MySQL (default kosong di XAMPP)
$db   = "minimarket_db";  // nama database

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Jika berhasil
// echo "Koneksi berhasil";
?>
