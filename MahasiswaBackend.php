<?php
session_start();

// // Check if user is logged in and has supadmin role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Mahasiswa') {
    header("Location: index.php");
    exit();
}

include 'db_connect.php';

$nim = $_SESSION['username']; // Assuming username is the NIM
$sql = "SELECT nama_mhs FROM mahasiswa WHERE nim = ?";
$params = array($nim);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    // Handle error
    die(print_r(sqlsrv_errors(), true));
}

$mahasiswa = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$namaMahasiswa = $mahasiswa ? $mahasiswa['nama_mhs'] : 'Nama tidak ditemukan';

//execute store procedure
$sql = "EXEC sp_GetDataKompetisiCoba";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    // Handle error
    die(print_r(sqlsrv_errors(), true));
}

// Fetch all competitions
$kompetisiList = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $kompetisiList[] = $row;
}

$sql_valid = "SELECT COUNT(*) as count FROM kompetisiCo WHERE status_validasi = 'Valid'";
$sql_belumvalid = "SELECT COUNT(*) as count FROM kompetisiCo WHERE status_validasi = 'Belum divalidasi'";
$sql_tidakvalid = "SELECT COUNT(*) as count FROM kompetisiCo WHERE status_validasi = 'Tidak Valid'";

$result_valid = sqlsrv_query($conn, $sql_valid);
$result_belumvalid = sqlsrv_query($conn, $sql_belumvalid);
$result_tidakvalid = sqlsrv_query($conn, $sql_tidakvalid);

$valid_count = sqlsrv_fetch_array($result_valid, SQLSRV_FETCH_ASSOC)['count'];
$belumvalid_count = sqlsrv_fetch_array($result_belumvalid, SQLSRV_FETCH_ASSOC)['count'];
$tidakvalid_count = sqlsrv_fetch_array($result_tidakvalid, SQLSRV_FETCH_ASSOC)['count'];

sqlsrv_free_stmt($stmt); // Free the statement
?>
