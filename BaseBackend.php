<?php
session_start();
include 'db_connect.php';

class BaseBackend {
    private $conn;
    private $nip;
    private $nim;

    public function __construct($conn){
        $this->conn = $conn;
        $this->nip = $_SESSION['username'];
        $this->nim = $_SESSION['username'];
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

    public function getProfileMhs() {
        $sql = "SELECT * FROM v_profilMahasiswa WHERE nim = ?";
        $params = array($this->nim);
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row;
    }
}
?>