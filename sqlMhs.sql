select * from list_kompetisi;
select * from kompetisi;

INSERT INTO userid (username, password, role) 
VALUES 
('2341760002', '2341760002', 'Mahasiswa'),
('2341760003', '2341760003', 'Mahasiswa'),
('2341760004', '2341760004', 'Mahasiswa'),
('2341760005', '2341760005', 'Mahasiswa');


CREATE VIEW v_list_kompetisi
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

-- Misalnya mahasiswa dengan NIM 12345 mengikuti kompetisi 1
UPDATE list_kompetisi
SET nim = '2341760001'
WHERE id_kompetisi = 1;

-- Misalnya mahasiswa dengan NIM 67890 mengikuti kompetisi 2
UPDATE list_kompetisi
SET nim = '2341760002'
WHERE id_kompetisi = 2;
