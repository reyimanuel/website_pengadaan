<?php 
require 'function.php';

$data = query('SELECT * FROM barang_vendor');
$data2 = query('SELECT * FROM rfq');

if (isset($_POST["submit"])) {

    if( tambah2($_POST) > 0)  {
     echo "<script> 
     alert('Data berhasil ditambahkan!');
     document.location.href = 'vendor.php';
     </script>";
    } else {
     echo "<script> 
     alert('Data gagal ditambahkan!');
     document.location.href = 'vendor.php';
     </script>";
    }
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="stylesVendor.css" />
    <title>LagalTang</title>
</head>

<body>

<!------ SIDEBAR START --------------------------------------------------------------------------------->
    <div class="d-flex" id="wrapper">
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
<!--SIDEBAR END ---------------------------------------------------------------------------------------->

<!--CONTENT START--------------------------------------------------------------------------------------->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Vendor</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="fal  se" aria-label="Toggle navigation">
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
                                <li><a class="dropdown-item" href="logout.php">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <div class="container-fluid px-4">
                <h3 class="fs-4 mb-3">Kirim Penawaran Barang</h3>

                <form action="" method="post">
                <div class="row flex-row">
                    <div class="col-md-4">
                        <label for="ID_Barang" class="form-label fw-bold">ID Barang</label>
                        <input type="text" name="ID_Barang" id="ID_Barang" class="form-control" placeholder="ID Barang" aria-label="First name">
                    </div>
                    <div class="col-md-4">
                        <label for="Nama_Barang" class="form-label fw-bold">Nama Barang</label>
                        <input type="text" name="Nama_Barang" id="Nama_Barang" class="form-control" placeholder="Nama Barang" aria-label="First name">
                    </div>
                    <div class="col-md-4">
                        <label for="Jumlah" class="form-label fw-bold">Jumlah</label>
                        <input type="number" name="Jumlah" id="Jumlah" class="form-control" placeholder="jumlah" aria-label="Last name">
                    </div>
                    <div class="col-md-4">
                        <label for="Satuan" class="form-label fw-bold">Satuan</label>
                        <input type="text" name="Satuan" id="Satuan" class="form-control" placeholder="Satuan" aria-label="Last name">
                    </div>
                    <div class="col-md-4">
                        <label for="Harga" class="form-label fw-bold">Harga</label>
                        <input type="number" name="Harga" id="Harga" class="form-control" placeholder="Harga" aria-label="Last name">
                    </div>
                </div>
                  <div class="d-md-flex gap-2 justify-content-md-end">
                  <button type="submit" class="btn btn-success d-grid my-3" name="submit">Input</button>
                  </div>
            </form>

                 <div class="row">
                    <hr color="black">
                    <h3 class="fs-4 mb-3">Daftar Penawaran</h3>
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
                                  <th scope="col">aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php $i = 1; ?>
                              <?php foreach($data as $row) : ?>
                                <tr>
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $row["ID_Barang"]; ?></td>
                                  <td><?= $row["Nama_Barang"]; ?></td>
                                  <td><?= $row["Jumlah"]; ?></td>
                                  <td><?= $row["Satuan"]; ?></td>
                                  <td><?= $row["Harga"]; ?></td>
                                  <td>
                                    <!-- Button trigger modal -->
                                    <a href="fungsiUbah2.php?no=<?= $row["No"]; ?>" class="btn btn-success btn-sm" role="button">edit</a>
                                    <a href="fungsiHapus2.php?no=<?= $row["No"]; ?>" onclick="return confirm('Apakah anda yakin?'); " class="btn btn-danger btn-sm" role="button">hapus</a>
                                  </td>
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
                                <th scope="col">Deadline</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
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
                                  <td><?= $row["Deadline"]; ?></td>
                                  <td><?= $row["Harga"]; ?></td>
                                  <td><?= $row["Status"]; ?></td>
                                  <td>
                                  <a href="fungsiSetuju2.php?no=<?= $row["No"]; ?>"  onclick="return confirm('Apakah anda yakin?'); " class="btn btn-success btn-sm" role="button">Terima</a>
                                    <a href="fungsiTolak2.php?no=<?= $row["No"]; ?>" onclick="return confirm('Apakah anda yakin?'); " class="btn btn-danger btn-sm" role="button">Tolak</a>
                                  </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<!-- CONTENT END---------------------------------------------------------------------------------------->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>