<?php
include 'header.php';
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $conn->prepare("SELECT * FROM instruments WHERE id = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Alat musik tidak ditemukan.";
        exit();
    }
} else {
    echo "ID alat musik tidak diberikan.";
    exit();
}
?>

<h2>Detail Alat Musik</h2>
<p>Nama: <?php echo $row["name"]; ?></p>
<p>Deskripsi: <?php echo $row["description"]; ?></p>
<p>Harga Sewa: Rp <?php echo $row["price"]; ?></p>
<a href="list_instruments.php">Kembali ke Daftar Alat Musik</a>

<?php
$sql->close();
$conn->close();
include 'footer.php';
?>

<a href="logout.php">Logout</a>