<?php
session_start();

// Check if user is logged in and has supadmin role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Mahasiswa') {
    header("Location: loginPage.php");
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

// Prepare and execute the query to get the list of competitions from the view
$sql = "SELECT NamaMahasiswa, Judul, Deskripsi, Tingkat, Peringkat FROM v_list_kompetisi";
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

sqlsrv_free_stmt($stmt); // Free the statement
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mahasiswa Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <h1>Welcome Mahasiswa Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($namaMahasiswa); ?>!</p>
        
        <!-- Add super admin-specific content here -->
        <div class="dashboard-content">
            <h2>Mahasiswa Controls</h2>
            <h4>Tambah Kompetisi</h4>
            <a href="tambahKompetisi.php" class="logout-btn">Tambah Kompetisi</a>
            <!-- Add your super admin-specific features here -->
            <h2>List of Competitions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tingkat</th>
                        <th>Peringkat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($kompetisiList)): ?>
                        <tr>
                            <td colspan="4">Tidak ada kompetisi yang tersedia.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($kompetisiList as $kompetisi): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($kompetisi['NamaMahasiswa']); ?></td>
                                <td><?php echo htmlspecialchars($kompetisi['Judul']); ?></td>
                                <td><?php echo htmlspecialchars($kompetisi['Deskripsi']); ?></td>
                                <td><?php echo htmlspecialchars($kompetisi['Tingkat']); ?></td>
                                <td><?php echo htmlspecialchars($kompetisi['Peringkat']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>