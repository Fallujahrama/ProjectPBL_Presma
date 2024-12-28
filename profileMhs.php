<?php
include 'db_connect.php';
include 'MahasiswaBackend.php';

$backend = new MahasiswaBackend($conn);

$row = $backend->getProfileMhs();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Mahasiswa</title>
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
                <span class="description-headerMhs">Mahasiswa</span>
              </a>
            </div>
          </div>
            <div class="main">
              <div class="list-item">
                <a href="profileMhs.php" class="active">
                  <img src="assets/User.svg" alt="" class="icon">
                  <span class="description">Profile</span>
                </a>
              </div>
            </div>
            <div class="main">
              <div class="list-item">
                <a href="Mahasiswa.php" >
                  <img src="assets/Dashboard Circle.svg" alt="" class="icon">
                  <span class="description">Dashboard</span>
                </a>
              </div>
            </div>
            <div class="main">
              <div class="list-item">
                <a href="inputKompetisi.php">
                  <img src="assets/Collaborations Idea.svg" alt="" class="icon">
                  <span class="description">Input Kompetisi</span>
                </a>
              </div>
            </div>
            <div class="main">
              <div class="list-item">
                <a href="prestasiMhsAkd.php">
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
          <h2>Profil Mahasiswa</h2>
        <div class="subcontainer-profile">
            <p id="nim"><strong>NIM:</strong> <?php echo htmlspecialchars($row['nim']); ?></p><br>
            <p id="nama"><strong>Nama:</strong> <?php echo htmlspecialchars($row['nama_mhs']); ?></p><br>
            <p id="kelas"><strong>Kelas:</strong> <?php echo htmlspecialchars($row['kelas']); ?></p><br>
            <p id="prodi"><strong>Program Studi:</strong> <?php echo htmlspecialchars($row['prodi']); ?></p><br>
            <br>
            <div class="links">
              <a href="Mahasiswa.php" class="dashboard-link">Kembali ke Dashboard</a>
              <a href="logout.php" class="logout-link">Logout</a>
            </div>
        </div>
       </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="scriptadmin.js"></script>
</body>
</html>