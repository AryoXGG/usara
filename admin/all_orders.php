<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Daftar Pesanan - Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
                    <h3 class="text-primary">Semua Pesanan</h3>
                </div>
            </div>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pesanan Pengguna</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pengguna</th>
                                        <th>Nama Paket</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Metode</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($db, "
                                        SELECT o.*, u.username 
                                        FROM order_user o 
                                        JOIN users u ON o.u_id = u.u_id 
                                        ORDER BY o.date DESC
                                    ");

                                    if (mysqli_num_rows($query) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            $total = $row['harga'] * $row['quantity'];
                                            echo '
                                            <tr>
                                                <td>' . $no++ . '</td>
                                                <td>' . htmlspecialchars($row['username']) . '</td>
                                                <td>' . htmlspecialchars($row['nama_paket']) . '</td>
                                                <td>' . $row['quantity'] . '</td>
                                                <td>Rp ' . number_format($row['harga'], 0, ',', '.') . '</td>
                                                <td><strong>Rp ' . number_format($total, 0, ',', '.') . '</strong></td>
                                                <td>' . htmlspecialchars($row['payment_method']) . '</td>
                                                <td>' . htmlspecialchars($row['status']) . '</td>
                                                <td>' . date('d-m-Y H:i', strtotime($row['date'])) . '</td>
                                                <td>
                                                    <a href="order_update.php?order_id=' . $row['o_id'] . '" 
                                                       class="btn btn-info btn-sm m-b-5">
                                                       <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="delete_orders.php?order_del=' . $row['o_id'] . '" 
                                                       class="btn btn-danger btn-sm" 
                                                       onclick="return confirm(\'Yakin ingin menghapus pesanan ini?\')">
                                                       <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="10" class="text-center">Tidak ada pesanan.</td></tr>';
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

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
