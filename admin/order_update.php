<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
    exit();
}

if (isset($_POST['update'])) {
    $order_id = $_GET['order_id'];
    $status = mysqli_real_escape_string($db, $_POST['status']);

    $update = mysqli_query($db, "UPDATE order_user SET status='$status' WHERE o_id='$order_id'");

    if ($update) {
        echo "<script>alert('Status pesanan berhasil diperbarui!'); window.location.href='all_orders.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui status!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Edit Status Pesanan</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            background: #f7f7f7;
            font-family: 'Segoe UI', sans-serif;
        }

        .container-form {
            max-width: 600px;
            background: #fff;
            margin: 60px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h3 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
        }

        select.form-control {
            height: 45px;
        }

        .form-actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .btn {
            min-width: 100px;
        }
    </style>
</head>
<body>

<div class="container-form">
    <h3>Edit Status Pesanan</h3>
    <form method="post">
        <div class="form-group">
            <label>ID Pesanan</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($_GET['order_id']) ?>" readonly>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="Belum Bayar">Belum Bayar</option>
                <option value="Lunas">Lunas</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" name="update" class="btn btn-success">Simpan</button>
            <a href="all_orders.php" class="btn btn-secondary">Tutup</a>
        </div>
    </form>
</div>

</body>
</html>
