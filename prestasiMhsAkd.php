<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi Akademik Mahasiswa</title>
    <link rel="stylesheet" href="prestasiMhsAkd.css">
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
                  <a href="Mahasiswa.php">
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
                  <a href="prestasiMhsAkd.php" class="active">
                    <img src="assets/Book.svg" alt="" class="icon">
                    <span class="description">Data Prestasi</span>
                  </a>
                </div>
              </div>
        </div>
      <!-- Sidebar End -->

      <!-- Main Start -->
      <div class="container table-container">
        <h2>Data Prestasi Mahasiswa</h2>
        <div class="mb-4">
            <p><strong>Nama Mahasiswa:</strong> Barack Obama</p>
            <p><strong>NIM:</strong> 123456789</p>
            <p><strong>IPK:</strong> 3.89</p>
        </div><br>
        <table class="table table-bordered table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Nama Matkul</th>
                    <th>Nilai MHS</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alpa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>SIB232001</td>
                    <td>Sistem Operasi</td>
                    <td>A</td>
                    <td>1</td>
                    <td>2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>SIB232002</td>
                    <td>Basis Data</td>
                    <td>B+</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>SIB232003</td>
                    <td>Matematika Lanjut</td>
                    <td>A</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<script src="scriptadmin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>