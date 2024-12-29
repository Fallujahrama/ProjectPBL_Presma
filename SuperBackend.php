<?php
session_start();
include 'db_connect.php';

class SuperBackend {
    private $conn;
    private $nip;

    public function __construct($conn){
        $this->conn = $conn;
        $this->nip = $_SESSION['username'];
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

    public function validasiData() {
        $sql = "SELECT 
                    id_kompetisi, nim, judul_kompetisi, deskripsi_kompetisi,
                    instansi_penyelenggara, dosen_pembimbing,
                    tingkat_kompetisi, peringkat, status_validasi
                FROM tb_kompetisi";
        $stmt = sqlsrv_query($this->conn, $sql);

        if ($stmt === false) {
            // Handle error
            die(print_r(sqlsrv_errors(), true));
        }

        $kompetisiValidasi = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $kompetisiValidasi[] = $row;
        }
        return $kompetisiValidasi;
    }

    public function updateStatus($id, $status) {
        $sql = "UPDATE tb_kompetisi SET status_validasi = ? WHERE id_kompetisi = ?";
        $params = [$status, $id];
        $stmt = sqlsrv_query($this->conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    
        // Redirect back to the super admin dashboard
        header("Location: SuperAdmin.php");
        exit();
    }

    public function getProfileAdm() {
        $sql = "SELECT * FROM v_profilAdmin WHERE nip = ?";
        $params = array($this->nip);
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row;
    }

    // Fungsi untuk menambahkan notifikasi
    public function tambahNotifikasi($id_kompetisi, $pesan) {
        echo "Menambahkan notifikasi: ID Kompetisi = $id_kompetisi, Pesan = $pesan"; // Debugging
        $sql = "INSERT INTO tb_notifikasi (id_kompetisi, pesan, tanggal) VALUES (?, ?, GETDATE())";
        $params = array($id_kompetisi, $pesan);
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

    public function getKelas() {
        $sql = "SELECT DISTINCT m.kelas, m.prodi FROM tb_mahasiswa m";
        $stmt = sqlsrv_query($this->conn, $sql);
        $kelas = [];

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $kelas[] = $row;
        }
        return $kelas;
    }

    public function getDosenPembimbing($kelas) {
        $dosen = [
            '1A' => 'Adevian Fairuz Pratama, S.S.T, M.Eng.',
            '1B' => 'Dr. Eng. Banni Satria Andoko, S.Kom., M.MSI.',
            '1C' => 'Irsyad Arif Mashudi, S.Kom., M.Kom.',
            '2B' => 'Meyti Eka Apriyani, S.T., M.T.',
            '2C' => 'Eka Larasati Amalia, S.ST., M.T.',
            '1A_SIB' => 'Muhammad Unggul Pamenang, S.ST., M.T.',
            '1B_SIB' => 'Pramana Yoga Saputra, S.Kom., M.MT.',
            '1D_SIB' => 'Dr. Eng. Rosa Andrie Asmara, S.T., M.T.',
            '1F_SIB' => 'Vivin Ayu Lestari, S.Pd., M.Kom.',
            '1A_PPLS' => 'Rokhimatul Wakhidah, S.Pd., M.T.'
        ];

        return isset($dosen[$kelas]) ? $dosen[$kelas] : 'Dosen Pembimbing tidak ditemukan';
    }

    public function getDataMahasiswa($kelas) {
        $sql = "EXEC sp_GetDataPrestasiMahasiswa ?";
        $params = array($kelas);
        $stmt = sqlsrv_query($this->conn, $sql, $params);

        $mahasiswa = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $ipk = $row['total_matkul'] > 0 ? $row['total_nilai'] / $row['total_matkul'] : 0;
            $row['ipk'] = number_format($ipk, 2);
            $mahasiswa[] = $row;
        }
        return $mahasiswa;
    }
}
?>