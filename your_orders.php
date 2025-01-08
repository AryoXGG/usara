<!DOCTYPE html>
<html lang="id">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id'])) {
    header('location:login.php');
} else {
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <link rel="icon" type="image/x-icon" href="images/logo.ico">
        <title>Pesanan Saya</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="footer.css" rel="stylesheet">
        <style type="text/css" rel="stylesheet">
            .indent-small {
                margin-left: 5px;
            }

            .form-group.internal {
                margin-bottom: 0;
            }

            .dialog-panel {
                margin: 10px;
            }

            .datepicker-dropdown {
                z-index: 200 !important;
            }

            label.control-label {
                font-weight: 600;
                color: #777;
            }


            table {
                width: 750px;
                border-collapse: collapse;
                margin: auto;

            }

            tr:nth-of-type(odd) {
                background: #eee;
            }

            th {
                background: rgb(0, 128, 0);
                color: white;
                font-weight: bold;

            }

            td,
            th {
                padding: 10px;
                border: 1px solid #ccc;
                text-align: left;
                font-size: 14px;

            }

            @media only screen and (max-width: 760px),
            (min-device-width: 768px) and (max-device-width: 1024px) {

                table {
                    width: 100%;
                }

                table,
                thead,
                tbody,
                th,
                td,
                tr {
                    display: block;
                }

                thead tr {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                tr {
                    border: 1px solid #ccc;
                }

                td {
                    border: none;
                    border-bottom: 1px solid #eee;
                    position: relative;
                    padding-left: 50%;
                }

                td:before {
                    position: absolute;
                    top: 6px;
                    left: 6px;
                    width: 45%;
                    padding-right: 10px;
                    white-space: nowrap;
                    content: attr(data-column);

                    color: #000;
                    font-weight: bold;
                }

            }
        </style>

    </head>

    <body>

        <!--header starts-->
        <?php include("includes/navbar.php") ?>
        <!-- header end -->

        <div class="page-wrapper">
            <!-- top Links -->

            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <div class="inner-page-hero bg-image" data-image-src="images/Gado_gado.jpg">
                <div class="container"> </div>
                <!-- end:Container -->
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">


                    </div>
                </div>
            </div>
            <!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">

                                    <table>
                                        <thead>
                                            <tr>

                                                <th>Item</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>



                                            <?php
                                            $query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "'");
                                            if (!mysqli_num_rows($query_res) > 0) {
                                                echo '<td colspan="6"><center>Anda belum memiliki pesanan. </center></td>';
                                            } else {
                                                while ($row = mysqli_fetch_array($query_res)) {

                                            ?>
                                                    <tr>
                                                        <td data-column="Item"> <?php echo $row['title']; ?></td>
                                                        <td data-column="Jumlah"> <?php echo $row['quantity']; ?></td>
                                                        <td data-column="Harga">Rp.<?php echo $row['price']; ?></td>
                                                        <td data-column="Status">
                                                            <?php
                                                            $status = $row['status'];
                                                            if ($status == "" or $status == "NULL") {
                                                            ?>
                                                                <button type="button" class="btn btn-info" style="font-weight:bold;">Diproses</button>
                                                            <?php
                                                            }
                                                            if ($status == "in process") {
                                                            ?>
                                                                <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>Dimasak</button>
                                                            <?php
                                                            }
                                                            if ($status == "closed") {
                                                            ?>
                                                                <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true">Terkirim</button>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($status == "rejected") {
                                                            ?>
                                                                <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>Dibatalkan</button>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td data-column="Tanggal"> <?php echo $row['date']; ?></td>
                                                        <td data-column="Aksi"> <a href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan Anda?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> </td>
                                                    </tr>


                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end:row -->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <!-- Featured restaurants ends -->



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
<?php
} ?>
