<?php
include 'db_connect.php';
include 'SuperBackend.php';

$backend = new SuperBackend($conn);
$row = $backend->getProfileAdm();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Super Admin</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar Start -->
      <div class="sidebar">
        <div class="header">
          <div class="main-content">
            <div id="menu-button">
              <input type="checkbox" id="menu-checkbox">
              <label for="menu-checkbox" id="menu-label">
                <div id="hamburger"></div>
              </label>
            </div>
          </div>
            <div class="list-item">
            </div>
            <div class="illustration">
              <a href="#">
                <img src="Logo1.png" alt="" class="icon">
                <span class="description-headerSupAdm">Super Admin</span>
              </a>
            </div>
          </div>
            <div class="main">
              <div class="list-item">
                <a href="profileSupAdm.php" class="active">
                  <img src="assets/User.svg" alt="" class="icon">
                  <span class="description">Profile</span>
                </a>
              </div>
            </div>
            <div class="main">
              <div class="list-item">
                <a href="SuperAdmin.php" >
                  <img src="assets/Dashboard Circle.svg" alt="" class="icon">
                  <span class="description">Dashboard</span>
                </a>
              </div>
            </div>
            <div class="main">
              <div class="list-item">
                <a href="datavalidasi.php">
                  <img src="assets/Collaborations Idea.svg" alt="" class="icon">
                  <span class="description">Validasi Kompetisi</span>
                </a>
              </div>
            </div>
            <div class="main">
              <div class="list-item">
                <a href="dataPresmaSup.php">
                  <img src="assets/Book.svg" alt="" class="icon">
                  <span class="description">Data Prestasi</span>
                </a>
              </div>
            </div>
      </div>
      <!-- Sidebar End -->

      <!-- Main Start -->
       <div class="container-profile">
        <div class="profile-card">
          <h2>Profil Super Admin</h2>
        <div class="subcontainer-profile">
          <p><strong>Nama:</strong> <?php echo htmlspecialchars($row['nama_admin']); ?></p><br>
          <p><strong>NIP:</strong> <?php echo htmlspecialchars($row['nip']); ?></p><br>
            <br>
            <div class="links">
              <a href="SuperAdmin.php" class="dashboard-link">Kembali ke Dashboard</a>
              <a href="logout.php" class="logout-link">Logout</a>
            </div>
        </div>
       </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="scriptadmin.js"></script>
</body>
</html>
