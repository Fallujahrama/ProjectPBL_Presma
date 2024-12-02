<?php
$host = 'AQUEENA-IMUT\\AQUEENA';
$username = ''; //'sa';
$password = '';
$database = 'prestasi_mahasiswa';
$db;

try {
  // Format koneksi PDO untuk SQL Server
  $dsn = "sqlsrv:Server=$host;Database=$database";

  // Membuat koneksi PDO
  $db = new PDO($dsn, $username, $password);

  // Mengatur mode error menjadi exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "Koneksi Berhasil";
} catch (PDOException $e) {
  // Tampilkan pesan error jika koneksi gagal
  die("Koneksi gagal: " . $e->getMessage());
}

// $credential = [
//     'Database' => $database,
//     'UID' => $username,
//     'PWD' => $password
// ];
// try {
//     $db = sqlsrv_connect($host, $credential);
//     if (!$db) {
//         $msg = sqlsrv_errors();
//         die($msg[0]['message']);
//     }else{
//         echo "Koneksi Berhasil";
//     }
// } catch (Exception $e) {
//     die($e->getMessage());
// }
?>