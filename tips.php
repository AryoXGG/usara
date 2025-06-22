<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tips & Trik untuk UMKM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
        }

        /* Navbar */
        .navbar {
            background-color: #000;
        }

        .navbar .nav-link, .navbar .navbar-brand {
            color: #fff;
        }

        .navbar .nav-link:hover {
            color: #28a745;
        }

        .bgGreen {
            background-color: #28a745 !important;
            border-radius: 5px;
            padding: 6px 12px;
        }

        /* Header Section */
        .tips-header {
            background: url('images/bg-tips.jpeg') center center/cover no-repeat;
            padding: 100px 20px;
            text-align: center;
            color: white;
            position: relative;
        }

        .tips-header::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 0;
        }

        .tips-header h2 {
            position: relative;
            z-index: 1;
            font-weight: bold;
            font-size: 36px;
        }

        /* Tips Card */
        .tips-container {
            padding: 50px 20px;
            max-width: 1000px;
            margin: auto;
        }

        .card-tip {
            background-color: #fff;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card-tip:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .card-tip h5 {
            font-weight: bold;
            color: #28a745;
        }

        .card-tip .card-body {
            padding: 25px;
        }

        /* Footer */
        footer {
            background-color: #000;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<header>
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="index.php">USARA</a>
            <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link active" href="tips.php">Tips & Trik</a></li>
                    <li class="nav-item"><a class="nav-link" href="paket.php">Layanan</a></li>
                    <?php
                    if (!empty($_SESSION["user_id"])) {
                        echo '<li class="nav-item"><a class="nav-link" href="https://wa.me/62895401162217" target="_blank">Konsultasi</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="your_orders.php">Proyek Saya</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                        echo '<li class="nav-item"><a class="nav-link " href="registration.php">Daftar</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Header Banner -->
<section class="tips-header">
    <h2>Tips & Trik untuk UMKM</h2>
</section>

<!-- Tips Content -->
<div class="tips-container">

    <div class="card card-tip mb-4">
        <div class="card-body">
            <h5>1. Kenali Target Pasar Anda</h5>
            <p>Pahami siapa pelanggan Anda, apa kebutuhannya, dan bagaimana produk Anda bisa membantu mereka.</p>
        </div>
    </div>

    <div class="card card-tip mb-4">
        <div class="card-body">
            <h5>2. Gunakan Media Sosial Secara Aktif</h5>
            <p>Promosikan produk melalui Instagram, WhatsApp, dan platform digital lain secara konsisten.</p>
        </div>
    </div>

    <div class="card card-tip mb-4">
        <div class="card-body">
            <h5>3. Buat Kemasan Menarik</h5>
            <p>Kemasan produk yang menarik akan menambah nilai jual dan kepercayaan konsumen.</p>
        </div>
    </div>

    <div class="card card-tip mb-4">
        <div class="card-body">
            <h5>4. Gunakan Jasa Digitalisasi Produk</h5>
            <p>Gunakan layanan seperti <strong>USARA</strong> untuk membuat katalog digital dan bantu produkmu lebih dikenal.</p>
        </div>
    </div>

</div>

<!-- Footer -->
<footer>
    <p>© 2025 USARA - Semua hak dilindungi.</p>
</footer>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
