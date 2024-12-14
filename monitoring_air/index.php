<?php
require "function.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PNJ - Monitoring Maintenance Sensor</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <style>
        .button-query {}
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Dashboard</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <!-- Navbar-->

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Query</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Pusat Informasi
                        </a>

                        <div class="sb-sidenav-menu-heading">Tabel Informasi</div>
                        <a class="nav-link" href="sensor.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Sensor
                        </a>
                        <a class="nav-link" href="parameter.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Parameter Kualitas
                        </a>
                        <a class="nav-link" href="petugas.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Petugas
                        </a>
                        <a class="nav-link" href="notifikasi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Masalah Notifikasi
                        </a>
                        
                        
                        
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Monitoring Maintenance Sensor Air</h1>



                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Table Query
                        </div>
                        <html lang="id">

                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Tombol Query Database</title>
                            <link rel="stylesheet"
                                href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                            <script
                                src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

                        </head>

                        <body>
                            <form method="post" style="margin-left:20px;margin-top:15px">
                                <button class="btn btn-dark" type="submit" style="width: 30%; margin-top:10px; margin-left:10px" name="tampilkan_query1">Petugas Yang Menangani Masalah</button>
                                <button class="btn btn-dark" type="submit" style="width: 30%; margin-top:10px; margin-left:10px" name="tampilkan_query2">Jumlah Masalah Berdasarkan Sensor</button>
                                <button class="btn btn-dark" type="submit" style="width: 30%; margin-top:10px; margin-left:10px" name="tampilkan_query3">Masalah Yang Ditangani Petugas</button>
                                <button class="btn btn-dark" type="submit" style="width: 30%; margin-top:10px; margin-left:10px" name="tampilkan_query4">Rata-rata Batas Aman Setiap Parameter</button>
                                <button class="btn btn-dark" type="submit" style="width: 30%; margin-top:10px; margin-left:10px" name="tampilkan_query5">Jumlah Sensor Berdasarkan Status</button>
                                <button class="btn btn-dark" type="submit" style="width: 30%; margin-top:10px; margin-left:10px" name="tampilkan_query6">Masalah Berdasarkan Petugas</button>
                                <button class="btn btn-dark" type="submit" style="width: 30%; margin-top:10px; margin-left:10px" name="tampilkan_query7">Masalah Dengan Sensor Status Aktif</button>
                            </form>
                            <div class="card-body">

                                <?php
                                // Cek apakah tombol telah ditekan
                                if (isset($_POST['tampilkan_query1'])) {
                                    require 'query1.php'; // Memuat file get_data.php untuk menampilkan query
                                }
                                if (isset($_POST['tampilkan_query2'])) {
                                    require 'query2.php'; // Memuat file get_data.php untuk menampilkan query
                                }
                                if (isset($_POST['tampilkan_query3'])) {
                                    require 'query3.php'; // Memuat file get_data.php untuk menampilkan query
                                }
                                if (isset($_POST['tampilkan_query4'])) {
                                    require 'query4.php'; // Memuat file get_data.php untuk menampilkan query
                                }
                                if (isset($_POST['tampilkan_query5'])) {
                                    require 'query5.php'; // Memuat file get_data.php untuk menampilkan query
                                }
                                if (isset($_POST['tampilkan_query6'])) {
                                    require 'query6.php'; // Memuat file get_data.php untuk menampilkan query
                                }
                                if (isset($_POST['tampilkan_query7'])) {
                                    require 'query7.php'; // Memuat file get_data.php untuk menampilkan query
                                }
                                ?>
                            </div>
                            </body>

                        </html>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>