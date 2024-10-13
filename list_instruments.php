<?php
include 'header.php';
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM instruments";
$result = $conn->query($sql);
?>

<h2>Daftar Alat Musik</h2>
<ul>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li><a href='detail_instrument.php?id=" . $row["id"] . "'>" . $row["name"] . "</a></li>";
        }
    } else {
        echo "Tidak ada alat musik.";
    }
    ?>
</ul>

<?php
$conn->close();
include 'footer.php';
?>