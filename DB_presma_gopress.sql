---------------------------------------------------------------------------------------------------------------------------------------
/* MEMBUAT DATABASE DAN TABEL */
---------------------------------------------------------------------------------------------------------------------------------------
-- Gunakan database (opsional, buat jika belum ada)
IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'DB_presma_gopres')
CREATE DATABASE DB_presma_gopres;
GO

USE DB_presma_gopres;
GO

-- Tabel: admin
CREATE TABLE tb_admin (
  id_admin INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nama_admin VARCHAR(100) NULL,
  nip VARCHAR(18) NOT NULL
);
GO

 
-- Tabel: USER
CREATE TABLE tb_userid (
  id_user INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  username VARCHAR(20) NOT NULL,
  password VARCHAR(20) NOT NULL,
  role VARCHAR(50) CHECK (role IN ('Admin', 'Super Admin', 'Mahasiswa')) NOT NULL
);
GO

-- Tabel: mahasiswa
CREATE TABLE tb_mahasiswa (
  nim VARCHAR(15) NOT NULL PRIMARY KEY,
  nama_mhs VARCHAR(100) NULL,
  kelas VARCHAR(50) NULL,
  prodi VARCHAR(100) NULL
);
GO

-- Tabel: kompetisi
CREATE TABLE tb_kompetisi (
  id_kompetisi INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nim VARCHAR(15) NOT NULL,
  judul_kompetisi VARCHAR(200) NULL,
  deskripsi_kompetisi TEXT NULL,
  instansi_penyelenggara VARCHAR(100) NULL,
  dosen_pembimbing VARCHAR(100) NULL,
  tgl_mulai DATE NOT NULL,
  tgl_selesai DATE NOT NULL,
  tingkat_kompetisi VARCHAR(100) NULL,
  peringkat VARCHAR(50) NULL,
  file_ide_karya VARCHAR(MAX) NULL,
  file_foto_dokumentasi VARCHAR(MAX) NULL,
  file_sertifikat VARCHAR(MAX) NULL,
  status_validasi VARCHAR(50) CHECK (status_validasi IN ('Belum divalidasi', 'Valid', 'Tidak Valid')) NULL,
  CONSTRAINT FK_kompetisi_nim FOREIGN KEY (nim) REFERENCES tb_mahasiswa(nim),
  CONSTRAINT cek_tanggal CHECK (tgl_selesai >= tgl_mulai)
);
GO

-- Tabel: info_kompetisi
CREATE TABLE tb_info_kompetisi (
  id_info INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  judul_lomba VARCHAR(200) NOT NULL,
  deskripsi TEXT NULL,
  tgl_publish DATE DEFAULT GETDATE(),
  batas_waktu_pendaftaran DATE NOT NULL,
  instansi_penyelenggara VARCHAR(100) NOT NULL,
  link_lomba VARCHAR(200) NULL
);
GO

-- Tabel: mata_kuliah
CREATE TABLE tb_mata_kuliah (
  id_matkul INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nama_matkul VARCHAR(50) NULL
);
GO

-- Tabel: nilai_mahasiswa
CREATE TABLE tb_nilai_mahasiswa (
  id_nilai INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nilai DECIMAL(4,2) NULL,
  alpa INT DEFAULT 0 NOT NULL,
  izin INT DEFAULT 0 NOT NULL,
  sakit INT DEFAULT 0 NOT NULL,
  nim VARCHAR(15) NULL,
  id_matkul INT NULL,
  CONSTRAINT FK_nilai_mahasiswa_nim FOREIGN KEY (nim) REFERENCES tb_mahasiswa(nim),
  CONSTRAINT FK_nilai_mahasiswa_id_matkul FOREIGN KEY (id_matkul) REFERENCES tb_mata_kuliah(id_matkul)
);
GO

-- Tabel: prestasi
CREATE TABLE tb_prestasi (
  id_prestasi INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nim VARCHAR(15) NULL,
  CONSTRAINT FK_prestasi_nim FOREIGN KEY (nim) REFERENCES tb_mahasiswa(nim)
);
GO

---------------------------------------------------------------------------------------------------------------------------------------
/* ISI DATA DUMMY */
---------------------------------------------------------------------------------------------------------------------------------------
BEGIN TRANSACTION;
-- Data hak akses
INSERT into tb_userid (username, password, role) 
VALUES 
('admin', 'admin123', 'Admin'),
('superadmin', 'super123', 'Super Admin'),
('2341760001', '2341760001', 'Mahasiswa');
GO
SELECT * FROM tb_userid;

-- Data Admin
INSERT INTO tb_admin (nama_admin,nip) VALUES
('Lailatul Qodriyah, S.Sos.','199501102024051001'),
('Ana Agustina, S.M.','199501102024051002'),
('Titis Octary Satrio, S.ST.','199501102024051003');

