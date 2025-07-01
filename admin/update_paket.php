<?php
include("../connection/connect.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Validasi ID dari URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = intval($_GET['id']);

// Ambil data awal
$sql = mysqli_query($db, "SELECT * FROM paket_digitalisasi WHERE paket_id = '$id'");
$row = mysqli_fetch_assoc($sql);

if (!$row) {
    die("Paket dengan ID tersebut tidak ditemukan.");
}

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $price = intval($_POST['price']);
    $desc  = mysqli_real_escape_string($db, $_POST['description']);

    $image = $row['image']; // Default: pakai gambar lama

    // Kalau upload gambar baru
    if (!empty($_FILES['file']['name'])) {
        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
        $fnew = uniqid() . '.' . $extension;
        $store = "Res_img/" . $fnew;

        if (in_array($extension, ['jpg', 'jpeg', 'png']) && $fsize <= 1048576) {
            move_uploaded_file($temp, $store);
            // Hapus gambar lama jika ada
            if (!empty($row['image']) && file_exists("Res_img/" . $row['image'])) {
                unlink("Res_img/" . $row['image']);
            }
            $image = $fnew;
        } else {
            $error = '<div class="alert alert-danger">Format gambar harus jpg/jpeg/png dan ukuran maks 1MB.</div>';
        }
    }

    // Simpan ke DB
    if (!isset($error)) {
        $update = mysqli_query($db, "UPDATE paket_digitalisasi SET title='$title', price='$price', description='$desc', image='$image' WHERE paket_id='$id'");
        if ($update) {
            header("Location: all_paket.php");
            exit();
        } else {
            $error = '<div class="alert alert-danger">Gagal memperbarui data.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Edit Paket Digitalisasi</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <link href="css/helper.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="fix-header fix-sidebar">
    <div id="main-wrapper">
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <h3 class="text-primary mt-4 mb-3">Edit Paket Digitalisasi</h3>

                <?php if (isset($error)) echo $error; ?>

                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Paket</label>
                                <input type="text" name="title" class="form-control" required value="<?= htmlspecialchars($row['title']) ?>">
                            </div>
                            <div class="form-group">
                                <label>Harga Paket (Rp)</label>
                                <input type="number" name="price" class="form-control" required value="<?= $row['price'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($row['description']) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar Saat Ini</label><br>
                                <img src="Res_img/<?= htmlspecialchars($row['image']) ?>" style="width:150px; height:auto;">
                            </div>
                            <div class="form-group">
                                <label>Ganti Gambar (Opsional)</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
                            <a href="all_paket.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
