<!DOCTYPE html>
<html lang="id">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Memberitahu browser untuk responsif terhadap lebar layar -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <title>Dashboard Admin</title>
    <!-- CSS Bootstrap Core -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Kustom -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style dapat ditemukan di spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Pembungkus utama -->
    <div id="main-wrapper">
        <!-- Mulai header -->
        <?php include("includes/header.php"); ?>
        <!-- End header -->
        <!-- Mulai sidebar kiri -->
        <?php include("includes/sidebar.php"); ?>
        <!-- End Left Sidebar -->
        <!-- Pembungkus halaman -->
        <div class="page-wrapper">
            <!-- Roti remah -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3>
                </div>
            </div>
            <!-- End Roti remah -->
            <!-- Kontainer fluid -->
            <div class="container-fluid">
                <!-- Mulai Konten Halaman -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Semua Pesanan Pengguna</h4>

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Pengguna</th>
                                                <th>Judul</th>
                                                <th>Kuantitas</th>
                                                <th>Harga</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Tanggal Pendaftaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id ";
                                            $query = mysqli_query($db, $sql);

                                            if (!mysqli_num_rows($query) > 0) {
                                                echo '<td colspan="8"><center>Data Pesanan Tidak Ada!</center></td>';
                                            } else {
                                                while ($rows = mysqli_fetch_array($query)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $rows['username']; ?></td>
                                                        <td><?php echo $rows['title']; ?></td>
                                                        <td><?php echo $rows['quantity']; ?></td>
                                                        <td>Rp.<?php echo $rows['price']; ?></td>
                                                        <td><?php echo $rows['address']; ?></td>
                                                        <?php
                                                        $status = $rows['status'];
                                                        if ($status == "" or $status == "NULL") {
                                                        ?>
                                                            <td> <button type="button" class="btn btn-info" style="font-weight:bold;"><span class="fa fa-bars " aria-hidden="true">Memasak</button></td>
                                                        <?php
                                                        }
                                                        if ($status == "in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>Sedang Di antar</button></td>
                                                        <?php
                                                        }
                                                        if ($status == "closed") {
                                                        ?>
                                                            <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true">Datang</button></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($status == "rejected") {
                                                        ?>
                                                            <td> <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>dibatalkan</button></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td><?php echo $rows['date']; ?></td>
                                                        <td>
                                                            <a href="includes/delete/delete_orders.php?order_del=<?php echo $rows['o_id']; ?>" onclick="return confirm('Apakah Anda yakin?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa-solid fa-trash" style="font-size:16px"></i></a>
                                                            <a href="view_order.php?user_upd=<?php echo $rows['o_id']; ?>" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa-solid fa-gear"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php
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
            <!-- End Konten Halaman -->
        </div>
    </div>
    <!-- End Pembungkus Halaman -->
    </div>
    <!-- End Pembungkus Utama -->
    <!-- Semua Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- JavaScript Bootstrap tether Core -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- JavaScript slimscrollbar scrollbar -->
    <script src="js/jquery.slimscroll.js"></script>
    <!-- Sidebar Menu -->
    <script src="js/sidebarmenu.js"></script>
    <!-- Kit sticky -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!-- JavaScript Kustom -->
    <script src="js/custom.min.js"></script>

    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>
