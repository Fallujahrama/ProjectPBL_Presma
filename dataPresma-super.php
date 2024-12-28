<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prestasi – Admin</title>
    <link rel="stylesheet" href="dataPresma-Admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- Sidebar Start --> <div class="container container-fluid">
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
                <a href="SuperAdmin.php">
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
                <a href="dataPresma-super.php" class="active">
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
                <h2>Data Prestasi</h2>
                <div class="icon1">
                    <a href="#">
                        <img src="assets/Icons-drawer.svg" alt="" class="icon">
                    </a>
                </div><br>
                <!-- 
              <div class="download-semua">
                  <div class="download">
                      <a href="#">
                          <div class="overlap-group"><img class="tone" src="assets/Download.svg" alt="Download"></div>
                      </a>
                  </div>
                <td class="status">Download semua file
            </td> -->
                <!-- </div> -->

                <div class="box">
                    <div class="bg">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Prodi</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Teknik Informatika</td>
                                    <td>1A</td>
                                    <td><button class="lihat" data-bs-toggle="modal"
                                            data-bs-target="#modalTI1A">Lihat</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Teknik Informatika</td>
                                    <td>1B</td>
                                    <td><button class="lihat" data-bs-toggle="modal"
                                            data-bs-target="#modalTI1B">Lihat</button></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Teknik Informatika</td>
                                    <td>1C</td>
                                    <td><button class="lihat" data-bs-toggle="modal"
                                            data-bs-target="#modalTI1C">Lihat</button></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Teknik Informatika</td>
                                    <td>2B</td>
                                    <td><button class="lihat" data-bs-toggle="modal"
                                            data-bs-target="#modalTI2B">Lihat</button></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Teknik Informatika</td>
                                    <td>2C</td>
                                    <td><button class="lihat" data-bs-toggle="modal"
                                            data-bs-target="#modalTI2C">Lihat</button></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Sistem Informasi Bisnis</td>
                                    <td>1A</td>
                                    <td><button class="lihat" data-bs-toggle="modal"
                                            data-bs-target="#modalSIB1A">Lihat</button></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Sistem Informasi Bisnis</td>
                                    <td>1B</td>
                                    <td><button class="lihat" data-bs-toggle="modal"
                                            data-bs-target="#modalSIB1B">Lihat</button></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Sistem Informasi Bisnis</td>
                                    <td>1D</td>
                                    <td><button class="lihat" data-bs-toggle="modal"
                                            data-bs-target="#modalSIB1D">Lihat</button></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Sistem Informasi Bisnis</td>
                                    <td>1F</td>
                                    <td><button class="lihat" data-bs-toggle="modal"
                                            data-bs-target="#modalSIB1F">Lihat</button></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Piranti Perangkat Lunak Situs</td>
                                    <td>1A</td>
                                    <td><button class="lihat" data-bs-toggle="modal"
                                            data-bs-target="#modalPPLS1A">Lihat</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Main End -->
                <!-- Modal untuk setiap kelas -->

                <!-- Modal TI Kelas 1A -->
                <div class="modal fade" id="modalTI1A" tabindex="-1" aria-labelledby="modalTI1ALabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTI1ALabel">Detail Mahasiswa - TI Kelas 1A</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Dosen Pembimbing Akademik : Adevian Fairuz Pratama, S.S.T, M.Eng. </h6>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alpa</th>
                                            <th>IPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Citra</td>
                                            <td>789012</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>3.7</td>
                                        </tr>
                                        <tr>
                                            <td>Doni</td>
                                            <td>210987</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>3.6</td>
                                        </tr>
                                        <!-- Tambahkan Data Mahasiswa Lainnya -->

                                    </tbody>

                                </table>
                                <h6>IPK Rata-rata : </h6>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal TI Kelas 1B -->
                <div class="modal fade" id="modalTI1B" tabindex="-1" aria-labelledby="modalTI1BLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTI1BLabel">Detail Mahasiswa - TI Kelas 1B</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Dosen Pembimbing Akademik : Dr. Eng. Banni Satria Andoko, S.Kom., M.MSI.
                                        </h6>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alpa</th>
                                            <th>IPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Citra</td>
                                            <td>789012</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>3.7</td>
                                        </tr>
                                        <tr>
                                            <td>Doni</td>
                                            <td>210987</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>3.6</td>
                                        </tr>
                                        <!-- Tambahkan Data Mahasiswa Lainnya -->
                                    </tbody>
                                </table>
                                <h6>IPK Rata-rata : </h6>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal TI Kelas 1C -->
                <div class="modal fade" id="modalTI1C" tabindex="-1" aria-labelledby="modalTI1CLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTI1CLabel">Detail Mahasiswa - TI Kelas 1C</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Dosen Pembimbing Akademik : Irsyad Arif Mashudi, S.Kom., M.Kom. </h6>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alpa</th>
                                            <th>IPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Citra</td>
                                            <td>789012</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>3.7</td>
                                        </tr>
                                        <tr>
                                            <td>Doni</td>
                                            <td>210987</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>3.6</td>
                                        </tr>
                                        <!-- Tambahkan Data Mahasiswa Lainnya -->
                                    </tbody>
                                </table>
                                <h6>IPK Rata-rata : </h6>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal TI Kelas 2B -->
                <div class="modal fade" id="modalTI2B" tabindex="-1" aria-labelledby="modalTI2BLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTI2BLabel">Detail Mahasiswa - TI Kelas 2B</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Dosen Pembimbing Akademik : Meyti Eka Apriyani, S.T., M.T. </h6>

                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alpa</th>
                                            <th>IPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Citra</td>
                                            <td>789012</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>3.7</td>
                                        </tr>
                                        <tr>
                                            <td>Doni</td>
                                            <td>210987</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>3.6</td>
                                        </tr>
                                        <!-- Tambahkan Data Mahasiswa Lainnya -->
                                    </tbody>
                                </table>
                                <h6>IPK Rata-rata : </h6>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal TI Kelas 2C -->
                <div class="modal fade" id="modalTI2C" tabindex="-1" aria-labelledby="modalTI2CLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTI2CLabel">Detail Mahasiswa - TI Kelas 2C</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Dosen Pembimbing Akademik : Eka Larasati Amalia, S.ST., M.T. </h6>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alpa</th>
                                            <th>IPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Citra</td>
                                            <td>789012</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>3.7</td>
                                        </tr>
                                        <tr>
                                            <td>Doni</td>
                                            <td>210987</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>3.6</td>
                                        </tr>
                                        <!-- Tambahkan Data Mahasiswa Lainnya -->
                                    </tbody>
                                </table>
                                <h6>IPK Rata-rata : </h6>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal SIB Kelas 1A -->
                <div class="modal fade" id="modalSIB1A" tabindex="-1" aria-labelledby="modalSIB1ALabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSIB1ALabel">Detail Mahasiswa - SIB Kelas 1A</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Dosen Pembimbing Akademik : Muhammad Unggul Pamenang, S.ST., M.T. </h6>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alpa</th>
                                            <th>IPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Citra</td>
                                            <td>789012</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>3.7</td>
                                        </tr>
                                        <tr>
                                            <td>Doni</td>
                                            <td>210987</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>3.6</td>
                                        </tr>
                                        <!-- Tambahkan Data Mahasiswa Lainnya -->
                                    </tbody>
                                </table>
                                <h6>IPK Rata-rata : </h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal SIB Kelas 1B -->
                <div class="modal fade" id="modalSIB1B" tabindex="-1" aria-labelledby="modalSIB1BLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSIB1BLabel">Detail Mahasiswa - SIB Kelas 1B</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Dosen Pembimbing Akademik : Pramana Yoga Saputra, S.Kom., M.MT. </h6>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alpa</th>
                                            <th>IPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Citra</td>
                                            <td>789012</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>3.7</td>
                                        </tr>
                                        <tr>
                                            <td>Doni</td>
                                            <td>210987</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>3.6</td>
                                        </tr>
                                        <!-- Tambahkan Data Mahasiswa Lainnya -->

                                    </tbody>
                                </table>
                                <h6>IPK Rata-rata : </h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal SIB Kelas 1D -->
                <div class="modal fade" id="modalSIB1D" tabindex="-1" aria-labelledby="modalSIB1DLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSIB1DLabel">Detail Mahasiswa - SIB Kelas 1D</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Dosen Pembimbing Akademik : Dr. Eng. Rosa Andrie Asmara, S.T., M.T. </h6>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alpa</th>
                                            <th>IPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Citra</td>
                                            <td>789012</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>3.7</td>
                                        </tr>
                                        <tr>
                                            <td>Doni</td>
                                            <td>210987</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>3.6</td>
                                        </tr>
                                        <!-- Tambahkan Data Mahasiswa Lainnya -->
                                    </tbody>
                                </table>
                                <h6>IPK Rata-rata : </h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal SIB Kelas 1F -->
                <div class="modal fade" id="modalSIB1F" tabindex="-1" aria-labelledby="modalSIB1FLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSIB1FLabel">Detail Mahasiswa - SIB Kelas 1B</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Dosen Pembimbing Akademik : Vivin Ayu Lestari, S.Pd., M.Kom. </h6>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alpa</th>
                                            <th>IPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Citra</td>
                                            <td>789012</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>3.7</td>
                                        </tr>
                                        <tr>
                                            <td>Doni</td>
                                            <td>210987</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>3.6</td>
                                        </tr>
                                        <!-- Tambahkan Data Mahasiswa Lainnya -->
                                    </tbody>
                                </table>
                                <h6>IPK Rata-rata : </h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal PPLS Kelas 1A -->
                <div class="modal fade" id="modalPPLS1A" tabindex="-1" aria-labelledby="modalPPLS1ALabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalPPLS1ALabel">Detail Nilai Mahasiswa - PPLS Kelas 1A
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Dosen Pembimbing Akademik : Rokhimatul Wakhidah, S.Pd., M.T. </h6>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alpa</th>
                                            <th>IPK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Citra</td>
                                            <td>789012</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>3.7</td>
                                        </tr>
                                        <tr>
                                            <td>Doni</td>
                                            <td>210987</td>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>3.6</td>
                                        </tr>
                                        <!-- Tambahkan Data Mahasiswa Lainnya -->
                                    </tbody>
                                </table>
                                <h6>IPK Rata-rata : </h6>
                                y
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
            integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="my_chart.js"></script>
        <script src="scriptadmin.js"></script>
    </div>

</body>

</html>