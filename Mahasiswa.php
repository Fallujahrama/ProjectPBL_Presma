<?php
include 'db_connect.php';
include 'MahasiswaBackend.php';

$backend = new MahasiswaBackend($conn);

$namaMahasiswa = $backend->getNamaMahasiswa();
$kompetisiList = $backend->getKompetisiList();
$valid_count = $backend->getCountValid();
$belumvalid_count = $backend->getCountBelumValid();
$tidakvalid_count = $backend->getCountTidakValid();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="mahasiswa.css">
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
                  <span class="description-header">Mahasiswa</span>
                </a>
              </div>
            </div>
              <div class="main">
                <div class="list-item">
                  <a href="profileMhs.php">
                    <img src="assets/User.svg" alt="" class="icon">
                    <span class="description">Profile</span>
                  </a>
                </div>
              </div>
              <div class="main">
                <div class="list-item">
                  <a href="Mahasiswa.php" class="active">
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
          <div class="content">
            <div class="headerdua">
                <h2>Hi! <?php echo htmlspecialchars($namaMahasiswa); ?></h2>
                <div class="icon1">
                    <a href="#">
                        <img src="assets/Icons-drawer.svg" alt="" class="icon">
                    </a>
                </div>
            </div>

            <!-- Status Unggah Prestasi -->
            <div class="container-mapres">
                <img src="assets/Medal Star.svg" alt="">
                <h3>Status Unggah Prestasi</h3>
            </div><br>

            <div class="content2">
                <div class="stats">
                    <div class="card green">
                        <h4>Verified</h4>
                        <h5><?php echo $valid_count; ?></h5>
                        <div class="verified">
                          <img src="assets/Check Circle.svg" alt="">
                        </div>
                    </div>
                    <div class="card yellow">
                        <h4>In Progress</h4>
                        <h5><?php echo $belumvalid_count; ?></h5>
                        <div class="inprogress">
                          <img src="assets/Stopwatch 04.svg" alt="">
                        </div>
                    </div>
                    <div class="card red">
                        <h4>Failed</h4>
                        <h5><?php echo $tidakvalid_count; ?></h5>
                        <div class="failed">
                          <img src="assets/X circle.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info -->
            <div class="container-mapres">
                <img src="assets/Medal Star.svg" alt="">
                <h3>Info Kompetisi</h3>
            </div>

            <h6>Berikut ini berita terbaru kompetisi pada bidang yang berkaitan dengan Jurusan Teknologi Informasi. Mahasiswa disarankan untuk mengikuti rekomendasi kompetisi yang ada.</h6>
            <div class="info">
              <img src="assets/Rectangle 191.svg" alt="" class="info1">
            </div>
            <br>

            <div class="info-kompetisi">
                <!-- Card 1 -->
                <div class="kom">
                  <img src="assets/Rectangle 191.svg" class="kom-line">
                  <img src="assets/image.svg" class="kom-image">
                    <div class="kom-content">
                        <h3 class="kom-title">EPIM TI 2024</h3>
                        <p class="kom-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        <div class="kom-meta">
                            <span class="kom-author">Politeknik Negeri Jember</span>
                            <span class="kom-date">25 November 2024</span>
                        </div>
                    </div>
                  </div>
                <!-- Card 2 -->
                <div class="kom">
                  <img src="assets/Rectangle 191.svg" class="kom-line">
                  <img src="assets/image(1).svg" class="kom-image">
                    <div class="kom-content">
                        <h3 class="kom-title">EPIM TI 2024</h3>
                        <p class="kom-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        <div class="kom-meta">
                            <span class="kom-author">Politeknik Negeri Jember</span>
                            <span class="kom-date">25 November 2024</span>
                        </div>
                    </div>
                  </div>
                <!-- Card 3 -->
                <div class="kom">
                  <img src="assets/Rectangle 191.svg" class="kom-line">
                  <img src="assets/image(2).svg" class="kom-image">
                    <div class="kom-content">
                        <h3 class="kom-title">EPIM TI 2024</h3>
                        <p class="kom-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        <div class="kom-meta">
                            <span class="kom-author">Politeknik Negeri Jember</span>
                            <span class="kom-date">25 November 2024</span>
                        </div>
                    </div>
                  </div>
                <!-- Card 4 -->
                <div class="kom">
                  <img src="assets/Rectangle 191.svg" class="kom-line">
                  <img src="assets/image 2.png" class="kom-image">
                    <div class="kom-content">
                        <h3 class="kom-title">EPIM TI 2024</h3>
                        <p class="kom-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation...</p>
                        <div class="kom-meta">
                            <span class="kom-author">Politeknik Negeri Jember</span>
                            <span class="kom-date">25 November 2024</span>
                        </div>
                    </div>
                  </div>
            </div>
            <!-- Presma -->
            <div class="container-mapres">
              <img src="assets/Medal Star.svg" alt="">
              <h3>Prestasi Mahasiswa</h3>
          </div>

          <h6>Berikut ini ditampilkan data prestasi mahasiswa terkini yang telah diunggah oleh mahasiswa, data ditampilkan dalam bentuk tabel dan diurutkan berdasarkan waktu terakhir diunggah. </h6>
            <div class="info">
              <img src="assets/Rectangle 191.svg" alt="" class="info1">
            </div>
          <br>
          <div class="table-container">
              <table>
                  <thead>
                      <tr>
                          <th>NO</th>
                          <th>NAMA</th>
                          <th>JUDUL KOMPETISI</th>
                          <th>DESKRIPSI</th>
                          <th>TINGKAT</th>
                          <th>PERINGKAT</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($kompetisiList)): ?>
                        <tr>
                            <td colspan="6">Tidak ada kompetisi yang tersedia.</td>
                        </tr>
                    <?php else: ?>
                      <?php 
                        $nomor = 1;
                        foreach ($kompetisiList as $list): ?>
                        <tr>
                          <td><?php echo $nomor++ ?></td>
                          <td><?php echo htmlspecialchars($list['Nama']); ?></td>
                          <td><?php echo htmlspecialchars($list['Judul']); ?></td>
                          <td><?php echo htmlspecialchars($list['Deskripsi']); ?></td>
                          <td><span class="status"><?php echo htmlspecialchars($list['Tingkat']); ?></span></td>
                          <td><?php echo htmlspecialchars($list['Peringkat']); ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
              </table>
          </div><br><br>
        <!-- Main End -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="my_chart.js"></script>
    <script src="scriptadmin.js"></script>
</body>
</html>
