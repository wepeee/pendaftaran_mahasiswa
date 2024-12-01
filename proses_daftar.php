<?php
include 'config.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];
$tanggal = $_POST['tanggal'];

$sql = "INSERT INTO mahasiswa (nama, email, jurusan, tanggal_pendaftaran) 
        VALUES ('$nama', '$email', '$jurusan', '$tanggal')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil! <a href='index.php'>Kembali ke Form</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
