<?php
include("../connection/connect.php");
session_start();
error_reporting(0);

if (empty($_SESSION["adm_id"])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);

    // Hapus pesanan terkait user ini
    $delete_orders = mysqli_query($db, "DELETE FROM order_user WHERE u_id='$user_id'");

    // Hapus user itu sendiri
    $delete_user = mysqli_query($db, "DELETE FROM users WHERE u_id='$user_id'");

    if ($delete_orders && $delete_user) {
        header("Location: statistik_user.php");
        exit();
    } else {
        echo "<script>alert('Gagal menghapus data pengguna!'); window.location='statistik_user.php';</script>";
    }
} else {
    header("Location: statistik_user.php");
    exit();
}
?>
