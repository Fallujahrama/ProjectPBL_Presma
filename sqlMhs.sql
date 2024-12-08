select * from mahasiswa;
exec sp_GetDataKompetisi;


INSERT INTO userid (username, password, role) 
VALUES 
('2341760002', '2341760002', 'Mahasiswa'),
('2341760003', '2341760003', 'Mahasiswa'),
('2341760004', '2341760004', 'Mahasiswa'),
('2341760005', '2341760005', 'Mahasiswa');


--store procedure FIXEDDD--

CREATE OR ALTER PROCEDURE sp_GetDataKompetisi
AS
BEGIN
    SET NOCOUNT ON;

    SELECT 
        m.nama_mhs AS Nama,
        k.judul_kompetisi AS Judul,
        k.deskripsi_kompetisi AS Deskripsi,
        k.tingkat_kompetisi AS Tingkat,
        k.peringkat AS Peringkat
    FROM 
        kompetisi k
    INNER JOIN 
        mahasiswa m ON k.nim = m.nim
    WHERE 
        k.status_validasi = 'Valid' -- Hanya ambil kompetisi yang valid
    ORDER BY 
        k.id_kompetisi DESC;
END;

exec sp_GetDataKompetisi;



SELECT 
    m.nama_mhs AS Nama
FROM 
    mahasiswa m;

SELECT 
    k.judul_kompetisi AS Judul
FROM 
    kompetisi k;

SELECT 
    m.nama_mhs AS Nama,
    k.judul_kompetisi AS Judul,
    k.deskripsi_kompetisi AS Deskripsi,
    k.tingkat_kompetisi AS Tingkat,
    k.peringkat AS Peringkat
FROM 
    kompetisi k
JOIN 
    mahasiswa m ON m.nim = CAST(k.id_kompetisi AS VARCHAR(15));

 select * from list_kompetisi;

EXEC sp_columns kompetisiCo;

select * from mahasiswa;

SELECT 
        m.nama_mhs AS Nama,
        k.judul_kompetisi AS Judul,
        k.deskripsi_kompetisi AS Deskripsi,
        k.tingkat_kompetisi AS Tingkat,
        k.peringkat AS Peringkat
    FROM 
        kompetisi k
    INNER JOIN 
        list_kompetisi l ON k.id_kompetisi = l.id_kompetisi
    INNER JOIN 
        mahasiswa m ON l.nim = m.nim
    WHERE 
        k.status_validasi = 'Valid' -- Hanya ambil yang valid
    ORDER BY 
        k.id_kompetisi DESC;

--rombak database
-- Hapus constraint foreign key pada tabel list_kompetisi
ALTER TABLE kompetisiCo DROP CONSTRAINT FK_kompetisiCo_nim
ALTER TABLE list_kompetisi DROP CONSTRAINT FK_list_kompetisi_id_kompetisi;

-- Tambahkan kolom nim ke tabel kompetisi
ALTER TABLE mahasiswa
ALTER COLUMN nim VARCHAR(10);

-- Tambahkan constraint foreign key pada kolom nim di tabel kompetisi
ALTER TABLE kompetisi
ADD CONSTRAINT FK_kompetisi_nim FOREIGN KEY (nim) REFERENCES mahasiswa(nim);


select * from kompetisi;
select * from list_kompetisi;
select * from mahasiswa;

UPDATE kompetisi
SET nim = '2341760003'
WHERE id_kompetisi = 7; -- Ganti sesuai ID yang relevan

--view profile mahasiswa FIXED--
CREATE VIEW v_profilMahasiswa AS
SELECT * FROM mahasiswa;

select * from v_profilMahasiswa where nim = 2341760001;

--store procedure insert--
CREATE PROCEDURE sp_InsertKompetisi
    @judul_kompetisi VARCHAR(200),
    @deskripsi_kompetisi VARCHAR(MAX),
    @instansi_penyelenggara VARCHAR(150),
    @dosen_pembimbing VARCHAR(100),
    @tgl_mulai DATE,
    @tgl_selesai DATE,
    @tingkat_kompetisi VARCHAR(50),
    @peringkat VARCHAR(10),
    @file_ide_karya VARCHAR(255),
    @file_foto_dokumentasi VARCHAR(255),
    @file_sertifikat VARCHAR(255),
    @nim VARCHAR(15)
