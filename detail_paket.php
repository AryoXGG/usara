<?php
include("connection/connect.php");
session_start();
error_reporting(0);

// Ambil data paket berdasarkan ID
if (isset($_GET['paket_id'])) {
    $paket_id = intval($_GET['paket_id']);
    $result = mysqli_query($db, "SELECT * FROM paket_digitalisasi WHERE paket_id = '$paket_id'");
    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        header("Location: paket.php");
        exit;
    }
} else {
    header("Location: paket.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Detail Paket - <?= htmlspecialchars($data['title']) ?></title>
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            background-color: #f9f9f9;
        }

        .detail-container {
            max-width: 960px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .detail-img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .detail-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }
        .detail-price {
            font-size: 20px;
            color: green;
            font-weight: 600;
            margin: 15px 0;
        }
        .detail-desc {
            font-size: 16px;
            color: #555;
            white-space: pre-line;
        }
        .btn-group-custom {
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Background Header -->
    <div class="inner-page-hero bg-image" data-image-src="images/bgresto.jpg">
        <div class="container text-center text-white py-5">
            <h2>Detail Paket Digitalisasi</h2>
        </div>
    </div>

    <!-- Detail Section -->
    <div class="container detail-container">
        <div class="row">
            <div class="col-md-5">
                <img src="admin/Res_img/<?= $data['image'] ?>" alt="<?= htmlspecialchars($data['title']) ?>" class="detail-img">
            </div>
            <div class="col-md-7">
                <h2 class="detail-title"><?= htmlspecialchars($data['title']) ?></h2>
                <p class="detail-price">Rp <?= number_format($data['price'], 0, ',', '.') ?></p>
                <p class="detail-desc"><?= nl2br(htmlspecialchars($data['description'])) ?></p>

                <div class="btn-group-custom">
                    <a href="paket.php" class="btn btn-secondary">← Kembali ke Daftar Paket</a>
                    <a href="checkout.php?paket_id=<?= $data['paket_id'] ?>" class="btn btn-success">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
