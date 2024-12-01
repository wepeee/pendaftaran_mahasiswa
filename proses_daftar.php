<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
    $id_pegawai = $_POST['id_pegawai'];

    // Proses Unggah Foto
    $foto = $_FILES['foto'];
    $fotoName = time() . '_' . $foto['name']; // Gunakan timestamp agar unik
    $fotoTmpName = $foto['tmp_name'];
    $fotoFolder = 'uploads/' . $fotoName;

    // Cek apakah terjadi error saat upload
    if ($foto['error'] !== UPLOAD_ERR_OK) {
        echo "Error Upload: " . $foto['error'];
        exit;
    }

    // Proses upload file
    if (move_uploaded_file($fotoTmpName, $fotoFolder)) {
        // Simpan Data ke Database
        $sql = "INSERT INTO mahasiswa (nama, email, jurusan, tanggal_pendaftaran, id_pegawai, foto) 
                VALUES ('$nama', '$email', '$jurusan', '$tanggal_pendaftaran', '$id_pegawai', '$fotoName')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengunggah foto.";
    }
}