AS
BEGIN
    INSERT INTO kompetisi (judul_kompetisi, deskripsi_kompetisi, instansi_penyelenggara, dosen_pembimbing, tgl_mulai, tgl_selesai, tingkat_kompetisi, peringkat, file_ide_karya, file_foto_dokumentasi, file_sertifikat, status_validasi, nim) 
    VALUES (@judul_kompetisi, @deskripsi_kompetisi, @instansi_penyelenggara, @dosen_pembimbing, @tgl_mulai, @tgl_selesai, @tingkat_kompetisi, @peringkat, @file_ide_karya, @file_foto_dokumentasi, @file_sertifikat, 'Belum divalidasi', @nim);
END;

--debugging--

select * from kompetisiCo;

select 
	nim, judul_kompetisi, deskripsi_kompetisi,
	instansi_penyelenggara, dosen_pembimbing,
	tingkat_kompetisi, peringkat, status_validasi
from kompetisiCo;

 CREATE TABLE kompetisiCo (
  id_kompetisi INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nim VARCHAR(15),
  judul_kompetisi VARCHAR(200) NULL,
  deskripsi_kompetisi VARCHAR(MAX) NULL,
  instansi_penyelenggara VARCHAR(150) NULL,
  dosen_pembimbing VARCHAR(100) NULL,
  tgl_mulai DATE NULL,
  tgl_selesai DATE NULL,
  tingkat_kompetisi VARCHAR(50) NULL,
  peringkat VARCHAR(10) NULL,
  file_ide_karya VARBINARY(MAX) NULL,
  file_foto_dokumentasi VARBINARY(MAX) NULL,
  file_sertifikat VARBINARY(MAX) NULL, 
  status_validasi VARCHAR(20) CHECK (status_validasi IN ('Belum divalidasi', 'Valid', 'Tidak Valid')) NULL
  CONSTRAINT FK_kompetisiCo_nim FOREIGN KEY (nim) REFERENCES mahasiswa(nim)
);

CREATE OR ALTER PROCEDURE sp_GetDataKompetisiCoba
AS
BEGIN
    SET NOCOUNT ON;

    SELECT 
        m.nama_mhs AS Nama,
        k.judul_kompetisi AS Judul,
        k.deskripsi_kompetisi AS Deskripsi,
        k.tingkat_kompetisi AS Tingkat,
        k.peringkat AS Peringkat
    FROM 
        kompetisiCo k
    INNER JOIN 
        mahasiswa m ON k.nim = m.nim
    WHERE 
        k.status_validasi = 'Valid' -- Hanya ambil kompetisi yang valid
    ORDER BY 
        k.id_kompetisi DESC;
END;

exec sp_GetDataKompetisiCoba;

CREATE PROCEDURE sp_InsertKompetisiCo
	@nim VARCHAR(15),
    @judul_kompetisi VARCHAR(200),
    @deskripsi_kompetisi VARCHAR(MAX),
    @instansi_penyelenggara VARCHAR(150),
    @dosen_pembimbing VARCHAR(100),
    @tgl_mulai DATE,
    @tgl_selesai DATE,
    @tingkat_kompetisi VARCHAR(50),
    @peringkat VARCHAR(10),
    @file_ide_karya VARCHAR(MAX),
    @file_foto_dokumentasi VARCHAR(MAX),
    @file_sertifikat VARCHAR(MAX)
AS
BEGIN
	DECLARE @file_ide_karya_bin VARBINARY(MAX);
	DECLARE @file_foto_dokumentasi_bin VARBINARY(MAX);
	DECLARE @file_sertifikat_bin VARBINARY(MAX);

	SET @file_ide_karya_bin = CAST('' AS XML).value('xs:base64Binary(sql:variable("@file_ide_karya"))', 'VARBINARY(MAX)');
	SET @file_foto_dokumentasi_bin = CAST('' AS XML).value('xs:base64Binary(sql:variable("@file_foto_dokumentasi"))', 'VARBINARY(MAX)');
    SET @file_sertifikat_bin = CAST('' AS XML).value('xs:base64Binary(sql:variable("@file_sertifikat"))', 'VARBINARY(MAX)');

    INSERT INTO kompetisiCo (nim, judul_kompetisi, deskripsi_kompetisi, instansi_penyelenggara, dosen_pembimbing, tgl_mulai, tgl_selesai, tingkat_kompetisi, peringkat, file_ide_karya, file_foto_dokumentasi, file_sertifikat, status_validasi) 
    VALUES (@nim, @judul_kompetisi, @deskripsi_kompetisi, @instansi_penyelenggara, @dosen_pembimbing, @tgl_mulai, @tgl_selesai, @tingkat_kompetisi, @peringkat, @file_ide_karya_bin, @file_foto_dokumentasi_bin, @file_sertifikat_bin, 'Belum divalidasi');
END;
