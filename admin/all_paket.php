<!DOCTYPE html>
<html lang="id">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <title>Daftar Paket Digitalisasi</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <link href="css/helper.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="fix-header fix-sidebar">
    <div id="main-wrapper">
        <!-- Header dan Sidebar -->
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <h3 class="text-primary mt-4 mb-3">Daftar Paket Digitalisasi</h3>

                <a href="add_paket.php" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> Tambah Paket
                </a>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Paket</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM paket_digitalisasi ORDER BY paket_id DESC";
                                    $result = mysqli_query($db, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
                                            echo '<td>Rp ' . number_format($row['price'], 0, ',', '.') . '</td>';
                                            echo '<td>' . htmlspecialchars($row['description']) . '</td>';
                                            echo '<td><img src="Res_img/' . $row['image'] . '" style="width:100px;height:auto;"></td>';
                                            echo '<td>' . $row['date'] . '</td>';
                                            echo '<td>
                                                <a href="update_paket.php?id=' . $row['paket_id'] . '" class="btn btn-info btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="delete_paket.php?id=' . $row['paket_id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus paket ini?\')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="6" class="text-center">Belum ada paket ditambahkan.</td></tr>';
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

    <!-- Wajib JS agar sidebar aktif -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
