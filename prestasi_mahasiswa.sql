-- Gunakan database (opsional, buat jika belum ada)
CREATE DATABASE prestasi_mahasiswa;
GO

USE prestasi_mahasiswa;
GO

-- Tabel: admin
CREATE TABLE admin (
  id_admin INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nama_admin VARCHAR(100) NULL
);
GO

-- Tabel: USER
CREATE TABLE userid (
  id_user INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(20) CHECK (role IN ('Admin', 'Super Admin', 'Mahasiswa')) NOT NULL
);
GO

-- Tabel: kompetisi
CREATE TABLE kompetisi (
  id_kompetisi INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  judul_kompetisi VARCHAR(200) NULL,
  deskripsi_kompetisi VARCHAR(MAX) NULL,
  instansi_penyelenggara VARCHAR(150) NULL,
  dosen_pembimbing VARCHAR(100) NULL,
  tgl_mulai DATE NULL,
  tgl_selesai DATE NULL,
  tingkat_kompetisi VARCHAR(50) NULL,
  peringkat VARCHAR(10) NULL,
  file_ide_karya VARCHAR(255) NULL,
  file_foto_dokumentasi VARCHAR(255) NULL,
  file_sertifikat VARCHAR(255) NULL,
  status_validasi VARCHAR(20) CHECK (status_validasi IN ('Belum divalidasi', 'Valid', 'Tidak Valid')) NULL
);
GO

-- Tabel: list_kompetisi
CREATE TABLE list_kompetisi (
  id_agenda INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  id_kompetisi INT NULL,
  CONSTRAINT FK_list_kompetisi_id_kompetisi FOREIGN KEY (id_kompetisi) REFERENCES kompetisi(id_kompetisi)
);
GO

-- Tabel: mahasiswa
CREATE TABLE mahasiswa (
  nim VARCHAR(15) NOT NULL PRIMARY KEY,
  nama_mhs VARCHAR(100) NULL,
  kelas VARCHAR(10) NULL,
  prodi VARCHAR(100) NULL
);
GO

-- Tabel: mata_kuliah
CREATE TABLE mata_kuliah (
  id_matkul INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nama_matkul VARCHAR(100) NULL
);
GO

-- Tabel: nilai_mahasiswa
CREATE TABLE nilai_mahasiswa (
  id_nilai INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nilai DECIMAL(4,2) NULL,
  absensi VARCHAR(1) CHECK (absensi IN ('S', 'I', 'A')) NULL,
  ipk DECIMAL(4,2) NULL,
  nim VARCHAR(15) NULL,
  nama VARCHAR(100) NULL,
  id_matkul INT NULL,
  CONSTRAINT FK_nilai_mahasiswa_nim FOREIGN KEY (nim) REFERENCES mahasiswa(nim),
  CONSTRAINT FK_nilai_mahasiswa_id_matkul FOREIGN KEY (id_matkul) REFERENCES mata_kuliah(id_matkul)
);
GO

-- Tabel: prestasi
CREATE TABLE prestasi (
  id_prestasi INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nim VARCHAR(15) NULL,
  CONSTRAINT FK_prestasi_nim FOREIGN KEY (nim) REFERENCES mahasiswa(nim)
);
GO

INSERT into userid (username, password, role) 
VALUES 
('admin', 'admin123', 'Admin'),
('superadmin', 'super123', 'Super Admin'),
('2341760001', '2341760001', 'Mahasiswa');
GO

select * from userid;