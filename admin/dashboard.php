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
        <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="../images/logo.ico">
        <title>Dashboard Admin</title>
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
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

                        <div class="col-md-3">
                            <div class="card p-30" style="background: rgb(196, 35, 23);">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <a href="allrestraunt.php"><span><i class="fa fa-archive f-s-40" style="color: white;"></i></span></a>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2 style="color: white; font-weight: 700"><?php $sql = "select * from restaurant";
                                                                                    $result = mysqli_query($db, $sql);
                                                                                    $rws = mysqli_num_rows($result);

                                                                                    echo $rws; ?></h2>
                                        <p class="m-b-0" style="color: white;">Toko</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-30" style="background: rgb(0, 188, 136);">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <a href="all_menu.php"><span><i class="fa fa-cutlery f-s-40" aria-hidden="true" style="color: white;"></i></span></a>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2 style="color: white; font-weight: 700"><?php $sql = "select * from dishes";
                                                                                    $result = mysqli_query($db, $sql);
                                                                                    $rws = mysqli_num_rows($result);

                                                                                    echo $rws; ?></h2>
                                        <p class="m-b-0" style="color: white;">Makanan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-30" style="background: rgb(0,0,255);">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <a href="allusers.php"><span><i class="fa fa-user f-s-40 " style="color: white;"></i></span></a>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2 style="color: white; font-weight: 700"><?php $sql = "select * from users";
                                                                                    $result = mysqli_query($db, $sql);
                                                                                    $rws = mysqli_num_rows($result);

                                                                                    echo $rws; ?></h2>
                                        <p class="m-b-0" style="color: white;">Pelanggan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-30" style="background: rgb(255,0,0);">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <a href="all_orders.php"><span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true" style="color: white;"></i></span></a>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2 style="color: white; font-weight: 700"><?php $sql = "select * from users_orders";
                                                                                    $result = mysqli_query($db, $sql);
                                                                                    $rws = mysqli_num_rows($result);

                                                                                    echo $rws; ?></h2>
                                        <p class="m-b-0" style="color: white;">Pesanan</p>
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

    </body>

</html>
<?php
}
?>
