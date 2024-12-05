<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: loginPage.php");
    exit();
}

// Include koneksi database
include 'db_connect.php'; // Pastikan ini mengarah ke file yang benar

// Ambil NIM dari session
$nim = $_SESSION['username']; // Asumsi username adalah NIM

// Query untuk mengambil data mahasiswa berdasarkan NIM
$sql = "SELECT * FROM v_profilMahasiswa WHERE nim = ?";
$params = array($nim);
$stmt = sqlsrv_query($conn, $sql, $params);

// Cek apakah query berhasil dan ada hasil
if ($stmt === false || !sqlsrv_has_rows($stmt)) {
    die("Error: Data profil tidak ditemukan.");
}

// Ambil data mahasiswa
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .profile-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info label {
            font-weight: bold;
            color: #555;
        }
        .profile-info p {
            margin: 5px 0;
            color: #666;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #5cb85c;
            font-weight: bold;
        }
        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h1>Profil Mahasiswa</h1>
    <div class="profile-info">
        <label for="nim">NIM:</label>
        <p id="nim"><?php echo htmlspecialchars($row['nim']); ?></p>
        
        <label for="nama">Nama:</label>
        <p id="nama"><?php echo htmlspecialchars($row['nama_mhs']); ?></p>
        
        <label for="kelas">Kelas:</label>
        <p id="kelas"><?php echo htmlspecialchars($row['kelas']); ?></p>
        
        <label for="prodi">Program Studi:</label>
        <p id="prodi"><?php echo htmlspecialchars($row['prodi']); ?></p>
    </div>
    <a href="dashMhs.php" class="back-btn">Kembali ke Dashboard</a>
</div>

</body>
</html>