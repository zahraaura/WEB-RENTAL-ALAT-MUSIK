<?php
include 'header.php'; // Termasuk header untuk desain/layout
include 'db.php'; // Koneksi ke database

session_start(); // Mulai session untuk login

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Ambil username dari form
    $password = $_POST['password']; // Ambil password dari form

    // Siapkan query untuk mengambil data user berdasarkan username
    $sql = $conn->prepare("SELECT * FROM users WHERE username=?");
    $sql->bind_param("s", $username); // Bind username ke query
    $sql->execute(); // Eksekusi query
    $result = $sql->get_result(); // Dapatkan hasil query

    // Jika username ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Ambil data user dari database
        // Cek apakah password yang diinput cocok dengan password hash di database
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username; // Set session username
            header("Location: index.php"); // Redirect ke halaman utama setelah login
        } else {
            echo "<p style='color:red;'>Password salah!</p>"; // Pesan jika password salah
        }
    } else {
        echo "<p style='color:red;'>Username tidak ditemukan!</p>"; // Pesan jika username tidak ditemukan
    }
    
    $sql->close(); // Tutup statement
    $conn->close(); // Tutup koneksi ke database
}
?>

<h2>Login</h2>
<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

<?php include 'footer.php'; // Termasuk footer untuk desain/layout ?>

<br>
<p>Belum punya akun? <a href="register.php"><button>Register</button></a></p>