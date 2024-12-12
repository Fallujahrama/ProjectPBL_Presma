<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="datavalidasi.css">
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
                    <span class="description-header">Admin</span>
                  </a>
                </div>
              </div>
                <div class="main">
                  <div class="list-item">
                    <a href="#">
                      <img src="assets/User.svg" alt="" class="icon">
                      <span class="description">Account</span>
                    </a>
                  </div>
                </div>
                <div class="main">
                  <div class="list-item">
                    <a href="#">
                      <img src="assets/Dashboard Circle.svg" alt="" class="icon">
                      <span class="description">Dashboard</span>
                    </a>
                  </div>
                </div>
                <div class="main">
                  <div class="list-item">
                    <a href="#" class="active">
                      <img src="assets/Collaborations Idea.svg" alt="" class="icon">
                      <span class="description">Validasi</span>
                    </a>
                  </div>
                </div>
                <div class="main">
                  <div class="list-item">
                    <a href="#">
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
                <h2>Validasi</h2>
                <div class="icon1">
                    <a href="#">
                        <img src="assets/Icons-drawer.svg" alt="" class="icon">
                    </a>
                </div>
            </div><br>

            <table class="table table-bordered text-center align-middle table-hover">
            <thead class="table-primary">
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
                <tr>
                    <td>1</td>
                    <td>2341760001</td>
                    <td>coba debug</td>
                    <td>trial</td>
                    <td>debug</td>
                    <td>nyoba debug</td>
                    <td>Nasional</td>
                    <td>Coba Debug</td>
                    <td><a href="viewFile.php?type=sertifikat&nim=<?php echo urlencode($competition['nim']); ?>" class="btn-preview" target="_blank">Lihat Sertifikat</a></td>
                    <td><a href="viewFile.php?type=ide_karya&nim=<?php echo urlencode($competition['nim']); ?>" class="btn-preview" target="_blank">Lihat Ide Karya</a></td>
                    <td><a href="viewFile.php?type=foto_dokumentasi&nim=<?php echo urlencode($competition['nim']); ?>" class="btn-preview" target="_blank">Lihat Foto Dokumentasi</a></td>
                    <td>
                        <select class="form-select form-select-sm d-inline-block w-auto">
                            <option value="valid">.....</option>
                            <option value="valid">Valid</option>
                            <option value="invalid">Invalid</option>
                        </select>
                        <button class="btn btn-success btn-sm">Update</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2341760003</td>
                    <td>GEMASTIK XVI</td>
                    <td>GEMASTIK XVI</td>
                    <td>Kemendikbud</td>
                    <td>Pak Bagas</td>
                    <td>Regional</td>
                    <td>Juara 3</td>
                    <td><a href="viewFile.php?type=sertifikat&nim=<?php echo urlencode($competition['nim']); ?>" class="btn-preview" target="_blank">Lihat Sertifikat</a></td>
                    <td><a href="viewFile.php?type=ide_karya&nim=<?php echo urlencode($competition['nim']); ?>" class="btn-preview" target="_blank">Lihat Ide Karya</a></td>
                    <td><a href="viewFile.php?type=foto_dokumentasi&nim=<?php echo urlencode($competition['nim']); ?>" class="btn-preview" target="_blank">Lihat Foto Dokumentasi</a></td>
                    <td>
                        <select class="form-select form-select-sm d-inline-block w-auto">
                            <option value="valid">.....</option>
                            <option value="valid">Valid</option>
                            <option value="invalid">Invalid</option>
                        </select>
                        <button class="btn btn-success btn-sm">Update</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
           <!-- Main End -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="scriptadmin.js"></script>
</body>
</html>