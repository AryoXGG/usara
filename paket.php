<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Paket Digitalisasi</title>
    <link rel="icon" type="image/x-icon" href="images/logo.ico">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <?php include("includes/navbar.php") ?>
    <!-- End Header -->

    <div class="page-wrapper">
        <!-- Step Info -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <br>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="paket.php">Pilih Paket</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Detail & Bayar</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Selesai</a></li>
                </ul>
            </div>
        </div>

        <!-- Hero Background -->
        <div class="inner-page-hero bg-image" data-image-src="images/bgresto.jpg">
            <div class="container"> </div>
        </div>

        <section class="featured-restaurants">
            <div class="container">
                <h2 class="text-center">Daftar Paket Digitalisasi</h2>

                <!-- Search -->
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <form method="GET" action="">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari paket..." style="max-width: 300px;">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Paket List -->
                <div class="row">
                    <div class="restaurant-listing">
                        <?php
                        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
                        $query = "SELECT * FROM paket_digitalisasi";
                        if (!empty($searchQuery)) {
                            $query .= " WHERE title LIKE '%" . mysqli_real_escape_string($db, $searchQuery) . "%'";
                        }

                        $result = mysqli_query($db, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                                <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all">
                                    <div class="restaurant-wrap">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
                                                <a class="restaurant-logo" href="detail_paket.php?paket_id=' . $row['paket_id'] . '">
                                                    <img src="admin/Res_img/' . $row['image'] . '" alt="Paket" style="height: 160px; object-fit: cover;">
                                                </a>
                                            </div>
                                            <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                                                <h5><a href="detail_paket.php?paket_id=' . $row['paket_id'] . '">' . htmlspecialchars($row['title']) . '</a></h5>
                                                <span class="text-muted">Rp ' . number_format($row['price'], 0, ',', '.') . '</span>
                                                <p style="margin: 10px 0;">' . nl2br(htmlspecialchars(substr($row['description'], 0, 100))) . '...</p>
                                                <div class="bottom-part">
                                                    <a href="pesan.php?paket_id=' . $row['paket_id'] . '" class="btn btn-success btn-sm">Pesan Sekarang</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                        } else {
                            echo '<div class="col-12 text-center"><p>Tidak ada paket ditemukan.</p></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
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
