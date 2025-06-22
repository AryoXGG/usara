<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Platform Jasa Digitalisasi & Pengemasan Produk UMKM">
    <meta name="author" content="USARA Team">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <title>USARA</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
</head>

<body class="home">

    <!-- Header starts -->
    <?php include("includes/navbar.php") ?>
    <!-- Header ends -->

    <!-- Hero Section -->
    <section class="hero bg-image" data-image-src="images/img/bgumkm.jpg">
        <div class="hero-inner">
            <!-- Logo USARA -->
            <div class="logo-container text-center">
                <img src="images/logo.png" alt="USARA Logo" style="height: 100px; width: auto; margin-bottom: 20px;">
            </div>
            <div class="container text-center hero-text font-white">
                <h1>Platform Jasa Digitalisasi & Pengemasan Produk UMKM</h1>
                <h5 class="font-white space-xs"></h5>
                <div class="p-3 steps">
                    <div class="step-item step1">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483 483" width="512" height="512">
                            <g fill="#FFF">
                                <path d="..."></path>
                            </g>
                        </svg>
                        <h4><span>1. </span>Pilih Layanan</h4>
                    </div>
                    <div class="step-item step2">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 380.721 380.721">
                            <g fill="#FFF">
                                <path d="..."></path>
                            </g>
                        </svg>
                        <h4><span>2. </span>Kirim Brief / Produk</h4>
                    </div>
                    <div class="step-item step3">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 612.001 612">
                            <path d="..."></path>
                        </svg>
                        <h4><span>3. </span>Produk Siap Dipasarkan</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
    <script src="js/theme.js"></script>

</body>

</html>
