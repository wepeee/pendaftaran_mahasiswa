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
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" required><br>

            <label for="tanggal_pendaftaran">Tanggal Pendaftaran:</label>
            <input type="date" id="tanggal_pendaftaran" name="tanggal_pendaftaran" required><br>

            <label for="id_pegawai">Pegawai:</label>
            <select id="id_pegawai" name="id_pegawai" required>
                <option value="">Pilih Pegawai</option>
                <?php
                $pegawaiQuery = "SELECT id, nama FROM pegawai";
                $pegawaiResult = $conn->query($pegawaiQuery);
                while ($pegawai = $pegawaiResult->fetch_assoc()) {
                    echo "<option value='" . $pegawai['id'] . "'>" . $pegawai['nama'] . "</option>";
                }
                ?>
            </select><br>

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
                    <th>Pegawai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT mahasiswa.*, pegawai.nama AS nama_pegawai 
            FROM mahasiswa 
            LEFT JOIN pegawai ON mahasiswa.id_pegawai = pegawai.id";
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
                    <td>" . ($row['nama_pegawai'] ?? 'Belum Ditentukan') . "</td>
                    <td>
                        <form action='hapus.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <button type='submit' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</button>
                        </form>
                    </td>
                  </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Belum ada data mahasiswa</td></tr>";
                }
                ?>
            </tbody>


        </table>
    </div>
</body>

</html>