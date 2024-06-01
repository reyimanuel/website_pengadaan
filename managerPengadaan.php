<?php
require 'function.php';

if (isset($_POST["submit"])) {

    if( tambah($_POST) > 0)  {
     echo "<script> 
     alert('Data berhasil ditambahkan!');
     document.location.href = 'managerPengadaan.php';
     </script>";
    } else {
     echo "<script> 
     alert('Data gagal ditambahkan!');
     document.location.href = 'managerPengadaan.php';
     </script>";
    }
 }

 if (isset($_POST["input"])) {

    if( tambahrfq($_POST) > 0)  {
     echo "<script> 
     alert('Data berhasil ditambahkan!');
     document.location.href = 'managerPengadaan.php';
     </script>";
    } else {
     echo "<script> 
     alert('Data gagal ditambahkan!');
     document.location.href = 'managerPengadaan.php';
     </script>";
    }
 }


$data1 = query('SELECT * FROM barang');
$data2 = query('SELECT * FROM barang_vendor');
$data3 = query('SELECT * FROM rfq');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="stylesManagerPengadaan.css" />
    <title>LagalTang</title>
</head>

<body>

<!------ SIDEBAR START --------------------------------------------------------------------------------->
    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>LagalTang</div>
            <div class="list-group list-group-flush my-3">
                <a href="home.php" class="list-group-item list-group-item-action fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="managerPengadaan.php" class="list-group-item list-group-item-action fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Manager Pengadaan</a>
                <a href="komunikasi.php" class="list-group-item list-group-item-action fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Hubungi Vendor</a>
            </div>
        </div>
<!--SIDEBAR END ---------------------------------------------------------------------------------------->

<!--CONTENT START--------------------------------------------------------------------------------------->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Manager Pengadaan</h2>
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
                                <i class="fas fa-user me-2"></i>Manager Pengadaan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        <form action="" method="post">
            <div class="container-fluid px-4">
                <h3 class="fs-4 mb-3">Pengajuan RFQ</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="id_barang" class="form-label fw-bold">ID Barang</label>
                      <input type="text" name="id_barang" id="id_barang" class="form-control" placeholder="Nama Barang" aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="nama_barang" class="form-label fw-bold">Nama Barang</label>
                      <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="jumlah" class="form-label fw-bold">Jumlah</label>
                      <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="jumlah" aria-label="Last name">
                    </div>
                    <div class="col">
                        <label for="satuan" class="form-label fw-bold">Satuan</label>
                      <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan" aria-label="Last name">
                    </div>
                    <div class="col">
                        <label for="deadline" class="form-label fw-bold">Deadline</label>
                      <input type="date" name="deadline" id="deadline" class="form-control" placeholder="Deadline" aria-label="Last name">
                    </div>
                    <div class="col">
                        <label for="harga" class="form-label fw-bold">Harga</label>
                      <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" aria-label="Last name">
                    </div>
                  </div>
                  <div class="d-md-flex gap-2 justify-content-md-end">
                  <button type="submit" class="btn btn-success d-grid my-3" name="input">Input</button>  
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
                                <?php foreach($data3 as $row) : ?>
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
                                  <a href="fungsiUbah3.php?no=<?= $row["No"]; ?>"  class="btn btn-success btn-sm" role="button">Edit</a>
                                    <a href="fungsiHapus3.php?no=<?= $row["No"]; ?>" onclick="return confirm('Apakah anda yakin?'); " class="btn btn-danger btn-sm" role="button">Hapus</a>
                                  </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
            </form>
            <div class="row">
            <hr color="black">
            <div class="container-fluid px-4">
                <h3 class="fs-4 mb-3">Pengajuan Pengadaan</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="ID_Barang" class="form-label fw-bold">ID Barang</label>
                      <input type="text" name="ID_Barang" id="ID_Barang" class="form-control" placeholder="Nama Barang" aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="Nama_Barang" class="form-label fw-bold">Nama Barang</label>
                      <input type="text" name="Nama_Barang" id="Nama_Barang" class="form-control" placeholder="Nama Barang" aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="Jumlah" class="form-label fw-bold">Jumlah</label>
                      <input type="number" name="Jumlah" id="Jumlah" class="form-control" placeholder="jumlah" aria-label="Last name">
                    </div>
                    <div class="col">
                        <label for="Satuan" class="form-label fw-bold">Satuan</label>
                      <input type="text" name="Satuan" id="Satuan" class="form-control" placeholder="Satuan" aria-label="Last name">
                    </div>
                  </div>
                  <div class="d-md-flex gap-2 justify-content-md-end">
                  <button type="submit" class="btn btn-success d-grid my-3" name="submit">Input</button>
                  </div>
                </form>
                <div class="row">
                        <hr color="black">
                        <h3 class="fs-4 mb-3">Daftar Pengajuan</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-bordered">
                            <thead>
                                <tr>
                                  <th style="width: 30px;" scope="col">No</th>
                                  <th scope="col">ID Barang</th>
                                  <th scope="col">Nama Barang</th>
                                  <th scope="col">Jumlah</th>
                                  <th scope="col">Satuan</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Aksi</th>
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
                                        <td><?= $row["Status"]; ?></td>
                                        <td><?= $row["Satuan"]; ?></td>
                                        <td>
                                        <a href="fungsiUbah.php?no=<?= $row["No"]; ?>"  class="btn btn-success btn-sm" role="button">Edit</a>
                                        <a href="fungsiHapus.php?no=<?= $row["No"]; ?>" onclick="return confirm('Apakah anda yakin?'); " class="btn btn-danger btn-sm" role="button">Hapus</a>
                                        </td>
                                    </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                              </tbody>
                        </table>
                            
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
                                  <td><?= $row["Harga"]; ?></td>
                                  <td><?= $row["Status"]; ?></td>
                                  <td>
                                  <a href="fungsiBeli.php?no=<?= $row["No"]; ?>"  class="btn btn-success btn-sm" role="button">Beli Barang</a>
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