<?php
$servername = "localhost";
$username = "root"; // username MySQL
$password = ""; // password MySQL (biasanya kosong di XAMPP atau MAMP)
$dbname = "rental_alat_musik"; // nama database

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>