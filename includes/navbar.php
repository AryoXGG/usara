<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images/logo.ico">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
    }

    .navbar {
      background-color: #000;
    }

    .navbar-brand {
      color: white;
      font-weight: bold;
      font-size: 1.5rem;
    }

    .navbar-nav .nav-link {
      color: white;
      font-weight: 500;
      padding: 10px 15px;
    }

    .navbar-nav .nav-link:hover {
      color: #ccc;
    }

    .dropdown-menu {
      background-color: #fff;
      border: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .dropdown-menu .dropdown-item {
      color: #000 !important;
    }

    .bgGreen {
    background-color: #28a745 !important;
    border-radius: 5px;
    padding: 6px 12px;
    }


    .dropdown-menu .dropdown-item:hover {
      background-color: #f0f0f0;
    }

    .dropdown-menu.show {
      display: block;
    }
  </style>
</head>
<body>

<header id="header" class="header-scroll top-header headrom headerBg">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">USARA</a>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="paket.php">Layanan</a></li>

        <?php if (empty($_SESSION["user_id"])): ?>
          <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="registration.php" class="nav-link bgGreen">Daftar</a></li>
        <?php else: ?>
          <li class="nav-item"><a href="your_orders.php" class="nav-link">Pesanan Saya</a></li>

          <!-- DROPDOWN KONSULTASI -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownKonsultasi" role="button">
              <i class="fa fa-comments"></i> Konsultasi
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownKonsultasi">
              <a class="dropdown-item" href="https://wa.me/62895401162217" target="_blank">
                <i class="fa fa-whatsapp"></i> Chat WhatsApp
              </a>
              <a class="dropdown-item" href="pelatihan.php">
                <i class="fa fa-video-camera"></i> Pelatihan Webinar
              </a>
              <a class="dropdown-item" href="tips.php">
                 <i class="fa fa-lightbulb-o"></i> TIPS UMKM
               </a>
            </div>
          </li>

          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Manual dropdown toggle (berulang bisa klik) -->
<script>
  $(document).ready(function () {
    $('.dropdown-toggle').click(function (e) {
      e.preventDefault();
      let $menu = $(this).next('.dropdown-menu');
      $('.dropdown-menu').not($menu).removeClass('show');
      $menu.toggleClass('show');
    });

    // Close dropdown when click outside
    $(document).on('click', function (e) {
      if (!$(e.target).closest('.dropdown').length) {
        $('.dropdown-menu').removeClass('show');
      }
    });
  });
</script>

</body>
</html>
