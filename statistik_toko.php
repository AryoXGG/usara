<?php
include("includes/navbar.php");
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}

// Ambil data user
$uid = $_SESSION['user_id'];
$user_query = mysqli_query($db, "SELECT * FROM users WHERE u_id='$uid'");
$user = mysqli_fetch_assoc($user_query);

// Cek & generate followers dan penjualan jika masih 0
if ((int)$user['followers_ig'] === 0 || (int)$user['penjualan_total'] === 0) {
    $followers_acak = rand(1000, 25000);
    $penjualan_acak = rand(50, 500);

    mysqli_query($db, "UPDATE users SET followers_ig='$followers_acak', penjualan_total='$penjualan_acak' WHERE u_id='$uid'");

    // Update variabel lokal
    $user['followers_ig'] = $followers_acak;
    $user['penjualan_total'] = $penjualan_acak;
}

// Ambil paket terakhir yang dipesan user
$order_query = mysqli_query($db, "SELECT nama_paket FROM order_user WHERE u_id='$uid' ORDER BY date DESC LIMIT 1");
$order = mysqli_fetch_assoc($order_query);
$paket = $order ? $order['nama_paket'] : '-';
?>

<!DOCTYPE html>
<html lang="id">
<br><br>
<head>
    <meta charset="UTF-8">
    <title>Statistik Toko Anda</title>
    <link rel="icon" href="images/logo.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .statistik-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .statistik-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .statistik-container h3 {
            margin-bottom: 15px;
            color: #28a745;
        }

        .statistik-container p {
            margin-bottom: 10px;
            font-size: 15px;
        }

        .badge-status {
            font-size: 14px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>

<div class="statistik-container">
    <h3>Statistik Promosi Toko</h3>

    <?php if ($user['image']): ?>
        <img src="<?php echo htmlspecialchars($user['image']); ?>" alt="Produk Toko">
    <?php endif; ?>

    <p><strong>Nama Toko:</strong> <?php echo htmlspecialchars($user['nama_toko']); ?></p>
    <p><strong>Deskripsi:</strong> <?php echo nl2br(htmlspecialchars($user['deskripsi'])); ?></p>
    <p><strong>Paket Digitalisasi:</strong> <?php echo htmlspecialchars($paket); ?></p>

    <p><strong>Instagram:</strong>
    <a href="https://instagram.com/<?php echo htmlspecialchars($user['ig']); ?>" target="_blank">
        <i class="fa fa-instagram" style="color:#e1306c;"></i> @<?php echo htmlspecialchars($user['ig']); ?>
    </a>
    (<?php echo (int)$user['followers_ig']; ?> followers)
</p>

<p><strong>Shopee:</strong>
    <a href="https://shopee.co.id/<?php echo htmlspecialchars($user['shopee']); ?>" target="_blank">
        <i class="fa fa-shopping-cart" style="color:#ee4d2d;"></i> <?php echo htmlspecialchars($user['shopee']); ?>
    </a>
    (<?php echo (int)$user['penjualan_total']; ?> penjualan)
</p>

    <p><strong>Status Promosi:</strong>
        <span class="badge badge-info badge-status"><?php echo htmlspecialchars($user['status_promosi']); ?></span>
    </p>
</div>

<?php include("includes/footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
