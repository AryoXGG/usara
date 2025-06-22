<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();

if (empty($_SESSION["user_id"])) {
    header('location:login.php');
    exit();
}

$success = "";
$item_total = 0;
$order_created = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $payment = mysqli_real_escape_string($db, $_POST['mod']);
    $date = date('Y-m-d H:i:s');

    if (!empty($_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $item) {
            $nama_paket = mysqli_real_escape_string($db, $item["title"]);
            $quantity = intval($item["quantity"]);
            $harga = intval($item["price"]);
            $u_id = $_SESSION["user_id"];

            $query = "INSERT INTO order_user (u_id, nama_paket, quantity, harga, payment_method, date) 
                      VALUES ('$u_id', '$nama_paket', '$quantity', '$harga', '$payment', '$date')";
            mysqli_query($db, $query);
        }

        $order_created = true;
        $success = "<div class='alert alert-success text-center'>Pesanan Anda berhasil dibuat!</div>";
    }
}

if (!empty($_SESSION["cart_item"])) {
    foreach ($_SESSION["cart_item"] as $item) {
        $item_total += ($item["price"] * $item["quantity"]);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Checkout</title>
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        #transfer-info {
            display: none;
            background-color: #f7f7f7;
            padding: 15px;
            border: 1px solid #ccc;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php include("includes/navbar.php"); ?>

<div class="page-wrapper">
    <div class="top-links">
        <div class="container">
            <ul class="row links">
                <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="paket.php">Pilih Paket</a></li>
                <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Detail & Bayar</a></li>
                <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="#">Selesai</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <?= $success ?>
    </div>

    <div class="container mt-4 mb-5">
        <form method="post">
            <div class="widget clearfix">
                <div class="widget-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="cart-totals mb-4">
                                <h4>Ringkasan Pesanan</h4>
                                <?php if (!empty($_SESSION["cart_item"])): ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Paket</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($_SESSION["cart_item"] as $item): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($item["title"]) ?></td>
                                                    <td><?= $item["quantity"] ?></td>
                                                    <td>Rp <?= number_format($item["price"], 0, ',', '.') ?></td>
                                                    <td>Rp <?= number_format($item["price"] * $item["quantity"], 0, ',', '.') ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="3"><strong>Total</strong></td>
                                                <td><strong>Rp <?= number_format($item_total, 0, ',', '.') ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <p class="text-center text-muted">Keranjang kosong.</p>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($_SESSION["cart_item"])): ?>
                            <div class="payment-option">
                                <h5>Pilih Metode Pembayaran:</h5>
                                <label class="custom-control custom-radio">
                                    <input name="mod" type="radio" class="custom-control-input" value="Cash" checked onclick="toggleTransferInfo()">
                                    <span class="custom-control-indicator"></span> Bayar Tunai (Cash)
                                </label>
                                <label class="custom-control custom-radio mt-2">
                                    <input name="mod" type="radio" class="custom-control-input" value="Transfer" onclick="toggleTransferInfo()">
                                    <span class="custom-control-indicator"></span> Transfer Bank (Manual)
                                </label>

                                <!-- Transfer Bank Info -->
                                <div id="transfer-info">
                                    <h6><strong>Informasi Transfer:</strong></h6>
                                    <p>
                                        Silakan transfer ke rekening berikut:<br>
                                        <strong>Bank BCA</strong><br>
                                        No Rekening: <strong>1234567890</strong><br>
                                        Atas Nama: <strong>USARA DIGITAL</strong>
                                    </p>
                                    <p>
                                        Setelah transfer, silakan konfirmasi ke WhatsApp kami di <a href="https://wa.me/62895401162217" target="_blank">+62 895-4011-62217</a>.
                                    </p>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" name="submit" class="btn btn-success btn-lg" onclick="return confirm('Apakah Anda yakin ingin memesan?');">Pesan Sekarang</button>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
function toggleTransferInfo() {
    const transferRadio = document.querySelector('input[value="Transfer"]');
    const transferInfo = document.getElementById('transfer-info');
    transferInfo.style.display = transferRadio.checked ? 'block' : 'none';
}
window.onload = toggleTransferInfo;
</script>
</body>
</html>

<?php
if ($order_created) {
    unset($_SESSION["cart_item"]);
}
?>
