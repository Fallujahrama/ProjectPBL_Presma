<?php
session_start();

// Check if user is logged in and has admin role
if (!isset($_SESSION['username']) || $_SESSION['role'] !=='Admin') {
    header("Location: loginPage.php");
    exit();
}

include 'db_connect.php';

// Fetch all competitions
$sql = "SELECT * FROM kompetisi";
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
    <title>Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
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
     </style>
</head>
<body>
    <div class="dashboard">
        <h1>Welcome Admin Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        
        <!-- Add admin-specific content here -->
        <div class="dashboard-content">
            <h2>Admin Controls</h2>
            <!-- Add your admin-specific features here -->
            <h2>List of Competitions</h2>
            <!-- Add the table for displaying the list of competitions -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Instansi Penyelenggara</th>
                        <th>Dosen Pembimbing</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Tingkat Kompetisi</th>
                        <th>Peringkat</th>
                        <th>File Ide Karya</th>
                        <th>File Foto Dokumentasi</th>
                        <th>File Sertifikat</th>
                        <th>Status Validasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($competitionsList as $competition): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($competition['id_kompetisi']); ?></td>
                            <td><?php echo htmlspecialchars($competition['judul_kompetisi']); ?></td>
                            <td><?php echo htmlspecialchars($competition['deskripsi_kompetisi']); ?></td>
                            <td><?php echo htmlspecialchars($competition['instansi_penyelenggara']); ?></td>
                            <td><?php echo htmlspecialchars($competition['dosen_pembimbing']); ?></td>
                            <td><?php echo htmlspecialchars($competition['tgl_mulai'] instanceof DateTime ? $competition['tgl_mulai']->format('Y-m-d') : $competition['tgl_mulai']); ?></td>
                            <td><?php echo htmlspecialchars($competition['tgl_selesai'] instanceof DateTime ? $competition['tgl_selesai']->format('Y-m-d') : $competition['tgl_selesai']); ?></td>
                            <td><?php echo htmlspecialchars($competition['tingkat_kompetisi']); ?></td>
                            <td><?php echo htmlspecialchars($competition['peringkat']); ?></td>
                            <td><?php echo htmlspecialchars($competition['file_ide_karya']); ?></td>
                            <td><?php echo htmlspecialchars($competition['file_foto_dokumentasi']); ?></td>
                            <td><?php echo htmlspecialchars($competition['file_sertifikat']); ?></td>
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
        
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>