-- Data mahasiswa
INSERT INTO tb_mahasiswa (nim, nama_mhs, kelas, prodi)
VALUES 
('2341760001', 'Budi Santoso', 'TI-1A', 'Teknik Informatika'),
('2341760002', 'Siti Aisyah', 'TI-1B', 'Teknik Informatika'),
('2341760003', 'Agus Haryanto', 'TI-1A', 'Teknik Informatika'),
('2341760004', 'Dewi Lestari', 'TI-1B', 'Teknik Informatika'),
('2341760005', 'Indah Pratiwi', 'TI-1C', 'Teknik Informatika'),
('2341760006', 'Aldo Febriansyah', 'TI-2C', 'Teknik Informatika'),
('2341760007', 'Aditya Yuhanda Putra', 'TI-2B', 'Teknik Informatika'),
('2341760008', 'Husein Fadhlullah', 'PPLS-1A', 'Piranti Perangkat Lunak Situs'),
('2341760009', 'Aqueena Regita Hapsari', 'SIB-1B', 'Sistem Informasi Bisnis'),
('2341760010', 'Fallujah Ramadi Camshah', 'SIB-1D', 'Sistem Informasi Bisnis'),
('2341760011', 'Lovelyta Sekarayu Krisdiyanti', 'SIB-1A', 'Sistem Informasi Bisnis'),
('2341760012', 'Wahyu Trisnantoadi Prakoso', 'SIB-1F', 'Sistem Informasi Bisnis');
SELECT * FROM tb_mahasiswa;

-- Tabel mata_kuliah
INSERT INTO tb_mata_kuliah (nama_matkul)
VALUES 
('Matematika Lanjut'),
('Pemrograman Web'),
('Sistem Operasi'),
('Basis Data'),
('Jaringan Komputer');
SELECT * FROM tb_mata_kuliah;

-- Tabel kompetisi (isi sendiri aja dulu)

-- Tabel list_kompetisi (isi sendiri aja dulu)


SELECT * from list_kompetisi;

-- Tabel tb_nilai_mahasiswa
INSERT INTO tb_nilai_mahasiswa (nilai, alpa, izin, sakit, nim, id_matkul)
VALUES
-- Indah Pratiwi
(85.5, 0, 1, 1, '2341760005', 1),
(90.0, 1, 0, 0, '2341760005', 2),
(88.0, 0, 1, 0, '2341760005', 3),
(95.0, 0, 0, 1, '2341760005', 4),
(89.5, 0, 0, 0, '2341760005', 5),
-- Budi Santoso
(80.0, 0, 2, 0, '2341760001', 1),
(85.0, 0, 0, 2, '2341760001', 2),
(78.0, 1, 0, 0, '2341760001', 3),
(90.0, 0, 1, 1, '2341760001', 4),
(87.5, 1, 0, 0, '2341760001', 5),
-- Siti Aisyah
(75.0, 2, 1, 0, '2341760002', 1),
(82.5, 0, 0, 1, '2341760002', 2),
(88.0, 0, 0, 0, '2341760002', 3),
(92.0, 1, 0, 0, '2341760002', 4),
(85.0, 0, 1, 0, '2341760002', 5),
-- Agus Haryanto
(88.0, 0, 0, 1, '2341760003', 1),
(90.0, 1, 0, 0, '2341760003', 2),
(92.5, 0, 1, 0, '2341760003', 3),
(87.0, 0, 0, 0, '2341760003', 4),
(93.0, 0, 0, 0, '2341760003', 5),
-- Dewi Lestari
(85.0, 0, 0, 1, '2341760004', 1),
(78.0, 1, 0, 0, '2341760004', 2),
(82.0, 0, 1, 0, '2341760004', 3),
(88.5, 0, 0, 1, '2341760004', 4),
(89.0, 0, 0, 0, '2341760004', 5),
-- Aldo Febriansyah
(75.5, 2, 0, 0, '2341760006', 1),
(78.0, 1, 0, 0, '2341760006', 2),
(80.5, 0, 1, 1, '2341760006', 3),
(85.0, 0, 0, 0, '2341760006', 4),
(82.0, 0, 0, 0, '2341760006', 5),
-- Aditya Yuhanda Putra
(88.5, 0, 0, 1, '2341760007', 1),
(92.0, 0, 0, 0, '2341760007', 2),
(87.0, 0, 1, 0, '2341760007', 3),
(93.5, 0, 0, 0, '2341760007', 4),
(85.0, 1, 0, 0, '2341760007', 5),
-- Husein Fadhlullah
(77.5, 0, 1, 0, '2341760008', 1),
(80.0, 1, 0, 0, '2341760008', 2),
(88.0, 0, 0, 1, '2341760008', 3),
(90.5, 0, 0, 0, '2341760008', 4),
(85.0, 0, 0, 0, '2341760008', 5),
-- Aqueena Regita Hapsari
(95.0, 0, 0, 0, '2341760009', 1),
(93.0, 0, 1, 0, '2341760009', 2),
(92.0, 0, 0, 0, '2341760009', 3),
(91.0, 1, 0, 0, '2341760009', 4),
(94.5, 0, 0, 0, '2341760009', 5),
-- Fallujah Ramadi Camshah
(89.5, 0, 0, 0, '2341760010', 1),
(90.0, 0, 0, 0, '2341760010', 2),
(85.0, 0, 1, 0, '2341760010', 3),
(87.5, 0, 0, 0, '2341760010', 4),
(88.0, 0, 0, 0, '2341760010', 5),
-- Lovelyta Sekarayu Krisdiyanti
(88.0, 0, 0, 1, '2341760011', 1),
(90.5, 0, 0, 0, '2341760011', 2),
(89.0, 0, 0, 0, '2341760011', 3),
(88.5, 1, 0, 0, '2341760011', 4),
(87.0, 0, 1, 0, '2341760011', 5),
-- Wahyu Trisnantoadi Prakoso
(85.0, 0, 0, 0, '2341760012', 1),
(83.5, 1, 0, 0, '2341760012', 2),
(80.0, 0, 0, 1, '2341760012', 3),
(88.0, 0, 0, 0, '2341760012', 4),
(85.5, 0, 1, 0, '2341760012', 5);

