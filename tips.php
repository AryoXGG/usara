<?php
session_start();
include("includes/navbar.php");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>TIPS Untuk UMKM</title>
  <link rel="icon" href="images/logo.ico">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
body {
      font-family: 'Arial', sans-serif;
      background-color: #f9f9f9;
    }

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



<!-- HEADER TIPS -->
<section class="tips-header">
  <h2>Tips & Trik untuk UMKM</h2>
</section>

<!-- KONTEN TIPS -->
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

<footer>
  <p>© 2025 USARA - Semua hak dilindungi.</p>
</footer>

<?php include("includes/footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>