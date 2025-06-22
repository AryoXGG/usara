<header id="header" class="header-scroll top-header headrom headerBg" style="background-color: #000; color: #fff;">
    <!-- .navbar -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse" style="color: #fff;">&#9776;</button>
            <a class="navbar-brand" href="index.php" style="color: #fff;"> USARA </a>
            <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> 
                        <a class="nav-link active" href="index.php" style="color: #fff;">Beranda <span class="sr-only">(current)</span></a> 
                    </li>
                    <!-- Tips & Trik link untuk semua -->
    <li class="nav-item"> 
        <a class="nav-link active" href="tips.php" style="color: #fff;">Tips & Trik</a> 
    </li>
                    <li class="nav-item"> 
                        <a class="nav-link active" href="paket.php" style="color: #fff;">Layanan <span class="sr-only"></span></a> 
                    </li>
                    <?php
                    if (empty($_SESSION["user_id"])) {
                        echo '
                            <li class="nav-item"><a href="login.php" class="nav-link active" style="color: #fff;">Login</a> </li>
                            <li class="nav-item"><a href="registration.php" class="nav-link active bgGreen" style="color: #fff;">Daftar</a> </li>';
                    } else {
                        echo '
                            <li class="nav-item"><a href="your_orders.php" class="nav-link active" style="color: #fff;">Pesanan Saya</a> </li>
                            <li class="nav-item"><a href="https://wa.me/62895401162217" target="_blank" class="nav-link active" style="color: #25D366; font-weight: bold;">
                                <i class="fa fa-whatsapp"></i> Konsultasi
                            </a></li>
                            <li class="nav-item"><a href="logout.php" class="nav-link active" style="color: #fff;">Logout</a> </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.navbar -->
</header>
