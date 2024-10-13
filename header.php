<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Rental Alat Musik</title>
    <style>
        .nav {
            background-color: #f2f2f2;
            padding: 10px;
        }
        .nav a {
            margin: 0 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="list_instruments.php">Daftar Alat Musik</a>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>