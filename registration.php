<!DOCTYPE html>
<html lang="id">
<?php
session_start();
error_reporting(0);
include("connection/connect.php");
if (isset($_POST['submit'])) {
    if (
        empty($_POST['firstname']) ||
        empty($_POST['lastname']) ||
        empty($_POST['email']) ||
        empty($_POST['phone']) ||
        empty($_POST['password']) ||
        empty($_POST['cpassword']) ||
        empty($_POST['cpassword'])
    ) {
        $message = "Semua kolom harus diisi!";
    } else {
        $check_username = mysqli_query($db, "SELECT username FROM users where username = '" . $_POST['username'] . "' ");
        $check_email = mysqli_query($db, "SELECT email FROM users where email = '" . $_POST['email'] . "' ");



        if ($_POST['password'] != $_POST['cpassword']) {
            $message = "Password tidak cocok";
        } elseif (strlen($_POST['password']) < 6) {
            $message = "Password harus >=6 karakter";
        } elseif (strlen($_POST['phone']) < 10) {
            $message = "Nomor telepon tidak valid!";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $message = "Alamat email tidak valid, masukkan email yang benar!";
        } elseif (mysqli_num_rows($check_username) > 0) {
            $message = 'Username sudah terdaftar!';
        } elseif (mysqli_num_rows($check_email) > 0) {
            $message = 'Email sudah terdaftar!';
        } else {

            $mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('" . $_POST['username'] . "','" . $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . md5($_POST['password']) . "','" . $_POST['address'] . "')";
            mysqli_query($db, $mql);
            $success = "Akun berhasil dibuat! <p>Anda akan diarahkan dalam <span id='counter'>5</span> detik.</p>
                    <script type='text/javascript'>
                        function countdown() {
                            var i = document.getElementById('counter');
                            if (parseInt(i.innerHTML)<=0) {
                                location.href = 'login.php';
                            }
                            i.innerHTML = parseInt(i.innerHTML)-1;
                        }
                        setInterval(function(){ countdown(); },1000);
                    </script>";
            header("refresh:3;url=login.php");
        }
    }
}


?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <title>Form Registrasi</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
</head>

<body>

    <!--header starts-->
    <?php include("includes/navbar.php") ?>
    <!-- header end -->

    <div class="page-wrapper">
        <div class="breadcrumb">
            <div class="container">
                <ul>
                    <li>
                        <a href="#" class="active">
                            <span style="color:g;"><?php echo $message; ?></span>
                            <span style="color:green;">
                                <?php echo $success; ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <section class="contact-page inner-page">
            <div class="container">
                <div class="row">
                    <!-- REGISTER -->
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input class="form-control" type="text" name="username" id="example-text-input" placeholder="Username">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Nama Depan</label>
                                            <input class="form-control" type="text" name="firstname" id="example-text-input" placeholder="Nama Depan">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Nama Belakang</label>
                                            <input class="form-control" type="text" name="lastname" id="example-text-input-2" placeholder="Nama Belakang">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Alamat Email</label>
                                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Nomor Telepon</label>
                                            <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="Nomor Telepon">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputPassword1">Kata Sandi</label>
                                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Kata Sandi">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputPassword1">Ulangi Kata Sandi</label>
                                            <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Ulangi Kata Sandi">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="exampleTextarea">Alamat Pengiriman</label>
                                            <textarea class="form-control" id="exampleTextarea" name="address" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p> <input type="submit" value="Daftar" name="submit" class="btn input theme-btn"> </p>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                    </div>
                </div>
        </section>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>
