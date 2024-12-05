select * from mahasiswa;
exec sp_GetDataKompetisi;


INSERT INTO userid (username, password, role) 
VALUES 
('2341760002', '2341760002', 'Mahasiswa'),
('2341760003', '2341760003', 'Mahasiswa'),
('2341760004', '2341760004', 'Mahasiswa'),
('2341760005', '2341760005', 'Mahasiswa');


CREATE OR ALTER VIEW v_list_kompetisi
AS
SELECT 
    m.nama_mhs AS NamaMahasiswa,
    k.judul_kompetisi AS Judul,
    k.deskripsi_kompetisi AS Deskripsi,
    k.tingkat_kompetisi AS Tingkat,
    k.peringkat AS Peringkat
FROM 
    list_kompetisi lk
JOIN 
    kompetisi k ON lk.id_kompetisi = k.id_kompetisi
JOIN 
    mahasiswa m ON lk.nim = m.nim;


select * from v_list_kompetisi;


ALTER TABLE list_kompetisi
ADD nim VARCHAR(15);

-- Tambahkan foreign key agar terhubung dengan tabel mahasiswa
ALTER TABLE list_kompetisi
ADD CONSTRAINT FK_list_kompetisi_nim FOREIGN KEY (nim) REFERENCES mahasiswa(nim);

--check constraint
ALTER TABLE list_kompetisi NOCHECK CONSTRAINT FK_list_kompetisi_nim;


UPDATE list_kompetisi
SET nim = '2341760001'
WHERE id_kompetisi = 1;

UPDATE list_kompetisi
SET nim = '2341760002'
WHERE id_kompetisi = 2;

--trigger untuk menambahkan kompetisi
CREATE TRIGGER trg_insert_kompetisi_to_list
ON kompetisi
AFTER INSERT
AS
BEGIN
    SET NOCOUNT ON;

    -- Mulai transaksi eksplisit
    BEGIN TRY
        BEGIN TRANSACTION;

        -- Deklarasikan variabel untuk menyimpan NIM dari CONTEXT_INFO
        DECLARE @nim VARCHAR(15);

        -- Ambil NIM dari CONTEXT_INFO (dikirim oleh aplikasi)
        SELECT @nim = CAST(CONTEXT_INFO() AS VARCHAR(15));

        -- Pastikan NIM tidak kosong
        IF @nim IS NULL OR @nim = ''
        BEGIN
            THROW 50000, 'NIM tidak ditemukan dalam konteks.', 1;
        END

        -- Masukkan data ke tabel list_kompetisi
        INSERT INTO list_kompetisi (id_kompetisi, nim)
        SELECT i.id_kompetisi, @nim
        FROM inserted i;

        -- Commit transaksi jika tidak ada masalah
        COMMIT TRANSACTION;
    END TRY
    BEGIN CATCH
        -- Rollback transaksi jika ada error
        IF @@TRANCOUNT > 0
            ROLLBACK TRANSACTION;

        -- Kembalikan pesan error untuk debugging
        DECLARE @ErrorMessage NVARCHAR(4000) = ERROR_MESSAGE();
        DECLARE @ErrorSeverity INT = ERROR_SEVERITY();
        DECLARE @ErrorState INT = ERROR_STATE();
        RAISERROR (@ErrorMessage, @ErrorSeverity, @ErrorState);
    END CATCH;
END;

DISABLE TRIGGER trg_list_kompetisi_insert ON list_kompetisi;
delete from kompetisi where id_kompetisi = 3;

CREATE TRIGGER trg_insert_list_kompetisi
ON kompetisi
AFTER INSERT
AS
BEGIN
    DECLARE @id_kompetisi INT;
    DECLARE @nim VARCHAR(15);
    
    -- Mendapatkan id_kompetisi yang baru saja dimasukkan
    SELECT @id_kompetisi = id_kompetisi FROM inserted;

    -- Mendapatkan NIM mahasiswa dari CONTEXT_INFO
    DECLARE @nim_from_context VARCHAR(15);
    SET @nim_from_context = CAST(CONTEXT_INFO() AS VARCHAR(15));
    
    -- Memasukkan data ke tabel list_kompetisi
    INSERT INTO list_kompetisi (id_kompetisi, nim)
    VALUES (@id_kompetisi, @nim_from_context);
BEGIN
    -- Cek jika @id_kompetisi dan @nim_from_context memiliki nilai
    IF @id_kompetisi IS NULL OR @nim_from_context IS NULL
    BEGIN
        RAISERROR('ID Kompetisi atau NIM dari CONTEXT_INFO tidak ditemukan.', 16, 1);
    END
END;

END;

--store procedure--
exec sp_GetDataKompetisi;

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
EXEC sp_columns kompetisi;

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
ALTER TABLE list_kompetisi DROP CONSTRAINT FK_list_kompetisi_nim;
ALTER TABLE list_kompetisi DROP CONSTRAINT FK_list_kompetisi_id_kompetisi;

-- Tambahkan kolom nim ke tabel kompetisi
ALTER TABLE kompetisi
ADD nim VARCHAR(15);

-- Tambahkan constraint foreign key pada kolom nim di tabel kompetisi
ALTER TABLE kompetisi
ADD CONSTRAINT FK_kompetisi_nim FOREIGN KEY (nim) REFERENCES mahasiswa(nim);


ALTER TABLE kompetisi DROP CONSTRAINT FK_kompetisi_nim;


select * from kompetisi;
select * from list_kompetisi;
select * from mahasiswa;

UPDATE kompetisi
SET nim = '2341760003'
WHERE id_kompetisi = 7; -- Ganti sesuai ID yang relevan

--view profile mahasiswa
CREATE VIEW v_profilMahasiswa AS
SELECT * FROM mahasiswa;

select * from v_profilMahasiswa where nim = 2341760001;