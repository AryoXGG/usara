<?php
include("connection/connect.php");
session_start();
error_reporting(0);

// Cek apakah user sudah login dan parameter ada
if (isset($_SESSION['user_id']) && isset($_GET['order_del']) && is_numeric($_GET['order_del'])) {
    $order_id = intval($_GET['order_del']);
    $user_id = $_SESSION['user_id'];

    // Hapus pesanan milik user yang sesuai
    mysqli_query($db, "DELETE FROM order_user WHERE o_id = '$order_id' AND u_id = '$user_id'");
}

// Redirect kembali ke halaman pesanan
header("Location: your_orders.php");
exit();
