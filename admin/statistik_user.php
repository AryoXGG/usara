<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <title>Statistik Toko User</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="fix-header fix-sidebar">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Statistik Promosi Pengguna</h3>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Statistik Toko</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Nama Toko</th>
                                                <th>Gambar Produk</th>
                                                <th>Followers IG</th>
                                                <th>Total Penjualan</th>
                                                <th>Status Promosi</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM users ORDER BY u_id DESC";
                                            $query = mysqli_query($db, $sql);

                                            if (mysqli_num_rows($query) == 0) {
                                                echo '<tr><td colspan="8" class="text-center">Belum ada data.</td></tr>';
                                            } else {
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                    echo '
                                                    <tr>
                                                        <td>' . htmlspecialchars($row['username']) . '</td>
                                                        <td>' . htmlspecialchars($row['nama_toko']) . '</td>
                                                        <td><img src="../' . htmlspecialchars($row['image']) . '" width="70" height="70" style="object-fit:cover;border-radius:6px;"></td>
                                                        <td>' . (int)$row['followers_ig'] . '</td>
                                                        <td>' . (int)$row['penjualan_total'] . '</td>
                                                        <td>' . htmlspecialchars($row['status_promosi']) . '</td>
                                                        <td>' . $row['date'] . '</td>
                                                        <td>
                                                            <a href="edit_statistik.php?user_id=' . $row['u_id'] . '" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></a>
                                                            <a href="hapus_statistik.php?user_id=' . $row['u_id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>
</html>
