<?php
session_start();
include 'db_connect.php';

class MahasiswaBackend {
    private $conn;
    private $nim;

    public function __construct($conn){
        $this->conn = $conn;
        $this->nim = $_SESSION['username'];
    }

    public function getNamaMahasiswa() {
        $sql = "SELECT nama_mhs FROM tb_mahasiswa WHERE nim = ?";
        $params = array($this->nim);
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        $mahasiswa = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $mahasiswa['nama_mhs'];
    }
    public function getKompetisiList() {
        $sql = "EXEC sp_GetDataKompetisi";
        $stmt = sqlsrv_query($this->conn, $sql);
        $kompetisiList = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $kompetisiList[] = $row;
        }
        return $kompetisiList;
    }

    public function getCountValid() {
        $sql = "SELECT COUNT(*) as count FROM tb_kompetisi WHERE status_validasi = 'Valid'";
        $result = sqlsrv_query($this->conn, $sql);
        return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)['count'];
    }

    public function getCountBelumValid() {
        $sql = "SELECT COUNT(*) as count FROM tb_kompetisi WHERE status_validasi = 'Belum divalidasi'";
        $result = sqlsrv_query($this->conn, $sql);
        return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)['count'];
    }

    public function getCountTidakValid() {
        $sql = "SELECT COUNT(*) as count FROM tb_kompetisi WHERE status_validasi = 'Tidak Valid'";
        $result = sqlsrv_query($this->conn, $sql);
        return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)['count'];
    }

    public function tambahKompetisi ($judul_kompetisi, $deskripsi_kompetisi, $instansi_penyelenggara, $dosen_pembimbing, $tgl_mulai, $tgl_selesai, $tingkat_kompetisi, $peringkat, $file_ide_karya, $file_foto_dokumentasi, $file_sertifikat) {
        // Upload files
        $file_ide_karya = base64_encode(file_get_contents($_FILES['file_ide_karya']['tmp_name']));
        $file_foto_dokumentasi = base64_encode(file_get_contents($_FILES['file_foto_dokumentasi']['tmp_name']));
        $file_sertifikat = base64_encode(file_get_contents($_FILES['file_sertifikat']['tmp_name']));
        
        // Query untuk memanggil stored procedure
        $sql = "EXEC sp_InsertKompetisi ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
        $params = array($this->nim, $judul_kompetisi, $deskripsi_kompetisi, $instansi_penyelenggara, $dosen_pembimbing, $tgl_mulai, $tgl_selesai, $tingkat_kompetisi, $peringkat, $file_ide_karya, $file_foto_dokumentasi, $file_sertifikat);
        $stmt = sqlsrv_query($this->conn, $sql, $params);
    
        if ($stmt === false) {
            // Handle error
            die(print_r(sqlsrv_errors(), true));
        }
    
        // Redirect to dashboard after successful insertion
        header("Location: Mahasiswa.php");
        exit();
    }

    public function getProfileMhs() {
        $sql = "SELECT * FROM v_profilMahasiswa WHERE nim = ?";
        $params = array($this->nim);
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row;
    }
}
?>