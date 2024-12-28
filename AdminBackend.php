<?php
session_start();
include 'db_connect.php';

class AdminBackend {
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

    public function getProfileAdm() {
        $sql = "SELECT * FROM v_profilAdmin WHERE nip = ?";
        $params = array($this->nip);
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row;
    }

    public function dataKompetisi() {
        $sql = "SELECT 
                    id_kompetisi, nim, judul_kompetisi, deskripsi_kompetisi,
                    instansi_penyelenggara, dosen_pembimbing,
                    tingkat_kompetisi, peringkat
                FROM tb_kompetisi";
        $stmt = sqlsrv_query($this->conn, $sql);

        if ($stmt === false) {
            // Handle error
            die(print_r(sqlsrv_errors(), true));
        }

        $dataKompetisi = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $dataKompetisi[] = $row;
        }
        return $dataKompetisi;
    }
}
?>