SELECT --- TAMPIL SELURUH TABEL
    nim,
    id_matkul,
    nilai,
    alpa,
    izin,
    sakit,
    (alpa + izin + sakit) AS TidakHadir
FROM tb_nilai_mahasiswa;

SELECT --- HITUNG ABSENSI MAHASISWA
    nim,
    SUM(alpa) AS TotalAlpa,
    SUM(izin) AS TotalIzin,
    SUM(sakit) AS TotalSakit,
    SUM(alpa + izin + sakit) AS TotalKetidakhadiran
FROM tb_nilai_mahasiswa
GROUP BY nim;


-- Tabel prestasi
INSERT INTO tb_prestasi (nim)
VALUES 
('2341760001'),
('2341760002'),
('2341760003'),
('2341760004'),
('2341760005'),
('2341760006'),
('2341760007'),
('2341760008'),
('2341760009'),
('2341760010'),
('2341760011'),
('2341760012');
SELECT * FROM tb_prestasi;

-- Cek data di tabel userid
SELECT * FROM tb_userid;

-- Tabel info kompetisi
INSERT INTO tb_info_kompetisi (judul_lomba, deskripsi, batas_waktu_pendaftaran, instansi_penyelenggara, link_lomba)
VALUES
('Kompetisi Inovasi Teknologi 2024', 
 'Lomba ini mengundang mahasiswa untuk menciptakan solusi teknologi inovatif untuk masalah sosial.', 
 '2025-01-15', 
 'Universitas Teknologi Nusantara', 
 'https://lomba.teknologinusantara.ac.id'),

('Lomba Karya Tulis Ilmiah Nasional 2024', 
 'LKTI tingkat nasional untuk mahasiswa dalam bidang sains dan teknologi.', 
 '2025-02-10', 
 'Kementerian Pendidikan dan Kebudayaan', 
 'https://lkti.kemdikbud.go.id'),

('Hackathon Digital Economy 2024', 
 'Kompetisi coding untuk menciptakan aplikasi berbasis ekonomi digital.', 
 '2025-01-30', 
 'Asosiasi Teknologi Indonesia', 
 'https://hackathon.digitaleconomy.id'),

('Business Plan Competition 2024', 
 'Ajang pembuatan rencana bisnis untuk mahasiswa dengan ide-ide kreatif.', 
 '2025-02-25', 
 'Institut Bisnis Kreatif Indonesia', 
 'https://businessplan.ibki.ac.id'),

('Photography Contest 2024', 
 'Kompetisi fotografi untuk tema "Keindahan Nusantara".', 
 '2025-03-05', 
 'Komunitas Fotografi Indonesia', 
 'https://fotografi.indonesia.ac.id'),

('Lomba Desain Poster Nasional 2024', 
 'Lomba desain poster bertema "Pentingnya Kesadaran Lingkungan".', 
 '2025-01-20', 
 'Organisasi Lingkungan Hidup Nasional', 
 'https://poster.lingkungan.id'),

('Programming Contest 2024', 
 'Lomba pemrograman tingkat mahasiswa dengan berbagai tantangan algoritma.', 
 '2025-03-15', 
 'Himpunan Mahasiswa Teknik Informatika', 
 'https://programmingcontest.himatif.ac.id'),

('Startup Challenge 2024', 
 'Kompetisi untuk mengembangkan ide startup baru dengan presentasi ke investor.', 
 '2025-02-05', 
 'Startup Incubator Indonesia', 
 'https://startupchallenge.id'),

('Esai Nasional 2024', 
 'Kompetisi menulis esai bertema "Peran Pemuda dalam Pembangunan Bangsa".', 
 '2025-01-25', 
 'Forum Pemuda Indonesia', 
 'https://esai.fpi.id'),

('Film Pendek Nusantara 2024', 
 'Lomba pembuatan film pendek dengan durasi maksimal 10 menit.', 
 '2025-02-15', 
 'Komunitas Film Indonesia', 
 'https://film.nusantara.id');

 SELECT * FROM tb_info_kompetisi;

COMMIT TRANSACTION;

