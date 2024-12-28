<?php
// Konfigurasi koneksi database
$serverName = "AQUEENA-IMUT\AQUEENA"; // Nama server
$connectionInfo = array("Database" => "prestasi_mahasiswa"); // Nama database
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Cek koneksi
if ($conn === false) {
    // Tampilkan pesan error langsung
    foreach (sqlsrv_errors() as $error) {
        echo "SQLSTATE: " . $error['SQLSTATE'] . "<br>";
        echo "Code: " . $error['code'] . "<br>";
        echo "Message: " . $error['message'] . "<br>";
    }
    die("Koneksi gagal. Silakan cek konfigurasi database.");
} else {
    // echo "Koneksi berhasil!";
}
?>
