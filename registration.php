<?php
session_start();
error_reporting(0);
include("connection/connect.php");

if (isset($_POST['submit'])) {
    $username   = $_POST['username'];
    $phone      = $_POST['phone'];
    $password   = $_POST['password'];
    $cpassword  = $_POST['cpassword'];
    $toko       = $_POST['nama_toko'];
    $ig         = $_POST['ig'];
    $shopee     = $_POST['shopee'];
    $deskripsi  = $_POST['deskripsi'];

    $foto       = $_FILES['foto']['name'];
    $temp       = $_FILES['foto']['tmp_name'];
    $size       = $_FILES['foto']['size'];
    $ext        = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
    $allowed    = ['jpg', 'jpeg', 'png'];
    $newname    = time() . '_' . preg_replace('/\s+/', '_', $foto);
    $foto_path  = "images/produk/" . $newname;

    if (
        empty($username) || empty($phone) || empty($password) || empty($cpassword) ||
        empty($toko) || empty($ig) || empty($shopee) || empty($deskripsi) || empty($foto)
    ) {
        $message = "Semua kolom wajib diisi!";
    } elseif ($password != $cpassword) {
        $message = "Password tidak cocok.";
    } elseif (strlen($password) < 6) {
        $message = "Password minimal 6 karakter.";
    } elseif (strlen($phone) < 10) {
        $message = "Nomor telepon tidak valid.";
    } elseif (!in_array($ext, $allowed)) {
        $message = "Format gambar harus jpg/jpeg/png.";
    } elseif ($size > 1048576) {
        $message = "Ukuran gambar maksimal 1MB.";
    } else {
        $cek_user = mysqli_query($db, "SELECT username FROM users WHERE username='$username'");
        if (mysqli_num_rows($cek_user) > 0) {
            $message = "Username sudah terdaftar!";
        } else {
            if (move_uploaded_file($temp, $foto_path)) {
                $hashed_password = md5($password);
                $query = "INSERT INTO users (username, phone, password, nama_toko, ig, shopee, deskripsi, image)
                          VALUES ('$username', '$phone', '$hashed_password', '$toko', '$ig', '$shopee', '$deskripsi', '$foto_path')";
                mysqli_query($db, $query);
                $success = "Pendaftaran berhasil! Silakan login.";
                header("refresh:2;url=login.php");
            } else {
                $message = "Gagal mengunggah gambar.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Toko</title>
    <link rel="icon" href="images/logo.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .after-navbar {
        margin-top: 80px;
      }
    </style>
</head>
<body>
<?php include("includes/navbar.php"); ?>

<style>
  .after-navbar {
    margin-top: 80px;
  }
</style>

<div class="container mt-nav-offset mb-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
           <br>
           <br>
           <br>
           <br>          
            <h2 class="text-center mb-4">Daftar Akun & Toko</h2>
            <?php if (!empty($message)) echo "<div class='alert alert-danger'>$message</div>"; ?>
            <?php if (!empty($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Username *</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username">
                </div>

                <div class="form-group">
                    <label>Nomor Telepon *</label>
                    <input type="text" name="phone" class="form-control" placeholder="08xxxxxxxx">
                </div>

                <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password *</label>
                    <input type="password" name="cpassword" class="form-control" placeholder="Ulangi Password">
                </div>

                <div class="form-group">
                    <label>Nama Toko *</label>
                    <input type="text" name="nama_toko" class="form-control" placeholder="Contoh: Toko Sukses Jaya">
                </div>

                <div class="form-group">
                    <label>Link Instagram *</label>
                    <input type="text" name="ig" class="form-control" placeholder="isi username instagram toko anda">
                </div>

                <div class="form-group">
                    <label>Link Shopee *</label>
                    <input type="text" name="shopee" class="form-control" placeholder="isi username toko shopee anda">
                </div>

                <div class="form-group">
                    <label>Deskripsi Toko *</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi toko Anda..."></textarea>
                </div>

                <div class="form-group">
                    <label>Upload Gambar Produk *</label>
                    <input type="file" name="foto" class="form-control-file">
                </div>

                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-success px-4">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
