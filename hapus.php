<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil ID dari form
    $id = $_POST['id'];

    // Query untuk menghapus data
    $sql = "DELETE FROM mahasiswa WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus. <a href='index.php'>Kembali</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: index.php");
    exit;
}
?>
