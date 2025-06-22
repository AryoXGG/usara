<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION["adm_id"])) {
    header('location:../index.php');
    exit();
}

if (isset($_GET['order_del'])) {
    $order_id = intval($_GET['order_del']);
    mysqli_query($db, "DELETE FROM order_user WHERE o_id = '$order_id'");
}

header("location:all_orders.php");
exit();
?>
