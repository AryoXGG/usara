<!DOCTYPE html>
<html lang="id">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
} else {
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <title>Dashboard Admin</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>
        <div class="page-wrapper" style="height:1200px;">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">

                    <!-- Jumlah Paket -->
                    <div class="col-md-3">
                        <div class="card p-30" style="background: rgb(0, 123, 255);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <a href="all_paket.php"><span><i class="fa fa-box-open f-s-40" style="color: white;"></i></span></a>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 style="color: white; font-weight: 700">
                                        <?php
                                        $sql = "SELECT * FROM paket_digitalisasi";
                                        $result = mysqli_query($db, $sql);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </h2>
                                    <p class="m-b-0" style="color: white;">Paket</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Layanan (Fitur Paket) -->
                    <!-- 
                    <div class="col-md-3">
                        <div class="card p-30" style="background: rgb(0, 188, 136);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <a href="all_fitur.php"><span><i class="fa fa-tools f-s-40" style="color: white;"></i></span></a>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 style="color: white; font-weight: 700">
                                        <?php
                                        // $sql = "SELECT * FROM fitur_paket";
                                        // $result = mysqli_query($db, $sql);
                                        // echo mysqli_num_rows($result);
                                        ?>
                                    </h2>
                                    <p class="m-b-0" style="color: white;">Layanan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->

                    <!-- Jumlah Pelanggan -->
                    <div class="col-md-3">
                        <div class="card p-30" style="background: rgb(255, 193, 7);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <a href="allusers.php"><span><i class="fa fa-users f-s-40" style="color: white;"></i></span></a>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 style="color: white; font-weight: 700">
                                        <?php
                                        $sql = "SELECT * FROM users";
                                        $result = mysqli_query($db, $sql);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </h2>
                                    <p class="m-b-0" style="color: white;">Pelanggan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Pesanan -->
                    <div class="col-md-3">
                        <div class="card p-30" style="background: rgb(255,0,0);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <a href="all_orders.php"><span><i class="fa fa-shopping-cart f-s-40" style="color: white;"></i></span></a>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 style="color: white; font-weight: 700">
                                        <?php
                                        $sql = "SELECT * FROM order_user";
                                        $result = mysqli_query($db, $sql);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </h2>
                                    <p class="m-b-0" style="color: white;">Pesanan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>
<?php } ?>
