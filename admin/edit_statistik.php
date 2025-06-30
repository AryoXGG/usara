<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

$user_id = $_GET['user_id'];

// Ambil data user
$user_query = mysqli_query($db, "SELECT * FROM users WHERE u_id='$user_id'");
$user = mysqli_fetch_assoc($user_query);

// Jika tidak ditemukan
if (!$user) {
    header("Location: statistik_user.php");
    exit();
}

if (isset($_POST['submit'])) {
    $followers = (int)$_POST['followers'];
    $penjualan = (int)$_POST['penjualan'];
    $status = $_POST['status'];

    $update = mysqli_query($db, "UPDATE users SET followers_ig='$followers', penjualan_total='$penjualan', status_promosi='$status' WHERE u_id='$user_id'");

    if ($update) {
        header("Location: statistik_user.php");
        exit();
    } else {
        $error = "Gagal menyimpan perubahan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Statistik</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="fix-header fix-sidebar">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-primary">Edit Statistik Pengguna</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Statistik: <?php echo htmlspecialchars($user['username']); ?></h4>
                                <?php if (!empty($error)) echo '<div class="alert alert-danger">' . $error . '</div>'; ?>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Jumlah Followers Instagram</label>
                                        <input type="number" name="followers" class="form-control" value="<?php echo (int)$user['followers_ig']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Penjualan</label>
                                        <input type="number" name="penjualan" class="form-control" value="<?php echo (int)$user['penjualan_total']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Status Promosi</label>
                                        <select name="status" class="form-control">
                                            <option value="Belum Dimulai" <?php if ($user['status_promosi'] == 'Belum Dimulai') echo 'selected'; ?>>Belum Dimulai</option>
                                            <option value="Sedang Berjalan" <?php if ($user['status_promosi'] == 'Sedang Berjalan') echo 'selected'; ?>>Sedang Berjalan</option>
                                            <option value="Selesai" <?php if ($user['status_promosi'] == 'Selesai') echo 'selected'; ?>>Selesai</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                    <a href="statistik_user.php" class="btn btn-secondary">Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
