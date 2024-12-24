<?php
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
  
  include 'MahasiswaBackend.php';
  include 'db_connect.php';

  $backend = new MahasiswaBackend($conn);
  $tambahKompetisi = $backend->tambahKompetisi($judul_kompetisi, $deskripsi_kompetisi, 
  $instansi_penyelenggara, $dosen_pembimbing, $tgl_mulai, $tgl_selesai, $tingkat_kompetisi, 
  $peringkat, $_FILES['file_ide_karya'], $_FILES['file_foto_dokumentasi'], $_FILES['file_sertifikat']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="input.css">
    <title>Input Data Prestasi</title>
    <script>
        function openFileInNewTab(input) {
            const file = input.files[0];
            if (file) {
                const fileURL = URL.createObjectURL(file);
                window.open(fileURL, '_blank');
            }
        }
    </script>
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
                    <a href="#" class="active">
                      <img src="assets/Collaborations Idea.svg" alt="" class="icon">
                      <span class="description">Input Prestasi</span>
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

          <!-- Main Content Start -->
          <div class="label">
              <!-- Teks di luar kotak -->
              <div class="container-mapres">
                <img src="assets/Medal Star.svg" alt="">
                <h3>Prestasi Mahasiswa</h3>
            </div>
            <br>
      
              <!-- Kotak -->
              <div class="box">
                  <div class="rectangle">
                      <div class="datakom">
                          <div class="text-wrappers">Tambah Kompetisi</div>
      
                          <!-- Form Fields -->
                          <form method="POST" action="" enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="judul_kompetisi">Judul Kompetisi <span>*</span></label>
                              <input type="text" id="judul_kompetisi" name="judul_kompetisi" required>
                          </div>
                          <div class="form-group">
                              <label for="deskripsi_kompetisi">Deskripsi Kompetisi <span>*</span></label>
                              <textarea id="deskripsi_kompetisi" name="deskripsi_kompetisi" required></textarea>
                          </div>
                          <div class="form-group">
                              <label for="instansi_penyelenggara">Instansi Penyelenggara <span>*</span></label>
                              <input type="text" id="instansi_penyelenggara" name="instansi_penyelenggara" required>
                          </div>
                          <div class="form-group">
                              <label for="dosen_pembimbing">Dosen Pembimbing <span>*</span></label>
                              <input type="text" id="dosen_pembimbing" name="dosen_pembimbing" required>
                          </div>
                          <div class="form-group">
                              <label for="tgl_mulai">Tanggal Mulai <span>*</span></label>
                              <input type="date" id="tgl_mulai" name="tgl_mulai" required>
                          </div>
                          <div class="form-group">
                              <label for="tgl_selesai">Tanggal Selesai <span>*</span></label>
                              <input type="date" id="tgl_selesai" name="tgl_selesai" required>
                          </div>
                          <div class="form-group">
                            <label for="tingkat_kompetisi">Tingkat Kompetisi <span>*</span></label>
                            <select id="tingkat_kompetisi" name="tingkat_kompetisi" required>
                                <option value="Nasional">Nasional</option>
                                <option value="Regional">Regional</option>
                                <option value="Lokal">Lokal</option>
                            </select>
                          </div>
                          
                          <div class="form-group">
                              <label for="peringkat">Peringkat <span>*</span></label>
                              <input type="text" id="peringkat" name="peringkat" required>
                          </div>
                          <!-- file -->
                          <div class="form-groups">
                              <label for="file_ide_karya">File Ide Karya <span>*</span></label>
                              <input type="file" id="file_ide_karya" name="file_ide_karya" required>
                              <button type="button" class="preview-btn" onclick="openFileInNewTab(document.getElementById('file_ide_karya'))">Preview</button>
                          </div>
                          <div class="form-groups">
                              <label for="file_foto_dokumentasi">File Foto Dokumentasi <span>*</span></label>
                              <input type="file" id="file_foto_dokumentasi" name="file_foto_dokumentasi" required>
                              <button type="button" class="preview-btn" onclick="openFileInNewTab(document.getElementById('file_foto_dokumentasi'))">Preview</button>
                          </div>
                          <div class="form-groups">
                              <label for="file_sertifikat">File Sertifikat <span>*</span></label>
                              <input type="file" id="file_sertifikat" name="file_sertifikat" required>
                              <button type="button" class="preview-btn" onclick="openFileInNewTab(document.getElementById('file_sertifikat'))">Preview</button>
                          </div>
                          <button type="submit" class="tambahKompetisi">Tambah Kompetisi</button> <br>
                          </form>
                        </div>
                          <a href="Mahasiswa.php" class="backDash">Kembali</a>
                      </div>
                </div>
          </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="scriptadmin.js"></script>
</body>

</html>
