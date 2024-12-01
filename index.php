<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa</title>
    <style>
        
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">


        <h1>Form Pendaftaran Mahasiswa</h1>
        <form class="form-daftar" action="proses_daftar.php" method="POST">
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="jurusan">Jurusan:</label><br>
            <select id="jurusan" name="jurusan" required>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
            </select><br><br>

            <label for="tanggal">Tanggal Pendaftaran:</label><br>
            <input type="date" id="tanggal" name="tanggal" required><br><br>

            <button type="submit">Daftar</button>
        </form>

        <h2>Daftar Mahasiswa Terdaftar</h2>
        <table>
        <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Tanggal Pendaftaran</th>
        <th>Aksi</th>
    </tr>
</thead>

            <tbody>
                <?php
                // Ambil data dari tabel mahasiswa
                $sql = "SELECT * FROM mahasiswa";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['jurusan'] . "</td>
                    <td>" . $row['tanggal_pendaftaran'] . "</td>
                    <td>
                        <form action='hapus.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <button type='submit' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</button>
                        </form>
                    </td>
                  </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Belum ada data mahasiswa</td></tr>";
                }
                ?>
            </tbody>

        </table>
    </div>
</body>

</html>