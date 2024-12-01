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

CREATE TABLE pegawai (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- Contoh Data Pegawai
INSERT INTO pegawai (nama, email) VALUES
('Andi Setiawan', 'andi@example.com'),
('Rina Lestari', 'rina@example.com');

ALTER TABLE mahasiswa
ADD COLUMN id_pegawai INT,
ADD CONSTRAINT fk_pegawai
    FOREIGN KEY (id_pegawai) REFERENCES pegawai(id)
    ON DELETE SET NULL;

ALTER TABLE mahasiswa
ADD COLUMN foto VARCHAR(255);

