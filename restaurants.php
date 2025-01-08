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
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <title>Restoran</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!--header starts-->
    <?php include("includes/navbar.php") ?>
    <!-- header end -->

    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Pilih Restoran</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pilih Makanan Favoritmu</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Pesan dan Bayar Online</a></li>
                </ul>
            </div>
        </div>
        <!-- end:Top links -->
        <!-- start inner page hero -->
        <div class="inner-page-hero bg-image" data-image-src="images/bgresto.jpg">
            <div class="container"> </div>
            <!-- end:Container -->
        </div>
        <section class="featured-restaurants">
            <div class="container">
                <h2 class="text-center">Daftar Restoran</h2>
                <div class="row">
                    <!-- Search Bar -->
                    <div class="col-sm-12 mb-4">
                        <form method="GET" action="">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari restoran..." style="max-width: 300px;">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="restaurant-listing">
                        <?php
                        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

                        $query = "SELECT * FROM restaurant";
                        if (!empty($searchQuery)) {
                            $query .= " WHERE title LIKE '%" . $searchQuery . "%'";
                        }

                        $ress = mysqli_query($db, $query);
                        while ($rows = mysqli_fetch_array($ress)) {
                            echo '<div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all">
                                    <div class="restaurant-wrap">
                                        <div class="row">
                                            <div class=" col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
                                                <a class="restaurant-logo" href="dishes.php?res_id=' . $rows['rs_id'] . '" > <img src="admin/Res_img/' . $rows['image'] . '" alt="Restaurant logo"> </a>
                                            </div>
                                            <!--end:col -->
                                            <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                                                <h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '" >' . $rows['title'] . '</a></h5> <span>' . $rows['address'] . '</span>
                                                <div class="bottom-part">
                                                    <div class="cost"><i class="fa fa-check"></i> Min Rp.10000</div>
                                                    <div class="mins"><i class="fa fa-motorcycle"></i> 20 min</div>
                                                    <div class="ratings" > 
                                                        <span">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span> (122) 
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end:col -->
                                        </div>
                                        <!-- end:row -->
                                    </div>
                                    <!--end:Restaurant wrap -->
                                </div>';
                        }

                        ?>

                    </div>
                </div>
                <!-- restaurants listing ends -->
            </div>
        </section>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>
