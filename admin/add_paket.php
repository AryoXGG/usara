<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['title']) || empty($_POST['price']) || empty($_POST['description'])) {
        $error = '<div class="alert alert-danger">Semua kolom wajib diisi!</div>';
    } else {
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $price = intval($_POST['price']);
        $desc  = mysqli_real_escape_string($db, $_POST['description']);

        // Upload gambar
        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
        $fnew = uniqid() . '.' . $extension;
        $store = "Res_img/" . $fnew;

        if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
            if ($fsize <= 1048576) {
                move_uploaded_file($temp, $store);
                $sql = "INSERT INTO paket_digitalisasi (title, price, description, image) VALUES ('$title', '$price', '$desc', '$fnew')";
                mysqli_query($db, $sql);
                $success = '<div class="alert alert-success">Paket berhasil ditambahkan!</div>';
            } else {
                $error = '<div class="alert alert-danger">Ukuran gambar maksimal 1MB.</div>';
            }
        } else {
            $error = '<div class="alert alert-danger">Format gambar harus jpg/jpeg/png.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Tambah Paket Digitalisasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <h3 class="text-primary mt-4 mb-3">Tambah Paket Digitalisasi</h3>

                <?php if (isset($error)) echo $error; ?>
                <?php if (isset($success)) echo $success; ?>

                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Paket</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Paket (Rp)</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar Paket</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                            <a href="all_paket.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JS Wajib agar sidebar bisa toggle -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
