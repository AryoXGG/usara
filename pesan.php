<?php
include("connection/connect.php");
session_start();

if (isset($_GET['paket_id'])) {
    $paket_id = intval($_GET['paket_id']);
    $sql = mysqli_query($db, "SELECT * FROM paket_digitalisasi WHERE paket_id='$paket_id'");
    $row = mysqli_fetch_assoc($sql);

    if ($row) {
        $_SESSION["cart_item"] = [
            [
                "title" => $row['title'],
                "price" => $row['price'],
                "quantity" => 1
            ]
        ];
        header("Location: checkout.php");
        exit();
    } else {
        echo "Paket tidak ditemukan.";
    }
} else {
    echo "ID paket tidak valid.";
}
?>
