<?php
include 'db_connect.php'; // Pastikan ini mengarah ke file yang benar

if (isset($_GET['type']) && isset($_GET['nim'])) {
    $type = $_GET['type'];
    $nim = $_GET['nim'];

    // Ambil data file dari database berdasarkan NIM
    $sql = "SELECT file_ide_karya, file_foto_dokumentasi, file_sertifikat FROM kompetisiCo WHERE nim = ?";
    $params = array($nim);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    
    // Tentukan file yang akan ditampilkan
    switch ($type) {
        case 'ide_karya':
            $file_data = $row['file_ide_karya'];
            $content_type = 'application/pdf'; // Ganti dengan tipe konten yang sesuai
            break;
        case 'foto_dokumentasi':
            $file_data = $row['file_foto_dokumentasi'];
            $content_type = 'image/jpeg'; // Ganti dengan tipe konten yang sesuai
            break;
        case 'sertifikat':
            $file_data = $row['file_sertifikat'];
            $content_type = 'application/pdf'; // Ganti dengan tipe konten yang sesuai
            break;
        default:
            die("Invalid file type.");
    }

    // Set header untuk menampilkan file
    header("Content-Type: $content_type");
    header("Content-Length: " . strlen($file_data));
    echo $file_data; // Tampilkan file
    exit();
} else {
    die("Invalid request.");
}
?>