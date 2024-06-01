<?php
require 'function.php';

$data1 = query('SELECT * FROM rfq');
$data2 = query('SELECT * FROM barang_vendor');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="stylesHome.css" />
    <title>LagalTang</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>LagalTang</div>
            <div class="list-group list-group-flush my-3">
                <a href="home2.php"  class="list-group-item list-group-item-action fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="vendor.php" class="list-group-item list-group-item-action fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Vendor</a>
                <a href="komunikasi.php" class="list-group-item list-group-item-action fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Hubungi Manager Pengadaan</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Vendor
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Daftar Penawaran</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                <th style="width: 30px;" scope="col">No</th>
                                  <th scope="col">ID Barang</th>
                                  <th scope="col">Nama Barang</th>
                                  <th scope="col">Jumlah</th>
                                  <th scope="col">Satuan</th>
                                  <th scope="col">Harga</th>
                                  <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($data2 as $row) : ?>
                                <tr>
                                <th scope="row"><?= $i; ?></th>
                                        <td><?= $row["ID_Barang"]; ?></td>
                                        <td><?= $row["Nama_Barang"]; ?></td>
                                        <td><?= $row["Jumlah"]; ?></td>
                                        <td><?= $row["Satuan"]; ?></td>
                                        <td><?= $row["Harga"]; ?></td>
                                        <td><?= $row["Status"]; ?></td>
                                </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                        <div class="row">
                                    <hr color="black">
                                    <h3 class="fs-4 mb-3">Daftar RFQ</h3>
                                    <div class="col">
                                    <table class="table bg-white rounded shadow-sm table-bordered">
                                <thead>       
                                    <tr>
                                        <th style="width: 30px;" scope="col">No</th>
                                        <th scope="col">ID Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($data1 as $row) : ?>
                                        <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $row["ID_Barang"]; ?></td>
                                        <td><?= $row["Nama_Barang"]; ?></td>
                                        <td><?= $row["Jumlah"]; ?></td>
                                        <td><?= $row["Satuan"]; ?></td>
                                        <td><?= $row["Harga"]; ?></td>
                                        <td><?= $row["Status"]; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </table>
                            </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>