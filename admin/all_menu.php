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
    <!-- Memberitahukan browser untuk responsif terhadap lebar layar -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <title> Dashboard Admin</title>
    <!-- CSS Bootstrap Core -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Kustom -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - gaya yang bisa ditemukan di spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Pembungkus utama -->
    <div id="main-wrapper">
        <!-- mulai header -->
        <?php include("includes/header.php"); ?>
        <!-- akhir header -->
        <!-- mulai sidebar kiri -->
        <?php include("includes/sidebar.php"); ?>
        <!-- akhir sidebar kiri -->
        <!-- Pembungkus halaman -->
        <div class="page-wrapper">
            <!-- Breadcrumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3>
                </div>
            </div>
            <!-- Akhir Breadcrumb -->
            <!-- Kontainer fluid -->
            <div class="container-fluid">
                <!-- Mulai Konten Halaman -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Semua Menu</h4>

                                <div class="table-responsive m-t-40">
                                    <table id="" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Restoran</th>
                                                <th>Nama Makanan</th>
                                                <th>Deskripsi</th>
                                                <th>Harga</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM dishes order by d_id desc";
                                            $query = mysqli_query($db, $sql);

                                            if (!mysqli_num_rows($query) > 0) {
                                                echo '<td colspan="11"><center>Tidak ada data menu!</center></td>';
                                            } else {
                                                while ($rows = mysqli_fetch_array($query)) {
                                                    $mql = "select * from restaurant where rs_id='" . $rows['rs_id'] . "'";
                                                    $newquery = mysqli_query($db, $mql);
                                                    $fetch = mysqli_fetch_array($newquery);

                                                    echo '<tr><td>' . $fetch['title'] . '</td>
                                                          <td>' . $rows['title'] . '</td>
                                                          <td>' . $rows['description'] . '</td>
                                                          <td>Rp.' . $rows['price'] . '</td>
                                                          <td>
                                                            <div class="col-md-3 col-lg-8 m-b-10">
                                                                <center><img src="Res_img/dishes/' . $rows['img'] . '" class="img-responsive radius" style="max-height:100px;max-width:150px;" /></center>
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <a href="includes/delete/delete_menu.php?menu_del=' . $rows['d_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa-solid fa-trash" style="font-size:16px"></i></a> 
                                                            <a href="update_menu.php?menu_upd=' . $rows['d_id'] . '" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5" style="background: rgb(0, 188, 126);"><i class="fa-solid fa-gear"></i></a>
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
    <!-- Akhir Konten Halaman -->
    </div>
    <!-- Akhir Kontainer fluid -->

    </div>
    <!-- Akhir Pembungkus halaman -->
    </div>
    <!-- Akhir Pembungkus utama -->
    <!-- Semua Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!-- Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!-- stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!-- Custom JavaScript -->
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
