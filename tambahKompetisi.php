<?php
session_start();

// Check if user is logged in and has Mahasiswa role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Mahasiswa') {
    header("Location: loginPage.php");
    exit();
}

// Include the database connection
include 'db_connect.php'; // Pastikan ini mengarah ke file yang benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $judul_kompetisi = $_POST['judul_kompetisi'];
    $deskripsi_kompetisi = $_POST['deskripsi_kompetisi'];
    $instansi_penyelenggara = $_POST['instansi_penyelenggara'];
    $dosen_pembimbing = $_POST['dosen_pembimbing'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $tingkat_kompetisi = $_POST['tingkat_kompetisi'];
    $peringkat = $_POST['peringkat'];

    // Ambil NIM mahasiswa dari sesi login
    $nim = $_SESSION['username']; // Pastikan $_SESSION['nim'] sudah di-set saat login

    // Upload files
    $file_ide_karya = $_FILES['file_ide_karya']['name'];
    $file_foto_dokumentasi = $_FILES['file_foto_dokumentasi']['name'];
    $file_sertifikat = $_FILES['file_sertifikat']['name'];

    // Directory to store uploaded files
    $target_dir = "uploads/";
    move_uploaded_file($_FILES['file_ide_karya']['tmp_name'], $target_dir . $file_ide_karya);
    move_uploaded_file($_FILES['file_foto_dokumentasi']['tmp_name'], $target_dir . $file_foto_dokumentasi);
    move_uploaded_file($_FILES['file_sertifikat']['tmp_name'], $target_dir . $file_sertifikat);

    // Ambil NIM mahasiswa berdasarkan username
    $sql_nim = "SELECT nim FROM mahasiswa WHERE nim = ?";
    $params = array($_SESSION['username']);
    $stmt_nim = sqlsrv_query($conn, $sql_nim, $params);

    if ($stmt_nim === false || !sqlsrv_has_rows($stmt_nim)) {
        die("Error: Data mahasiswa tidak ditemukan.");
    }

    $row = sqlsrv_fetch_array($stmt_nim, SQLSRV_FETCH_ASSOC);
    $nim = $row['nim'];

    // Set CONTEXT_INFO dengan NIM
    $nim_hex = bin2hex($nim);
    $sql_context = "SET CONTEXT_INFO 0x" . $nim_hex;
    sqlsrv_query($conn, $sql_context);

    // Query untuk menyimpan data ke tabel kompetisi
    $sql = "INSERT INTO kompetisi (judul_kompetisi, deskripsi_kompetisi, instansi_penyelenggara, dosen_pembimbing, tgl_mulai, tgl_selesai, tingkat_kompetisi, peringkat, file_ide_karya, file_foto_dokumentasi, file_sertifikat, status_validasi) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Belum divalidasi')";
    $params = array($judul_kompetisi, $deskripsi_kompetisi, $instansi_penyelenggara, $dosen_pembimbing, $tgl_mulai, $tgl_selesai, $tingkat_kompetisi, $peringkat, $file_ide_karya, $file_foto_dokumentasi, $file_sertifikat);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        // Handle error
        die(print_r(sqlsrv_errors(), true));
    }

    // Ambil ID kompetisi terakhir yang baru ditambahkan
    $sql_last_id = "SELECT SCOPE_IDENTITY() AS last_id";
    $stmt_last_id = sqlsrv_query($conn, $sql_last_id);
    if ($stmt_last_id === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($stmt_last_id, SQLSRV_FETCH_ASSOC);
    $id_kompetisi = $row['last_id'];

    // // Insert data ke tabel list_kompetisi
    $sql_list_kompetisi = "INSERT INTO list_kompetisi (id_kompetisi, nim) VALUES (?, ?)";
    $params_list = array($id_kompetisi, $nim);
    $stmt_list = sqlsrv_query($conn, $sql_list_kompetisi, $params_list);

    if ($stmt_list === false) {
        // Handle error
        die(print_r(sqlsrv_errors(), true));
    }

    // Redirect to dashboard after successful insertion
    header("Location: dashMhs.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kompetisi</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="date"], textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .back-btn {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #5cb85c;
        }
        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Kompetisi</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="judul_kompetisi">Judul Kompetisi:</label>
            <input type="text" id="judul_kompetisi" name="judul_kompetisi" required>

            <label for="deskripsi_kompetisi">Deskripsi Kompetisi:</label>
            <textarea id="deskripsi_kompetisi" name="deskripsi_kompetisi" required></textarea>

            <label for="instansi_penyelenggara">Instansi Penyelenggara:</label>
            <input type="text" id="instansi_penyelenggara" name="instansi_penyelenggara" required>

            <label for="dosen_pembimbing">Dosen Pembimbing:</label>
            <input type="text" id="dosen_pembimbing" name="dosen_pembimbing" required>

            <label for="tgl_mulai">Tanggal Mulai:</label>
            <input type="date" id="tgl_mulai" name="tgl_mulai" required>

            <label for="tgl_selesai">Tanggal Selesai:</label>
            <input type="date" id="tgl_selesai" name="tgl_selesai" required>

            <label for="tingkat_kompetisi">Tingkat Kompetisi:</label>
            <select id="tingkat_kompetisi" name="tingkat_kompetisi" required>
                <option value="Nasional">Nasional</option>
                <option value="Regional">Regional</option>
                <option value="Lokal">Lokal</option>
            </select>

            <label for="peringkat">Peringkat:</label>
            <input type="text" id="peringkat" name="peringkat" required>

            <label for="file_ide_karya">File Ide Karya:</label>
            <input type="file" id="file_ide_karya" name="file_ide_karya" required>

            <label for="file_foto_dokumentasi">File Foto Dokumentasi:</label>
            <input type="file" id="file_foto_dokumentasi" name="file_foto_dokumentasi" required>

            <label for="file_sertifikat">File Sertifikat:</label>
            <input type="file" id="file_sertifikat" name="file_sertifikat" required>

            <button type="submit">Tambah Kompetisi</button>
        </form>
        <a href="dashMhs.php" class="back-btn">Kembali ke Dashboard</a>
    </div>
</body>
</html>