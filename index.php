<?php
include 'header.php';
include 'db.php';

if (isset($_SESSION['username'])) {
    echo "<h2>Selamat datang, " . $_SESSION['username'] . "!</h2>";
    echo '<a href="list_instruments.php">Lihat Daftar Alat Musik</a>';
} else {
    header("Location: login.php");
}

include 'footer.php';
?>