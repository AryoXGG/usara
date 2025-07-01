<?php
include("../connection/connect.php");
session_start();
error_reporting(0);

// Cek apakah admin sudah login
if (empty($_SESSION["adm_id"])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $paket_id = intval($_GET['id']);

    // Ambil data gambar
    $query = mysqli_query($db, "SELECT image FROM paket_digitalisasi WHERE paket_id='$paket_id'");
    $data = mysqli_fetch_assoc($query);

    // Hapus file gambar jika ada
    if (!empty($data['image']) && file_exists("Res_img/" . $data['image'])) {
        unlink("Res_img/" . $data['image']);
    }

    // Hapus dari database
    $delete = mysqli_query($db, "DELETE FROM paket_digitalisasi WHERE paket_id='$paket_id'");

    if ($delete) {
        header("Location: all_paket.php");
        exit();
    } else {
        echo "<script>alert('Gagal menghapus paket!'); window.location='all_paket.php';</script>";
    }
} else {
    header("Location: all_paket.php");
    exit();
}
?>
