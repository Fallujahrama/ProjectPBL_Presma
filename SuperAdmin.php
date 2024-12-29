<?php
include 'db_connect.php';
include 'SuperBackend.php';

$backend = new SuperBackend($conn);
$kompetisiList = $backend->getKompetisiList();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Super Admin</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="admin1.css">
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
                    <span class="description-header">Super Admin</span>
                  </a>
                </div>
              </div>
                <div class="main">
                  <div class="list-item">
                    <a href="profileSupAdm.php">
                      <img src="assets/User.svg" alt="" class="icon">
                      <span class="description">Profile</span>
                    </a>
                  </div>
                </div>
                <div class="main">
                  <div class="list-item">
                    <a href="SuperAdmin.php" class="active">
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
                    <a href="dataPresma-super.php">
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
                <h2>Dashboard</h2>
                <div class="icon1sup">
                    <a href="#">
                        <img src="assets/Icons-drawer.svg" alt="" class="icon">
                    </a>
                </div>
                <div class="icon2sup">
                    <a href="#">
                        <img src="assets/Icons-drawer(1).svg" alt="" class="icon">
                    </a>
                </div>
            </div>

            <!-- Aktivitas -->
            <div class="content2">
                <div class="stats">
                    <div class="card blue">
                        <h3>Total Pengguna</h3>
                        <p>150</p>
                    </div>
                    <div class="card green">
                        <h3>Laporan Hari Ini</h3>
                        <p>20 Laporan</p>
                    </div>
                    <div class="card yellow">
                        <h3>Aktivitas Terakhir</h3>
                        <p>5 Menit Lalu</p>
                    </div>
                </div>
            </div>

            <!-- Grafik Prodi -->
            <div class="container-mapres">
                <img src="assets/Medal Star.svg" alt="">
                <h3>Prestasi Mahasiswa</h3>
            </div>
            <br>
            <div class="graphBox2"><center></center>
                <div class="chart-title">Grafik Prestasi Tiap Program Studi</div>
                <div class="box">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script> 
                        const ctx = document.getElementById('myChart');
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['D4 TI', 'D4 SIB', 'D2 PPLS'],
                                datasets: [{
                                    label: 'Jumlah Mahasiswa',
                                    data: [12, 19, 3],
                                    backgroundColor: [
                                        'rgba(255, 140, 7, 0.58)',
                                        'rgba(255 , 183, 0, 0.58)',
                                        'rgba(255, 220, 0, 0.58)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 140, 7, 0.58)',
                                        'rgba(255, 183, 0, 0.58)',
                                        'rgba(255, 220, 0, 0.58)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <br><br>

            <!-- Prestasi Mahasiswa -->
            <div class="container-mapres">
                <img src="assets/Medal Star.svg" alt="">
                <h3>Data Prestasi Mahasiswa</h3>
            </div>
            <br>
            <div class="table-containersup">
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
                            <td><?php echo $nomor++; ?></td>
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
            </div>
            <br>
        </div>
        <!-- Main End -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="my_chart.js"></script>
    <script src="scriptadmin.js"></script>

</body>
</html>
