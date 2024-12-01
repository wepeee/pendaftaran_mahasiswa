<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
    $id_pegawai = $_POST['id_pegawai'];

    $sql = "INSERT INTO mahasiswa (nama, email, jurusan, tanggal_pendaftaran, id_pegawai) 
            VALUES ('$nama', '$email', '$jurusan', '$tanggal_pendaftaran', '$id_pegawai')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
