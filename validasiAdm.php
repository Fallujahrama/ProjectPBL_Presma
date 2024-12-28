<?php
session_start();

include 'db_connect.php';

// Fetch all competitions
// $sql = "SELECT * FROM kompetisiCo";
$sql = "SELECT 
            id_kompetisi, nim, judul_kompetisi, deskripsi_kompetisi,
            instansi_penyelenggara, dosen_pembimbing,
            tingkat_kompetisi, peringkat, status_validasi
        FROM tb_kompetisi";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    // Handle error
    die(print_r(sqlsrv_errors(), true));
}

// Fetch all competitions
$competitionsList = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $competitionsList[] = $row;
}
sqlsrv_free_stmt($stmt); // Free the statement
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validasi Super Admin</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .dashboard {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            display: inline;
        }
        .btn-preview {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-preview:hover {
            background-color: #0056b3;
        }
     </style>
</head>
<body>
    <div class="dashboard">
        <!-- <h1>Welcome Super Admin Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p> -->

        <div class="dashboard-content">
            <h2>Validasi Kompetisi Mahasiswa</h2>
            <!-- Add the table for displaying the list of competitions -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nim</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Instansi Penyelenggara</th>
                        <th>Dosen Pembimbing</th>
                        <th>Tingkat Kompetisi</th>
                        <th>Peringkat</th>
                        <th>File</th>
                        <th>Foto</th>
                        <th>Sertifikat</th>
                        <th>Status Validasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($competitionsList as $competition): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($competition['id_kompetisi']); ?></td>
                            <td><?php echo htmlspecialchars($competition['nim']); ?></td>
                            <td><?php echo htmlspecialchars($competition['judul_kompetisi']); ?></td>
                            <td><?php echo htmlspecialchars($competition['deskripsi_kompetisi']); ?></td>
                            <td><?php echo htmlspecialchars($competition['instansi_penyelenggara']); ?></td>
                            <td><?php echo htmlspecialchars($competition['dosen_pembimbing']); ?></td>
                            <td><?php echo htmlspecialchars($competition['tingkat_kompetisi']); ?></td>
                            <td><?php echo htmlspecialchars($competition['peringkat']); ?></td>
                            <td><a href="viewFile.php?type=ide_karya&nim=<?php echo urlencode($competition['nim']); ?>" class="btn-preview" target="_blank">Lihat Ide Karya</a></td>
                            <td><a href="viewFile.php?type=foto_dokumentasi&nim=<?php echo urlencode($competition['nim']); ?>" class="btn-preview" target="_blank">Lihat Foto Dokumentasi</a></td>
                            <td><a href="viewFile.php?type=sertifikat&nim=<?php echo urlencode($competition['nim']); ?>" class="btn-preview" target="_blank">Lihat Sertifikat</a></td>
                            <td>
                                <form method="POST" action="updateStatus.php"> 
                                    <select name="status">
                                        <option value="Valid" <?php echo $competition['status_validasi'] === 'Valid' ? 'selected' : ''; ?>>Valid</option>
                                        <option value="Tidak Valid" <?php echo $competition['status_validasi'] === 'Tidak Valid' ? 'selected' : ''; ?>>Tidak Valid</option>
                                    </select>
                                    <input type="hidden" name="id" value="<?php echo $competition['id_kompetisi']; ?>">
                                    <input type="submit" value="Update">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <a href="SuperAdmin.php" class="back-btn">Kembali ke Dashboard</a>
    </div>
</body>
</html>