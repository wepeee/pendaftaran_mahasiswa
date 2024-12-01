-- Membuat database
CREATE DATABASE IF NOT EXISTS pendaftaran_mahasiswa;

-- Gunakan database
USE pendaftaran_mahasiswa;

-- Membuat tabel mahasiswa
CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    jurusan VARCHAR(50) NOT NULL,
    tanggal_pendaftaran DATE NOT NULL
);

-- Menambahkan data contoh (opsional)
INSERT INTO mahasiswa (nama, email, jurusan, tanggal_pendaftaran) VALUES
('Budi Santoso', 'budi@example.com', 'Teknik Informatika', '2024-12-01'),
('Ayu Lestari', 'ayu@example.com', 'Sistem Informasi', '2024-12-02');
